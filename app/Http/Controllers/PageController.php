<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Page;
use App\Models\speaker;
use App\Models\Blog;
use App\Models\BlogView;
use App\Models\BlogComment;
use App\Models\BlogCategory;
use App\Models\FollowBlog;
use App\Models\Fav_Blog;
use App\Models\LikeBlog;
use App\Models\FavWebinar;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Program;
use App\Models\Category;
use App\Models\SearchTag;
use App\Models\Testimonial;
use App\Models\ParentingQuery;
use App\Models\ParentingWebinar;
use App\Models\WebinarAttend;
use App\Models\CourseAttend;
use App\Models\User;
use App\Models\Slot;
use App\Models\Batch;
use App\Models\Week;
use App\Models\BookedSlot;
use App\Models\BookedProgram;
use App\Models\ParentingWebinarQuery;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
Use Auth;
use Session;

class PageController extends Controller
{
    // Home Page 
    public function index()
    {   
        return view('index');
    }

    /*--- Login Register ---*/
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    // About US 
    public function about()
    {   
        $page = Page::find(1);
        return view('about',compact('page'));
    }

    public function who_we_are()
    {
        $page = Page::find(2);
        return view('who_we_are',compact('page'));
    }

     // 
    public function what_we_do()
    {   
        $page = Page::find(3);
        return view('what_we_do',compact('page'));
    }

    public function terms()
    {
        //$page = Page::find(7);
        return view('terms-conditions');
    }
  
    public function privacy_policy()
    {
        $page = Page::find(8);
        return view('privacy-policy',compact('page'));
    }

    
    /*-- OLD --*/ 

    
    public function fablian_family()
    {   
        $page = Page::find(4);
        return view('fablian_family',compact('page'));
    }

     
    
  

    public function parenting_solutions()
    {   
        $page = Page::find(5);
        return view('parenting_solutions',compact('page'));
    }

    public function program()
    {
        $page = Page::find(6);
        return view('program',compact('page'));
    }

    // Start Program Module Process //
    public function program_data(Request $request)
    {         
        $tagCategoryId = '5'; // For Blog
        $searchTag = SearchTag::where('tag_cate_id',$tagCategoryId)->orderBy('id','ASC')->get(); // Search Tag Category wise

        if(!empty($_GET['search']))
        {
            $category = Category::where('url_slug',$request->id)->first();
            if(!empty($category)){
                $Program = Program::select('title','title_slug','banner','age_group','fees','short_description','status')->where('cate_id',$category->id)->where('title','like','%'.$_GET['search'].'%')->get();
            }
        }
        else if(!empty($_GET['sort_by']))
        {
            $category = Category::where('url_slug',$request->id)->first();
            if(!empty($category)){
                $Program = Program::select('title','title_slug','banner','age_group','fees','short_description','status')->where('cate_id',$category->id)->where('search_tag','like','%'.$_GET['sort_by'].'%')->get();
            }
        }else{
            $category = Category::where('url_slug',$request->id)->first();
            if(!empty($category)){
                $Program = Program::select('title','title_slug','banner','age_group','fees','short_description','status')->where('cate_id',$category->id)->get();
            }
        }
        return view('program_list',compact('Program','category','searchTag'));
    }

    public function program_detail(Request $request)
    {
        $currentURL = url()->full(); // Getting Current Url
        // Social Share Buttons //
        $shareButtons = \Share::page(
            $currentURL.'/',
        )->facebook()->twitter()->linkedin()->whatsapp();
        
        $programInfo = Program::where('title_slug',$request->id)->first();
        //dd($programInfo);
        return view('program_detail',compact('programInfo','shareButtons'));
    }

    public function program_book_for_demo(Request $request)
    {         
        $program = Program::where('title_slug',$request->id)->first();
        //dd($program);
        return view('live_demo',compact('program'));
    }

    public function enroll_for_program(Request $request)
    {         
        $program = Program::where('title_slug',$request->id)->first();
        //dd($program);
        return view('live_for_program',compact('program'));
    }

    public function live_demo_update(Request $request)
    {
        $user = auth()->user();
        $validation = Validator::make($request->all(),[
            'student_id'=>'required',
            'name'=>'required',
            'child_name'=>'required',
            'student_email'=>'required',
            'student_phone' => 'required',
            'age_group'=>'required',
            'program_type'=>'required',          
        ]);

       if($validation->fails()){
            $message = $validation->errors($request->all())->all();
            return back()->with(['errors_validation'=>$message,'programType' => 'program'])->withInput($request->all());
        }
        $program = Program::where('title',$request->program_type)->first();
        $teacher_id=$program->getbatch->teacher_id;

        $updateProgram = new BookedProgram;
        $updateProgram->program_id = $program->id;
        $updateProgram->student_id = $request->student_id;
        $updateProgram->teacher = $program->getbatch->teacher_id;
        $updateProgram->student_name = $request->name;       
        $updateProgram->child_name = $request->child_name;
        $updateProgram->student_email = $request->student_email;
        $updateProgram->student_phone = $request->student_phone;
        $updateProgram->age_group = $request->age_group;
        $updateProgram->program_type = $request->program_type;
        $updateProgram->program_price = $request->program_price;
        $updateProgram->student_query = $request->student_query;
        $updateProgram->save();
        
        /*start transaction history  */
        $history = new TransactionHistory;
        $history->booked_program_id=$updateProgram->id;
        $history->program_id = $program->id;
        $history->student = $request->student_id;
        $history->counselor_teacher = $program->getbatch->teacher_id;
        $history->transaction = $request->program_price;
        $history->transaction_type= $request->transaction_type;
        $history->type = $request->program_type;  
        if($request->program_price=='Free'){
            $history->payment_status = 'Paid';  
        }else{
            $history->payment_status = 'Unpaid'; 
        }
        $history->save();
        /* end transaction history */  

        if($updateProgram->save()){
            $programId = $history->id;
            return redirect()->route('makepayment', [$programId]);
            //return redirect()->back()->with(['success_message'=>'Program has been purchased Successfully','programType' => 'program']);
        }else{
            return redirect()->back()->with(['success_message'=>'Program Not Update','programType' => 'program']);
        }
    }

    public function makepayment(Request $request)
    {
        $payInfo = TransactionHistory::find($request->id);
        Session::put('razorpayOrderId', $request->id); // Set Transaction Id For update history after payment
        return view('make_payment', compact('payInfo'));
    }
    // End Program Module Process // 

    public function leader_in_me()
    {         
        $Program = Program::find(2);
        return view('leader_in_me',compact('Program'));
    }
    
    public function child_counsellor()
    {
        $counsellor = User::where('status','active')->where('registerAs','child_counsellor')->orderBy('id','desc')->get();
        return view('child_counsellor',compact('counsellor'));
    }

    
    public function counsellor_slot(Request $request)
    {
        $currentURL = url()->full(); // Getting Current Url
        //$blogSlug = Str::slug($blog->title, '-');  // For Slug Conversion //
        // Social Share Buttons //
        $shareButtons = \Share::page(
            $currentURL,
        )->facebook()->twitter()->linkedin()->whatsapp();

        $slot = Slot::where('status','active')->where('child_counsellor',$request->counsellor)->orderBy('slot_date')->get();
        $date = Slot::selectRaw("slot_date as date")->where('status','active')->where('child_counsellor',$request->counsellor)->groupBy('date')->orderBy('slot_date')->get();

        //$week = Week::where('status','active')->orderBy('id','ASC')->get();
        $counsellor = User::find($request->counsellor);
        return view('counsellor_slot',compact('slot','counsellor','date','shareButtons'));

    }

    public function slot_booking(Request $request)
    {
        $counsellor = User::find($request->counsellor);
        $slot = Slot::find($request->slot);
        return view('slot_booking',compact('slot','counsellor'));
    }

    public function booking_slot(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [  
            'counsellor' => ['required'],         
            'slot' => ['required'],                            
        ]);
        if ($validator->fails()) {
            return redirect('slot-booking')->withErrors($validator)->withInput();
        }

        try{
            $counsellor = User::find($request->counsellor);
            $save = new BookedSlot;
            $save->user = Auth::user()->id;
            $save->child_counsellor = $request->counsellor;
            $save->slot = $request->slot;
            $save->transaction = $counsellor->consultation_fee;
            $save->payment_status = 'paid';  
            /*start transaction history  */
            $history = new TransactionHistory;
            $history->student = Auth::user()->id;
            $history->counselor_teacher = $request->counsellor;
            $history->transaction = $counsellor->consultation_fee;
            $history->type = 'Counsellor';  
            $history->payment_status = 'Paid';  
            $history->save();
            /* end transaction history */                   
            if($save->save()){
            return redirect('booking-thank');
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function booking_thank()
    {         
        return view('booking-thank');
    }


    public function about_counselling_service()
    {         
        return view('about_counselling_service');
    }

    // public function parenting_forum()
    // {
    //     return view('parenting_forum');
    // }

    public function about_parenting_forum()
    {
        return view('parenting_forum');
    }

    public function kids_wellness_services()
    {
        return view('kids_wellness_services');
    }

    public function about_kids_wellness_services()
    {
        return view('kids_wellness_services');
    }

    public function about_our_program()
    {
        $page = Page::find(6);
        return view('program',compact('page'));
    }

    public function counsellors_and_coaches()
    {

        $tagCategoryId = '4'; // For Blog
        $searchTag = SearchTag::where('tag_cate_id',$tagCategoryId)->orderBy('id','ASC')->get(); // Search Tag Category wise

        if(!empty($_GET['search']))
        {
            $counsellor = User::where('status','active')->where('registerAs','child_counsellor')->where('name','like','%'.$_GET['search'].'%')->orderBy('id','desc')->get();
        }
        else if(!empty($_GET['sort_by']))
        {
            $counsellor = User::where('status','active')->where('registerAs','child_counsellor')->where('search_tag','like','%'.$_GET['sort_by'].'%')->orderBy('id','desc')->get();
        }else{
            $counsellor = User::where('status','active')->where('registerAs','child_counsellor')->orderBy('id','desc')->get();
        }
        return view('counsellors_and_coaches',compact('counsellor','searchTag'));
    }

    public function courses()
    {
        $courses = Course::where('status','active')->orderBy('id','desc')->get();
        return view('courses',compact('courses'));
    }

    public function courses_details(Request $request)
    {        
        $currentURL = url()->full(); // Getting Current Url
        // Social Share Buttons //
        $shareButtons = \Share::page(
            $currentURL,
        )->facebook()->twitter()->linkedin()->whatsapp();

        $courses = Course::where(['id'=>$request->id,'status'=>'active'])->orderBy('id','ASC')->first();
        // echo "<pre>";
        // print_r($courses);die;
        return view('course_details',compact('courses','shareButtons'));
    }

    public function course_attend(Request $request)
    {  
        #form Validation
        $validator = Validator::make($request->all(), [   
            'course' => ['required'],   
            'name' => ['required'],         
            'email' => ['required'],
            'phone' => ['required'],         
            'payment' => ['required'],  
            'description' => ['required'],            
        ]);
        if ($validator->fails()) {
            return redirect('course-details/'.$request->course)->withErrors($validator)->withInput();
        }
 
        try{
        
            $save = new CourseAttend;
            $save->course_id = $request->course;
            $save->name = $request->name;
            $save->email = $request->email;
            $save->phone = $request->phone;
            $save->payment = $request->payment;
            if($request->payment!='Free'){
                $save->txt_status = 'Unpaid';
            }else{
                $save->txt_status = 'Free';
            }
            $save->description = $request->description;   
        
            if($save->save()){
                $webAttendId = $save->id;
                return redirect()->route('course_payment_confirmation', [$webAttendId]);
                //return redirect('parenting-webinars/'.$request->webinar)->with(['success_message'=>'Webinar Attent has been added successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function course_payment_confirmation(Request $request)
    {
        $payInfo = CourseAttend::find($request->id);
        $course = Course::find($payInfo->course_id);
        Session::put('razorpayOrderId', $request->id); // Set Transaction Id For update history after payment
        return view('course_payment_confirmation', compact('payInfo','course'));
    }

    public function blog()
    {
        $currentURL = url()->full(); // Getting Current Url
        $shareButtons='';
        $tagCategoryId = '1'; // For Blog
        $searchTag = SearchTag::where('tag_cate_id',$tagCategoryId)->orderBy('id','ASC')->get(); // Search Tag Category wise
        $blogcategory = BlogCategory::where('status','active')->orderBy('id','ASC')->get();

        if(!empty($_GET['search'])){
            $blog = Blog::where('status','active')->where('title','like','%'.$_GET['search'].'%')->orderBy('id','desc')->get(); 
            if(!empty($blog)){
                // Share button //
                foreach($blog as $blg){
                    $shareButtons = \Share::page(
                        '"'.$currentURL.'/'.$blg->id.'"',
                        
                    )->facebook()->twitter()->linkedin()->whatsapp();
                }
            }
        }else if(!empty($_GET['sort_by'])){
            $blog = Blog::where('status','active')->where('search_tag','like','%'.$_GET['sort_by'].'%')->orderBy('id','desc')->get();  
            if(!empty($blog)){
                // Share button //
                foreach($blog as $blg){
                    $shareButtons = \Share::page(
                        '"'.$currentURL.'/'.$blg->id.'"',
                    )->facebook()->twitter()->linkedin()->whatsapp();
                }
            }
        }else{
            $blog = Blog::where('status','active')->orderBy('id','desc')->get();
            //dd($blog);
            if(!empty($blog)){
                // Share Button //
                foreach($blog as $blg){
                    $shareButtons = \Share::page(
                        '"'.$currentURL.'/'.$blg->id.'"',
                    )->facebook()->twitter()->linkedin()->whatsapp();
                }
            } 
        }

        return view('blog',compact('blogcategory','blog','shareButtons','searchTag'));
    }

    public function blog_save(Request $request)
    {
         #validation
        $validator = Validator::make($request->all(), [   
            'img' => ['required', 'mimes:jpeg,jpg,png'],   
            'user' => ['required'],         
            'title' => ['required'],
            'category' => ['required'],         
            'author' => ['required'],
            'description' => ['required'],            
        ]);
        if ($validator->fails()) {
            return redirect('blog')->withErrors($validator)->withInput();
        }

        try{
            $save = new Blog;
            $save->user = $request->user;
            $save->title = $request->title;
            $save->title_slug = $request->title_slug;
            $save->category = $request->category;
            $save->author = $request->author;
            $save->description = $request->description;   
            if($request->file("img")){
            $banner_image = $request->file("img");
            $banner = Storage::disk('public')->put('blog', $banner_image);
            $banner_file_name = basename($banner);
            $save->img = $banner_file_name;
        }

        
        $save->status = 'inactive';         
            if($save->save()){
                return redirect('blog')->with(['success_message'=>'Blog has been submitted successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function blog_details(Request $request)
    {   
        $currentURL = url()->full(); // Getting Current Url
        
        $blogcategory = BlogCategory::where('status','active')->orderBy('id','ASC')->get(); 
        $blog = Blog::find($request->id); // Using id
        //$blog = Blog::where('title_slug',$request->id)->first(); // Using Title Slug
        //$blogSlug = Str::slug($blog->title, '-');  // For Slug Conversion //
        // Social Share Buttons //
        $shareButtons = \Share::page(
            $currentURL.'/',
        )->facebook()->twitter()->linkedin()->whatsapp();
        
        $favblog = Fav_Blog::where('blog',$request->id)->first();
        if(!empty(Auth::user()->id)){
            $follow = FollowBlog::where('user',Auth::user()->id)->first();
        }else{
            $follow='';
        }

        $likeBlog = LikeBlog::where('blog_id',$request->id)->first();
        //dd($likeBlog);
        if(!empty(Auth::user()->id)){
            $blike = LikeBlog::where('blog_id',$request->id)->first();
        }else{
            $blike='';
        }
        $blogLikeCount = LikeBlog::where('blog_id',$request->id)->get()->count();

        $blogviewcount = BlogView::where('blog',$request->id)->get()->count();
        $blogcomment = BlogComment::where('blog',$request->id)->get();
        $multiblog = Blog::where('status','active')->limit(8)->orderBy('id','desc')->get();             
        return view('blog_details',compact('blogcategory','blog','favblog','follow','blike','blogviewcount','blogLikeCount','blogcomment','multiblog','shareButtons'));
    }

    public function blog_edit(Request $request)
    {
        $blog = Blog::where('title_slug',$request->id)->first();
        $blogcategory = BlogCategory::select('id','name')->where('status','active')->orderBy('id','ASC')->get();
        return view('user.blog_edit',compact('blog','blogcategory'));
    }

    public function blog_update(Request $request)
    {
        $user = auth()->user();
        #validation
        $validator = Validator::make($request->all(), [    
            'user' => ['required'],         
            'title' => ['required'],
            'category' => ['required'],         
            'author' => ['required'],
            'description' => ['required'],            
        ]);

        if ($validator->fails()) {
            $message = $validator->errors($request->all())->all();
            return back()->with(['errors_validation'=>$message,'Blog' => 'Blog'])->withInput($request->all());
        }

        $updateBlog = Blog::find($request->blogid);
        if(empty($updateBlog)){
            return redirect()->back()->with(['error'=>'Invalid Blog Id']);
        }

        $updateBlog->user = $user->id;
        $updateBlog->title = $request->title;
        $updateBlog->title_slug = $request->title_slug;
        $updateBlog->category = $request->category;
        $updateBlog->author = $request->author;
        $updateBlog->description = $request->description;

        if($request->file("img")){
            #remove old img
            if (Storage::exists('/public/blog/'.@$updateBlog->img)){
                Storage::disk('public')->delete('blog/'.@$updateBlog->img);
            }
            
            $banner_image = $request->file("img");
            $bannerImg = Storage::disk('public')->put('blog', $banner_image);
            $banner_file_name = basename($bannerImg);
            $updateBlog->img = $banner_file_name;
        }
        
        $updateBlog->save();
        if($updateBlog->save()){
            return redirect('blog-edit/'.$request->title_slug)->with(['success_message'=>'Blog Updated Successfully','Blog' => 'Blog']);
        }else{
            return redirect()->back()->with(['success_message'=>'Blog Not Update','Blog' => 'Blog']);
        }
    }

    public function blog_delete(Request $request)
    {
        try{
            $res = Blog::where('title_slug',$request->title_slug)->first();            
            if($res->delete()){
                return redirect('blog-list')->with(['success_message'=>'Your blog deleted successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function blog_comment(Request $request)
    {
       
                   #validation
          $validator = Validator::make($request->all(), [                  
            'user' => ['required'],         
             'blog' => ['required'],
             'comment' => ['required'],  
         ]);
         if ($validator->fails()) {
             return redirect('blog/'.$request->blog)->withErrors($validator)->withInput();
         }
 
         try{
             $save = new BlogComment;
             $save->user = $request->user;
             $save->blog = $request->blog;
             $save->comment = $request->comment;                     
             if($save->save()){
                 return redirect('blog/'.$request->blog)->with(['success_message'=>'Blog comment  has been submitted successfuly !!']);    
             }else{
                 return back()->with(['error'=>'Something went wrong!!']);
             }
             
         }catch(\Exception $e){
             dd($e);
         }
    }

    public function blike(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [   
            'user_id' => ['required'],         
            'blog_id' => ['required'],                       
        ]);
        if ($validator->fails()) {
            return redirect('blog/'.$request->blog)->withErrors($validator)->withInput();
        }
        try{
            $save = new LikeBlog;
            $save->user_id = $request->user_id;
            $save->blog_id = $request->blog_id;
        
            if($save->save()){
                return redirect('blog/'.$request->blog_id)->with(['success_message'=>'Blog liked !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function blike_delete(Request $request)
    {
        try{
            $res = LikeBlog::where('id',$request->blike_id)->first();
            if($res->delete()){
                return redirect('blog/'.$request->blog_id)->with(['success_message'=>'Blog like Deleted']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function favourite(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [   
            'user' => ['required'],         
            'blog' => ['required'],                       
        ]);
        if ($validator->fails()) {
            return redirect('blog/'.$request->blog)->withErrors($validator)->withInput();
        }

        try{
            $save = new Fav_Blog;
            $save->user = $request->user;
            $save->blog = $request->blog;
        
            if($save->save()){
                return redirect('blog/'.$request->blog)->with(['success_message'=>'Blog has been favourited successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function favourite_delete(Request $request)
    {
        
        try{
            $res = Fav_Blog::where('id',$request->fav_blog)->first();

            
            if($res->delete()){
                return redirect('blog/'.$request->blog)->with(['success_message'=>'favourite blog Deleted Successfully !!']);    

                
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function follow(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [   
            'user' => ['required'],         
            'following_user' => ['required'],                       
        ]);
        if ($validator->fails()) {
            return redirect('blog/'.$request->blog)->withErrors($validator)->withInput();
        }

        try{
            $save = new FollowBlog;
            $save->user = $request->user;
            $save->following_user = $request->following_user;
        
            if($save->save()){
                return redirect('blog/'.$request->blog)->with(['success_message'=>'Your account has been followed successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function follow_delete(Request $request)
    {
        try{
            $res = FollowBlog::where('id',$request->following_id)->first();            
            if($res->delete()){
                return redirect('blog/'.$request->blog)->with(['success_message'=>'Your account has been Unfollowed successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function fav_webinar(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [   
            'user' => ['required'],         
            'webinar' => ['required'],                       
        ]);
        if ($validator->fails()) {
            return redirect('blog/'.$request->blog)->withErrors($validator)->withInput();
        }

        try{
            $save = new FavWebinar;
            $save->user = $request->user;
            $save->webinar = $request->webinar;
        
            if($save->save()){
                return redirect('parenting-webinars')->with(['success_message'=>'Webinar has been favourited successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function fav_webinar_delete(Request $request)
    {
        try{
            $res = FavWebinar::where('id',$request->fav_webinar)->first();

            
            if($res->delete()){
                return redirect('parenting-webinars')->with(['success_message'=>'favourite Webinar Deleted Successfully !!']);    

                
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function parenting_tips()
    {
        $tagCategoryId = '2'; // For Blog
        $searchTag = SearchTag::where('tag_cate_id',$tagCategoryId)->orderBy('id','ASC')->get(); // Search Tag Category wise

        if(!empty($_GET['search']))
        {
            $Parentingquery = ParentingQuery::where('status','active')->where('query','like','%'.$_GET['search'].'%')->whereNull('p_id')->orderBy('id','desc')->get();  
        }
        else if(!empty($_GET['sort_by']))
        {
            $Parentingquery = ParentingQuery::where('status','active')->where('search_tag','like','%'.$_GET['sort_by'].'%')->whereNull('p_id')->orderBy('id','desc')->get();  
        }else{
            $Parentingquery = ParentingQuery::where('status','active')->whereNull('p_id')->orderBy('id','desc')->get();  
        }
        $blogcategory = BlogCategory::where('status','active')->orderBy('id','ASC')->get();
        return view('parenting_tips' ,compact('blogcategory','Parentingquery','searchTag'));
    }

    public function parenting_tip_save(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [   
        'student' => ['required'],         
            'category' => ['required'],
            'desc' => ['required'],            
        ]);
        if ($validator->fails()) {
            return redirect('parenting-tips')->withErrors($validator)->withInput();
        }

        try{
            $save = new ParentingQuery;
            $save->student = $request->student;
            $save->category = $request->category;
            $save->query = $request->desc;            
            if($save->save()){
                return redirect('parenting-tips')->with(['success_message'=>'Your query has been added successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function parenting_tip_reply(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [   
        'user' => ['required'],         
            'query_id' => ['required'],
            'desc' => ['required'],            
        ]);
        if ($validator->fails()) {
            return redirect('parenting-tips')->withErrors($validator)->withInput();
        }

        try{
            $save = new ParentingQuery;
            $save->student = $request->user;
            $save->p_id = $request->query_id;
            $save->query = $request->desc;            
            if($save->save()){
                return redirect('parenting-tips')->with(['success_message'=>'Your query replied successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function parenting_webinars()
    { 
        $date=date('Y-m-d');
        $currentURL = url()->full(); // Getting Current Url
        $shareButtons='';
        $tagCategoryId = '3'; // For Blog
        $searchTag = SearchTag::where('tag_cate_id',$tagCategoryId)->orderBy('id','ASC')->get(); // Search Tag Category wise
        $blogcategory = BlogCategory::where('status','active')->orderBy('id','ASC')->get();
        // if(empty($_GET['category']) && (empty($_GET['search']))){
        if(!empty($_GET['search'])){
            $speaker  = speaker::where('status','active')->get();
            $upcoming = ParentingWebinar::where('status','active')->whereDate('expire_date', '>=', $date)->where('title','like','%'.$_GET['search'].'%')->limit(6)->orderBy('id','desc')->get();
            // Iterate upcoming webinar //
            foreach($upcoming as $upWeb){
                $shareButtons = \Share::page(
                    $currentURL.'/'.$upWeb->title_slug.'/',
                )->facebook()->twitter()->linkedin()->whatsapp();
            }
            // End Iterate upcoming webinaar //
            $past_Webniar = ParentingWebinar::where('status','active')->whereDate('expire_date', '<=', $date)->where('title','like','%'.$_GET['search'].'%')->orderBy('id','desc')->get();  
            // Iterate past webinar //
            foreach($past_Webniar as $pstWeb){
                $shareButtons = \Share::page(
                    $currentURL.'/'.$pstWeb->title_slug.'/',
                )->facebook()->twitter()->linkedin()->whatsapp();
            }
            // End Iterate past webinaar //
        }else if(!empty($_GET['sort_by'])){
            $speaker  = speaker::where('status','active')->get();
            $upcoming = ParentingWebinar::where('status','active')->whereDate('expire_date', '>=', $date)->where('search_tag','like','%'.$_GET['sort_by'].'%')->limit(6)->orderBy('id','desc')->get();
            // Iterate upcoming webinar //
            foreach($upcoming as $upWeb){
                $shareButtons = \Share::page(
                    $currentURL.'/'.$upWeb->title_slug.'/',
                )->facebook()->twitter()->linkedin()->whatsapp();
            }
            // End Iterate upcoming webinaar //
            $past_Webniar = ParentingWebinar::where('status','active')->whereDate('expire_date', '<=', $date)->where('search_tag','like','%'.$_GET['sort_by'].'%')->orderBy('id','desc')->get();  
            // Iterate past webinar //
            foreach($past_Webniar as $pstWeb){
                $shareButtons = \Share::page(
                    $currentURL.'/'.$pstWeb->title_slug.'/',
                )->facebook()->twitter()->linkedin()->whatsapp();
            }
            // End Iterate past webinaar //
        }else{
            $speaker  = speaker::where('status','active')->get();
            $upcoming = ParentingWebinar::where('status','active')->whereDate('expire_date', '>=', $date)->limit(6)->orderBy('id','desc')->get();
            // Iterate upcoming webinar //
            foreach($upcoming as $upWeb){
                $shareButtons = \Share::page(
                    $currentURL.'/'.$upWeb->title_slug.'/',
                )->facebook()->twitter()->linkedin()->whatsapp();
            }
            // End Iterate upcoming webinaar //
            $past_Webniar = ParentingWebinar::where('status','active')->whereDate('expire_date', '<=', $date)->orderBy('id','desc')->get();    
            // Iterate past webinar //
            foreach($past_Webniar as $pstWeb){
                $shareButtons = \Share::page(
                    $currentURL.'/'.$pstWeb->title_slug.'/',
                )->facebook()->twitter()->linkedin()->whatsapp();
            }
            // End Iterate past webinaar //
        }          
        return view('parenting_webinars',compact('blogcategory','upcoming','past_Webniar','speaker','shareButtons','searchTag'));
     }
     
     public function webinar_details(Request $request)
     {        
        $currentURL = url()->full(); // Getting Current Url
        //$blogSlug = Str::slug($blog->title, '-');  // For Slug Conversion //
        // Social Share Buttons //
        $shareButtons = \Share::page(
            $currentURL,
        )->facebook()->twitter()->linkedin()->whatsapp();

        $webinar = ParentingWebinar::where('title_slug',$request->id)->first();
        $speaker = speaker::where(['id'=>$webinar->speaker,'status'=>'active'])->orderBy('id','ASC')->get();
        //print("<pre>".print_r($speaker,true)."</pre>");die;
        return view('webinar_details',compact('webinar','speaker','shareButtons'));
     }


     public function webinar_attent(Request $request)
     {  
        #form Validation
        $validator = Validator::make($request->all(), [   
            'webinar' => ['required'],   
            'name' => ['required'],         
            'email' => ['required'],
            'phone' => ['required'],         
            'webinar_date' => ['required'],
            'payment' => ['required'],  
            'speaker' => ['required'],  
            'description' => ['required'],            
        ]);
        if ($validator->fails()) {
            return redirect('parenting-webinars/'.$request->webinar)->withErrors($validator)->withInput();
        }
 
        try{
        
            $save = new WebinarAttend;
            $save->webinar = $request->webinar;
            $save->name = $request->name;
            $save->email = $request->email;
            $save->phone = $request->phone;
            $save->webinar_date = $request->webinar_date;
            $save->payment = $request->payment;
            if($request->payment!='Free'){
                $save->txt_status = 'Unpaid';
            }else{
                $save->txt_status = 'Free';
            }
            $save->speaker = $request->speaker;
            $save->description = $request->description;   
        
            if($save->save()){
                $webAttendId = $save->id;
                return redirect()->route('webinar_payment_confirmation', [$webAttendId]);
                //return redirect('parenting-webinars/'.$request->webinar)->with(['success_message'=>'Webinar Attent has been added successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function webinar_payment_confirmation(Request $request)
    {
        $payInfo = WebinarAttend::find($request->id);
        $webinar = ParentingWebinar::find($payInfo->webinar);
        Session::put('razorpayOrderId', $request->id); // Set Transaction Id For update history after payment
        return view('webinar_payment_confirmation', compact('payInfo','webinar'));
    }

    public function webinar_save(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [   
            'name' => ['required'],         
            'email' => ['required'],
            'phone' => ['required'],
            'organization' => ['required'],
            'description' => ['required']            
        ]);
        if ($validator->fails()) {
            return redirect('parenting-webinars')->withErrors($validator)->withInput();
        }

        try{
            $save = new ParentingWebinarQuery;
            $save->name = $request->name;
            $save->email = $request->email;
            $save->phone = $request->phone;
            $save->organization = $request->organization; 
            $save->description = $request->description;            
            if($save->save()){
                return redirect('parenting-webinars')->with(['success_message'=>'Your webinar has been saved successfuly !!']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }
     
    public function contact()
    {
        return view('contact');
    }

    public function send_contact(Request $request)
    {        // email data
        $email_data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'query' => $request->message
        );
        // send email with the template
        Mail::send('email.email_verification', $email_data, function ($message) use ($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to Kidsfable')
                ->from('info@kidsfable.com', 'Kidsfable');
        });
        return redirect('contact-us');
    }

    

    public function teacher()
    {
        return view('teacher');
    }

    public function service()
    {
        return view('service');
    }

    public function faqs()
    {
        $faq = Faq::where('status','active')->get();
        return view('faqs',compact('faq'));
    }

    public function account()
    {
        return view('account');
    }

    /*--- Booking Program ---*/ 
}
