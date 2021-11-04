<?php

namespace App\Http\Controllers\Api;

use Hash;
use Validator;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\Category;
use App\Models\UserCategory;
use Illuminate\Http\Request;
use App\Jobs\NewUserRegisterEmail;
use App\Notifications\VerifyEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request){
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'deviceType' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'registerAs' => 'required',
            'isAgreeTC' => 'required',
        ]);

       if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
       }
       
       DB::beginTransaction();
       try{
         
            $user = new User;
            $user->prefixName = $request->prefixName;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password =  Hash::make($request->password);
            $user->whatsAppNo = $request->whatsAppNo;
            $user->state = $request->state;
            $user->city = $request->city;
            $user->zipCode = $request->zipCode;
            $user->latitude = $request->latitude;
            $user->longitude = $request->longitude;
            $user->deviceType = $request->deviceType;
            $user->isAgreeTC = $request->isAgreeTC;
            $user->registerAs = $request->registerAs;
            $user->displayAs = $request->registerAs;
            $user->companyName = $request->companyName;
            $user->companyType = $request->companyType;
            $user->membership_package_id = $request->membership_package_id;
            $user->status = 'active';
            $user->save();
            #login
            Auth::loginUsingId($user->id);
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken; 
            $user->token = $token;
            $user->profileImage = url('storage/profile/'.$user->profileImage);          
            

            $category = explode(',',$request->category);
            if($category[0] != ""){
               foreach($category as $row){
                    $cat = new UserCategory;
                    $cat->user_id = $user->id;
                    $cat->category_id = $row;
                    $cat->save();
               }
            }

            DB::commit();   
            return response()->json(['status' => true , 'message'=> 'Register Successfully Please Verify Your Profile','data'=>$user]);
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            return response()->json(['status'=>false,'message'=>$e]);
       }
       
    }

    # Verify Your Profile
    public function verifyProfileOtpSend(Request $request){

        $emailOtp = 1234;//mt_rand(1000,9999);
        $mobileOtp = 1234;//mt_rand(1000,9999);
        $user = auth()->user();
        
        #Job For Sending Otp After 10 Sec
        //NewUserRegisterEmail::dispatch($user)->delay(now()->addSeconds(10));
      
        try{

            $message = "Your otp is ". $mobileOtp;
            if($request->email){
                #$user->notify(new VerifyEmail($emailOtp)); // Email
                $user->emailOtp = $emailOtp;
                $user->save();
                return response()->json(['status' => true,'type'=>'email','message' => 'Otp Send Successfully To Your Email Id']);    
            }
            
            if($request->mobile){
                #Helper::sendOtp($request->mobile,$message); // Mobile
                $user->mobileOtp = $mobileOtp;
                $user->save();
                return response()->json(['status' => true,'type'=>'mobile','message' => 'Otp Send Successfully To Your Mobile No']);
            }

            if($request->mobile == '' && $request->email == ''){
                return response()->json(['status' => false,'message' => 'Please Enter Email Id and Mobile No. To Send Otp']);
            }
            
        }catch(\Exception $e){
            dd($e);
            return response()->json(['status' => false,'message' => $e]);
        }
        
        
        return response()->json([]);
    }

    # Verify Profile Otp
    public function verifyProfileOtp(Request $request){
        $validation = Validator::make($request->all(), [
            'type' => 'required',
            'otp' => 'required',
        ]);

       if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
       }
       
       $user = auth()->user();

       try{
            #chk for email
            if($request->type == 'email'){
                if($user->emailOtp == $request->otp){
                    $user->isEmailVerify = 'true';
                    $user->save();
                    return response()->json(['status' => true , 'message' => 'Otp Verified Successfully']);
                }else{
                    return response()->json(['status' => false , 'message' => 'Invalid Otp Please Resend Otp']);
                }
            }
            
            #chk for mobile
            if($request->type == 'mobile'){
                if($user->mobileOtp == $request->otp){
                    $user->isMobileVerify = 'true';
                    $user->save();
                    return response()->json(['status' => true , 'message' => 'Otp Verified Successfully']);
                }else{
                    return response()->json(['status' => false , 'message' => 'Invalid Otp Please Resend Otp']);
                }
            }

       }catch(\Exception $e){

       }
       


    }

}
