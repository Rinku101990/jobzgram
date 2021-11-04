<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $validation = Validator::make($request->all(), [
            'email_mobile' => 'required',
            'password' => 'required|min:8',
            'deviceType' => 'required',
            'deviceToken' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'displayAs' => 'required',
        ]);

       if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
       }

       if(is_numeric($request->get('email_mobile'))){
           $loginType = 'mobile'; 
       }elseif (filter_var($request->get('email_mobile'), FILTER_VALIDATE_EMAIL)) {
            $loginType = 'email'; 
       }
       if(Auth::attempt([$loginType => request('email_mobile'), 'password' => request('password')])){ 
        $user = Auth::user(); 
        $user->deviceType = $request->deviceType;
        $user->deviceToken = $request->deviceToken;
        $user->latitude = $request->latitude;
        $user->longitude = $request->longitude;
        $user->displayAs = $request->displayAs;
        $user->save(); 
        $token =  $user->createToken('MyApp')->accessToken;
        $user->token = $token;
        $user->profileImage = url('storage/profile/'.$user->profileImage);
        

        if($user->status == 'active'){
            return response()->json(['status' => true , 'message'=> 'Login Successfully','data'=>$user]);
        }else{
            return response()->json(['status' => false , 'message'=> 'Your Account Is Not Activated Please Contact To Administrator','data'=>null]);
        }
            
        }else{
            return response()->json(['status' => false , 'message'=> 'Invalid Login Details','data'=>null]);
        }

    }

}
