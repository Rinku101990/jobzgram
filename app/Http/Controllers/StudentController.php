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
            // 'mobile' => 'required|unique:users,mobile,'.$user->id,
            'mobile'=>'required',
            'gender'=>'required',
            'house_no'=>'required',
            'colony'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zipCode'=>'required',            
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
        $updateProfile->hobbies = $request->hobbies;
        $updateProfile->consultation_fee = $request->consultation_fee;
        $updateProfile->specialization = $request->specialization;
        $updateProfile->qualification = $request->qualification;
        $updateProfile->experience = $request->experience;
        $updateProfile->about_your_self = $request->about_your_self;
        $updateProfile->award_achievements = $request->award_achievements;
        $updateProfile->license = $request->license;
        $updateProfile->session_taken = $request->session_taken;
        // $updateProfile->bloodgroup = $request->bloodgroup;
        // $updateProfile->timezone = $request->timezone;
        $updateProfile->house_no = $request->house_no;
        $updateProfile->colony = $request->colony;
        $updateProfile->city = $request->city;
        $updateProfile->state = $request->state;
        $updateProfile->zipCode = $request->zipCode;

        $updateProfile->bankName = $request->bankName;
        $updateProfile->accountHolderName = $request->accountHolderName;
        $updateProfile->accountNumber = $request->accountNumber;
        $updateProfile->ifscCode = $request->ifscCode;
        $updateProfile->bankAddress = $request->bankAddress;
        //print("<pre>".print_r($updateProfile,true)."</pre>");die;
        
        $updateProfile->save();

        if($updateProfile->save()){
            return redirect()->back()->with(['success_message'=>'Profile Updated Successfully','profileType' => 'profile']);
        }else{
            return redirect()->back()->with(['success_message'=>'Profile Not Update','profileType' => 'profile']);
        }
    }


    public function teacher_observation(Request $request )
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(),[
            'program'=>'required',     
            'teacher_observation'=>'required',                      
        ]);

        if ($validator->fails()) {
            return redirect('myprogram')->withErrors($validator)->withInput();
        }


         
        $Program = BookedProgram::find($request->program);
        if(empty($Program)){
            return redirect()->back()->with(['error'=>'Invalid Program Id']);
        }

       
            if($request->file("teacher_observation")){
                 #remove old img
                 if (Storage::exists('/public/program/'.@$Program->teacher_observation)){
                    Storage::disk('public')->delete('program/'.@$Program->teacher_observation);
                }
                
                $doc_teacher_observation = $request->file("teacher_observation");
                $document = Storage::disk('public')->put('program', $doc_teacher_observation);
                $doc_file_name = basename($document);
                $Program->teacher_observation = $doc_file_name;
               

            }            
    
        

        if($Program->save()){
            return redirect()->back()->with(['success_message'=>'Teacher Observation Updated Successfully','profileType' => 'profile']);
        }else{
            return redirect()->back()->with(['success_message'=>'Teacher Observation Not Update','profileType' => 'profile']);
        }
    }

    public function student_document(Request $request )
    {
        $user = auth()->user();
        $validator = Validator::make($request->all(),[
            'bookedprogram'=>'required',     
            'document'=>'required',                      
        ]);

        if ($validator->fails()) {
            return redirect('my-program')->withErrors($validator)->withInput();
        }


         
        $Program = BookedProgram::find($request->bookedprogram);
        if(empty($Program)){
            return redirect()->back()->with(['error'=>'Invalid Booked Program Id']);
        }

       
            if($request->file("document")){
                 #remove old img
                 if (Storage::exists('/public/program/'.@$Program->document)){
                    Storage::disk('public')->delete('program/'.@$Program->document);
                }
                
                $doc_document = $request->file("document");
                $document = Storage::disk('public')->put('program', $doc_document);
                $doc_file_name = basename($document);
                $Program->document = $doc_file_name;
               

            }            
    
        

        if($Program->save()){
            return redirect()->back()->with(['success_message'=>'Student document uploaded Successfully','profileType' => 'profile']);
        }else{
            return redirect()->back()->with(['success_message'=>'Student document Not Update','profileType' => 'profile']);
        }
    }

    /*--- Payment Detail List ---*/ 
    public function payment()
    {
        $user = auth()->user();
        $payment = TransactionHistory::where('counselor_teacher',$user->id)->orderBy('id','desc')->get();       
        return view('user/payment',compact('payment'));
    }

    public function payment_details()
    {
        $user = auth()->user();
        $payment = TransactionHistory::where('counselor_teacher',$user->id)->orderBy('id','desc')->get();       
        return view('user/payment_details',compact('payment'));
    }

    public function download_invoice(Request $request)
    {
        $user = auth()->user();
        $payment = TransactionHistory::find($_GET['id']);  

        view()->share('payment',$payment);
        if($request->has('download')){
            $pdf = PDF::loadView('user/download_invoice');
            return $pdf->download('download_invoice.pdf');
        }
        return view('user/download_invoice');
           
   
    }

    public function payment_invoice(Request $request)
    {
        $user = auth()->user();
        $payment = TransactionHistory::find($_GET['id']);  

        view()->share('payment',$payment);
        if($request->has('download')){
            $pdf = PDF::loadView('user/invoice');
            return $pdf->download('download_invoice.pdf');
        }
        return view('user/invoice');
           
   
    }

    public function paymentinvoice(Request $request)
    {
        $user = auth()->user();
        $payment = TransactionHistory::find($_GET['id']);  

        view()->share('payment',$payment);
        if($request->has('download')){
            $pdf = PDF::loadView('user/paymentinvoice');
            return $pdf->download('download_invoice.pdf');
        }
        return view('user/paymentinvoice');
           
   
    }
    public function my_program()
    {      
        $user = auth()->user();
        $transaction = TransactionHistory::where('student',$user->id)->where('payment_status','Paid')->orderBy('id','desc')->get();
        //dd($transaction);
        $program=array();
        if(!empty($transaction)){
         
            foreach($transaction as $transValue){
                $program[]= BookedProgram::where('id',$transValue->booked_program_id)->where('program_id',$transValue->program_id)->orderBy('id','desc')->first(); 
            }
        }else{
            $program = 0;
        }
        return view('user/my_program',compact('program'));
    }

    public function student_program(Request $request)
    {      
        $user = auth()->user();
        if($request->ajax()) {

            if($user->registerAs=='student'){
       
                $data = BookedProgram::where('student_id',$user->id)->get();
                foreach($data as $row){
                    $title=$row->program_type .' '.date('g:i A',strtotime($row->getprogram->getbatch->duration));
                    $data_array[]=array(
                        'start'=>$row->getprogram->getbatch->start_date,
                        'title'=>$title,
                    );               
                }

            }else if($user->registerAs=='teacher'){

                $data = Batch::where('teacher_id',$user->id)->get();
                foreach($data as $row){
                    $title=@$row->batchprogram->title .' '.date('g:i A',strtotime($row->duration));
                    $data_array[]=array(
                        'start'=>$row->start_date,
                        'title'=>$title,
                    );               
                }
            }
            return response()->json($data_array);
       }
    }

    public function ajax_student_program(Request $request)
    {      
        $user = auth()->user();
        if($request->ajax()) {

            if($user->registerAs=='student'){
       
            $data = BookedProgram::where('student_id',$user->id)->where('id',$request->program)->get();
            foreach($data as $row){
                $title=$row->program_type .' '.date('g:i A',strtotime($row->getprogram->getbatch->duration));
                $data_array[]=array(
                    'start'=>$row->getprogram->getbatch->start_date,
                    'title'=>$title,
                );               
            }
        }else if($user->registerAs=='teacher'){

            $data = Batch::where('teacher_id',$user->id)->where('id',$request->program)->get();
            foreach($data as $row){
                $title=@$row->batchprogram->title .' '.date('g:i A',strtotime($row->duration));
                $data_array[]=array(
                    'start'=>$row->start_date,
                    'title'=>$title,
                );               
            }

        }
        
 
            return response()->json($data_array);
       }
        
    }

    public function student_appointment(Request $request)
    {      
        $user = auth()->user();
       
        if($request->ajax()) {
            if($user->registerAs=='student'){
            $data = BookedSlot::where('user',$user->id)->get();
            }else{
                $data = BookedSlot::where('child_counsellor',$user->id)->get();}
            foreach($data as $row){
                $title=date('g:i A',strtotime($row->getslot->start_time)) .' - '.date('g:i A',strtotime($row->getslot->end_time));
                $data_array[]=array(
                    'start'=>$row->getslot->slot_date,
                    'title'=>$title,
                );

               
            }
 
            return response()->json($data_array);
       }
        
    }

    public function ajax_booking_slot(Request $request)
    {      
        $user = auth()->user();
        if($request->ajax()) {
            if($user->registerAs=='student'){
            $data = BookedSlot::where('user',$user->id)->where('id',$request->appointment)->get();
            }else{$data = BookedSlot::where('child_counsellor',$user->id)->where('id',$request->appointment)->get();}
            foreach($data as $row){
                $title=date('g:i A',strtotime($row->getslot->start_time)) .' - '.date('g:i A',strtotime($row->getslot->end_time));
                $data_array[]=array(
                    'start'=>$row->getslot->slot_date,
                    'title'=>$title,
                );

               
            }
 
            return response()->json($data_array);
       }
        
    }
   
   

    public function myprogram()
    {      
        $user = auth()->user();
        $batch = Batch::where('teacher_id',$user->id)->orderBy('id','desc')->get();
        return view('user/myprogram',compact('batch'));
    }


      /*--- Student Wallet Detail List ---*/ 
    public function student_wallet()
    {
        $user = auth()->user();         
        return view('user/student-wallet');
    }

     /*--- Student Payment Detail List ---*/ 
    public function payment_history()
    {
        $user = auth()->user();
        $payment = TransactionHistory::where('student',$user->id)->orderBy('id','desc')->get();
        return view('user/payment-history',compact('payment'));
    }

     public function counsellor_feeback(Request $request)
     {
         $user = auth()->user();
         $counsellor = BookedSlot::find($request->id);
         return view('user/counsellor_feeback',compact('counsellor'));
     }

     public function teacher_feeback(Request $request)
     {
         $user = auth()->user();
         $teacher = BookedProgram::find($request->id);
         return view('user/teacher_feeback',compact('teacher'));
     }

     public function feedback_save(Request $request )
     {
         $user = auth()->user();
         $validator = Validator::make($request->all(),[
             'counsellor'=>'required',
             'rating'=>'required',
             'feedback'=>'required',                    
         ]);
 
         if ($validator->fails()) {
            return redirect('counsellor-feeback'.'/'.$request->id)->withErrors($validator)->withInput();
        }
 
          
         $FeedbackReviews = FeedbackReviews::where('user',$user->id)->where('counselor_teacher',$request->counsellor)->first();
         if(!empty($FeedbackReviews)){
             return redirect()->back()->with(['success_message'=>'Already Feedback added']);
         }
 
         $save= new FeedbackReviews;
         $save->user = $user->id;
         $save->counselor_teacher = $request->counsellor;
         $save->rating = $request->rating;
         $save->feedback = $request->feedback;
       
         if($save->save()){
             return redirect()->back()->with(['success_message'=>'Counsellor Feedback added Successfully']);
         }else{
             return redirect()->back()->with(['success_message'=>'Feedback Not Update']);
         }
     }



    public function feedback()
    {
        $user = auth()->user();
        $FeedbackReviews = FeedbackReviews::where('counselor_teacher',$user->id)->orderBy('id','desc')->get();

        return view('user/feedback_and_reviews',compact('FeedbackReviews'));
    }
    
    public function published_blog()
    {
        $user = auth()->user();
        $blog = Blog::where('user',$user->id)->orderBy('id','desc')->get();   
        return view('user/published_blog',compact('blog'));
    }

    public function approval_blog()
    {
       $user = auth()->user();
           $blog = Blog::where('user',$user->id)->where('status','active')->orwhere('status','inactive')->orderBy('id','desc')->get();   
        return view('user/approval_blog',compact('blog'));
    }

    public function rejected_blog()
    {
       $user = auth()->user();
           $blog = Blog::where('user',$user->id)->where('status','reject')->orderBy('id','desc')->get();   
        return view('user/rejected_blog',compact('blog'));
    }

    public function following_me()
    {
       $user = auth()->user();
           $follow = FollowBlog::where('user',$user->id)->orderBy('id','desc')->get();   
        return view('user/following-me',compact('follow'));
    }

    public function following()
    {
       $user = auth()->user();
           $follow = FollowBlog::where('following_user',$user->id)->orderBy('id','desc')->get();   
        return view('user/following',compact('follow'));
    }

    public function fav_blogs()
    {
       $user = auth()->user();
           $favblog = Fav_Blog::where('user',$user->id)->orderBy('id','desc')->get();   
        return view('user/fav-blogs',compact('favblog'));
    }

    public function my_query()
    {
        $user = auth()->user();
        $myquery = ParentingQuery::where('student',$user->id)->where('p_id',NULL)->orderBy('id','desc')->get(); 
        $tipsmyquery = ParentingQuery::where('student',$user->id)->whereNotNull('p_id')->orderBy('id','desc')->get();     
        return view('user/my_query',compact('myquery','tipsmyquery'));
    }

    public function myquery_edit(Request $request)
    {
        $user = auth()->user();
        $myquery = ParentingQuery::where('id',$request->id)->first();
        //dd($myquery);
        $querycategory = BlogCategory::select('id','name')->where('status','active')->orderBy('id','ASC')->get();
        return view('user.myquery_edit',compact('myquery','querycategory'));
    }

    public function myquery_update(Request $request)
    {
        $user = auth()->user();
        #validation
        $validator = Validator::make($request->all(), [   
            'title' => ['required'],
            'category' => ['required'], 
            'status' => ['required']               
        ]);

        if ($validator->fails()) {
            $message = $validator->errors($request->all())->all();
            return back()->with(['errors_validation'=>$message,'Query' => 'Query'])->withInput($request->all());
        }

        $updateQuery = ParentingQuery::find($request->myqueryid);
        if(empty($updateQuery)){
            return redirect()->back()->with(['error'=>'Invalid Query Id']);
        }

        $updateQuery->student = $user->id;
        $updateQuery->query = $request->title;
        $updateQuery->category = $request->category;
        $updateQuery->status = $request->status;
        
        $updateQuery->save();
        if($updateQuery->save()){
            return redirect('myquery-edit/'.$request->myqueryid)->with(['success_message'=>'Query Updated Successfully','Blog' => 'Blog']);
        }else{
            return redirect()->back()->with(['success_message'=>'Query Not Update','Query' => 'Query']);
        }
    }

    public function myquery_delete(Request $request)
    {
        try{
            $res = ParentingQuery::where('id',$request->query_id)->first();            
            if($res->delete()){
                return redirect('my-query')->with(['success_message'=>'Your Query deleted successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function tips_given()
    {
       $user = auth()->user();
           $myquery = ParentingQuery::where('student',$user->id)->whereNotNull('p_id')->orderBy('id','desc')->get();   
        return view('user/tips-given',compact('myquery'));
    }


    public function webinar_attended()
    {
       $user = auth()->user();
       $webinarattend = WebinarAttend::where('email',$user->email)->orderBy('id','desc')->get();    
        return view('user/webinar-attended',compact('webinarattend'));
    }

    public function favourite_webinar()
    {
       $user = auth()->user();
           
           $favwebinar = FavWebinar::where('user',$user->id)->orderBy('id','desc')->get();
        return view('user/favourite-webinar',compact('favwebinar'));
    }


    public function blog_list()
    {
       $user = auth()->user();
           $blog = Blog::where('user',$user->id)->orderBy('id','desc')->get();   
        return view('user/blog_list',compact('blog'));
    }

    public function my_courses()
    {
        return view('user/my_courses');
    }

    public function student_parenting_forum()
    {
        return view('user/parenting_forum');
    } 

    public function transactions()
    {
        return view('user/transactions');
    }

    public function student_list()
    {   $user = auth()->user();
       
        $student = BookedProgram::where('teacher',$user->id)->get();    
       
        return view('user/student_list',compact('student'));
    }


    public function student_details(Request $request)
    {        
            $student = User::find($request->id);
           return view('user/student-details',compact('student'));
           
    }

    public function student_teacher()
    {   $user = auth()->user();
        $teacher = TeacherStudent::where('status','active')->where('student',$user->id)->get();
        return view('user/student_teacher',compact('teacher'));
    }

    public function batch()
    {
        $user = auth()->user();
        $batch = Batch::where('status','active')->where('teacher_id',$user->id)->get();
        
         return view('user/batch',compact('batch'));
       
    }

    public function batch_view(Request $request)
    {        
            $batch = Batch::find($request->id);
           return view('user/batch_view',compact('batch'));
           
    }

    public function study_materials()
    {
        $user = auth()->user();
        $study = StudyMaterial::where('status','active')->where('teacher_id',$user->id)->get();
        
         return view('user/study_materials',compact('study'));
       
    }

    public function study_view(Request $request)
    {        
            $study = StudyMaterial::find($request->id);
           return view('user/study_materials_view',compact('study'));
           
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


    public function appointment()
    {
        $user = auth()->user();       
       
        $booking = BookedSlot::where('child_counsellor',$user->id)->orderBy('id','DESC')->get(); 
        
         return view('user/appointment',compact('booking'));
    }

    public function booking_appointment()
    {
        $user = auth()->user();       
       
        $booking = BookedSlot::where('user',$user->id)->orderBy('id','DESC')->get(); 
        
         return view('user/booking_appointment',compact('booking'));
    }
}
