<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\FollowBlog;
use App\Models\Fav_Blog;
use App\Models\FavWebinar;
use App\Models\WebinarAttend;
use App\Models\Batch;
use App\Models\BookedSlot;
use App\Models\Slot;
use App\Models\StudyMaterial;
use App\Models\TeacherStudent;
use App\Models\BookedProgram;
use App\Models\Program;
use App\Models\ParentingQuery;
use App\Models\FeedbackReviews;
use App\Models\TransactionHistory;
use App\Models\ZoomLinks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
Use Auth;


class StudentController extends Controller
{

   
    public function index()
    {
        $user = auth()->user();
        //Start Teacher
        $studentCount = BookedProgram::where('teacher',$user->id)->get()->count();         
        $batch = Batch::where('status','active')->where('teacher_id',$user->id)->get();
        $batchCount = $batch->count();
        $bookedprogramCount = BookedProgram::where('teacher',$user->id)->get()->count();
        //$bookedprogramCount = TransactionHistory::where('student',$user->id)->where('payment_status','Paid')->get()->count();
        
        //end  Teacher
         //Start counsellor
        $appointment = BookedSlot::where('child_counsellor',$user->id)->orderBy('id','DESC')->get()->count(); 
        $Slot = Slot::where('child_counsellor',$user->id)->orderBy('id','DESC')->get()->count(); 
        //end counsellor
        //Start Student 
        $blog = Blog::where('user',$user->id)->orderBy('id','desc')->get()->count();   
        $bookingappointment = BookedSlot::where('user',$user->id)->orderBy('id','DESC')->get()->count(); 
        //$bookedprogram = BookedProgram::where('student_id',$user->id)->orderBy('id','desc')->get()->count();
        $bookedprogram = TransactionHistory::where('student',$user->id)->where('payment_status','Paid')->get()->count();
        //dd($bookedprogram);
        //end student
        // Get Zoom Link
        $getTransactionList = TransactionHistory::where('student',$user->id)->where('payment_status','Paid')->get();
        //dd($getTransactionList);
        $getZoomLinkList=array();
        foreach($getTransactionList as $transList){
            $getZoomLinkList[]= ZoomLinks::select('zoom_id','zoom_topic','zoom_join_url','zoom_join_password','zoom_start_time')->where('zoom_pgrm_id',$transList->program_id)->first();
            if($getZoomLinkList!=null){
                $getZoomLink = $getZoomLinkList;
            }
        }
        
        return view('user/dashboard',compact('studentCount','batchCount','bookedprogramCount','appointment','Slot','blog','bookingappointment','bookedprogram'));
    }

    public function my_profile()
    {
        return view('user/my_profile');
    }   

    public function profile_update(Request $request )
    {
        $user = auth()->user();
        $validation = Validator::make($request->all(),[
            'title'=>'required',
            'name'=>'required',
            //'email' => 'required|unique:users,email,'.$user->id,
            'mobile'=>'required',
            'gender'=>'required',
            'dob'=>'required'
                        
        ]);

        if ($validation->fails()) {
            $message = $validation->errors($request->all())->all();
            return back()->with(['errors_validation'=>$message,'profileType' => 'profile'])->withInput($request->all());
        }


         
        $updateProfile = User::find($user->id);
        if(empty($updateProfile)){
            return redirect()->back()->with(['error'=>'Invalid Profile Id']);
        }

        $updateProfile->prefixName = $request->title;
        $updateProfile->name = $request->name;
        $updateProfile->mobile = $request->mobile;
            
        if($request->file("img")){
                #remove old img
                if (Storage::exists('/public/profile/'.@$user->profileImage)){
                Storage::disk('public')->delete('profile/'.@$user->profileImage);
            }
            
            $banner_image = $request->file("img");
            $bannerImg = Storage::disk('public')->put('profile', $banner_image);
            $banner_file_name = basename($bannerImg);
            $updateProfile->profileImage = $banner_file_name;
            

        }
            
        $updateProfile->gender =$request->gender;
        $updateProfile->dob = $request->dob;
        
        $updateProfile->save();

        if($updateProfile->save()){
            return redirect()->back()->with(['success_message'=>'Profile Updated Successfully','profileType' => 'profile']);
        }else{
            return redirect()->back()->with(['success_message'=>'Profile Not Update','profileType' => 'profile']);
        }
    }

    public function change_password()
    {
        return view('user/change_password');
    }

    public function UpdatePassword(Request $request){
        // dd($request->all());
        $validation = Validator::make($request->all(),[
            'oldpassword'=>'required',            
            'password'=>'required|min:6',
            'password_confirmation'=>'required|same:password|min:6',                     
        ]);

       if ($validation->fails()) {
            $message = $validation->errors($request->all())->all();
            return back()->with(['errors_validation'=>$message,'profileType' => 'profile'])->withInput($request->all());
        }
        $user = auth()->user()->id;
        $user_password = auth()->user()->password; 
        $check=Hash::check($request->oldpassword, $user_password);       
        if($check==false){ 
            return redirect()->back()->with('error', 'Incorrect Old Password');
        }else{
            User::where('id',$user)->update(['password'=>Hash::make($request->password)]);
            return redirect()->back()->with('success_message', 'Password updated successfully');
        }
    }


    
}
