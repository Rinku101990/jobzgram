<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\PageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PageController@index')->name('index');

Route::get('about-us', 'PageController@about')->name('about');
/*--- For Landing Page ---*/ 
Route::get('craftingmylife.com', 'PageController@landingpage')->name('landingpage');
/*--- For Landing Page ---*/ 
Route::get('who-we-are', 'PageController@who_we_are')->name('who_we_are');
Route::get('what-we-do', 'PageController@what_we_do')->name('what_we_do');
Route::get('fablian-family', 'PageController@fablian_family')->name('fablian_family');
Route::get('parenting-solutions', 'PageController@parenting_solutions')->name('parenting_solutions');
Route::get('program', 'PageController@program')->name('program');
Route::get('program/{id}', 'PageController@program_data')->name('program_data');

Route::get('program-detail/{id}', 'PageController@program_detail')->name('program_detail');
Route::get('program-book-for-demo/{id}', 'PageController@program_book_for_demo')->name('program_book_for_demo'); // Free Payment
Route::post('live_demo_update','PageController@live_demo_update')->name('live_demo_updat');
Route::get('enroll-for-program/{id}', 'PageController@enroll_for_program')->name('enroll_for_program'); // Gateway Payment

Route::get('makepayment/{id}', 'PageController@makepayment')->name('makepayment');
Route::post('thankyou', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('thankyou', [RazorpayPaymentController::class, 'program_success'])->name('razorpay.payment.program_success');

Route::get('crafting-my-live', 'PageController@crafting_my_live')->name('crafting_my_live');
Route::get('leader-in-me', 'PageController@leader_in_me')->name('leader_in_me');

//Route::get('live-demo', 'PageController@live_demo')->name('live_demo');
//Route::post('live_demo_update','PageController@live_demo_update')->name('live_demo_update');	

//Route::get('live-for-program', 'PageController@live_for_program')->name('live_for_program');
Route::get('child-counsellor', 'PageController@child_counsellor')->name('child_counsellor');
Route::get('counsellor-slot', 'PageController@counsellor_slot')->name('counsellor_slot');
Route::get('slot-booking', 'PageController@slot_booking')->name('slot_booking');
Route::post('booking_slot', 'PageController@booking_slot')->name('booking_slot');
Route::get('booking-thank', 'PageController@booking_thank')->name('booking_thank');
Route::get('about-counselling-service', 'PageController@about_counselling_service')->name('about_counselling_service');

// Route::get('parenting-forum', 'PageController@parenting_forum')->name('parenting_forum');
Route::get('about-parenting-forum', 'PageController@about_parenting_forum')->name('about_parenting_forum');
Route::get('about-kids-wellness-services', 'PageController@about_kids_wellness_services')->name('about_kids_wellness_services');
Route::get('about-our-program', 'PageController@about_our_program')->name('about_our_program');

Route::get('kids-wellness-services', 'PageController@kids_wellness_services')->name('kids_wellness_services');
Route::get('counsellors-and-coaches', 'PageController@counsellors_and_coaches')->name('counsellors_and_coaches');

Route::get('courses', 'PageController@courses')->name('courses');
Route::get('course-details/{id}', 'PageController@courses_details')->name('courses_details');
Route::post('course_attend', 'PageController@course_attend')->name('course_attend');
Route::get('course-payment-confirmation/{id}', 'PageController@course_payment_confirmation')->name('course_payment_confirmation');
Route::post('course-thankyou', [RazorpayPaymentController::class, 'saveCourse'])->name('razorpay.payment.saveCourse');
Route::get('course-thankyou', [RazorpayPaymentController::class, 'success'])->name('razorpay.payment.success');


Route::get('blog', 'PageController@blog')->name('blog');
Route::get('blog/{id}', 'PageController@blog_details')->name('blog_details');
Route::get('blog-edit/{id}', 'PageController@blog_edit')->name('blog_edit');
Route::post('blog_update', 'PageController@blog_update')->name('blog_update');
Route::post('blog-delete', 'PageController@blog_delete')->name('blog_delete');

Route::post('blog_comment', 'PageController@blog_comment')->name('blog_comment');
Route::post('blog_save', 'PageController@blog_save')->name('blog_save');

Route::post('blike-save', 'PageController@blike')->name('blike');
Route::post('blike-delete', 'PageController@blike_delete')->name('blike_delete');

Route::post('favourite-save', 'PageController@favourite')->name('favourite');
Route::post('favourite-delete', 'PageController@favourite_delete')->name('favourite_delete');

Route::post('follow-save', 'PageController@follow')->name('follow');
Route::post('follow-delete', 'PageController@follow_delete')->name('follow_delete');

Route::post('fav-webinar', 'PageController@fav_webinar')->name('fav_webinar');
Route::post('fav-webinar-delete', 'PageController@fav_webinar_delete')->name('fav_webinar_delete');

Route::get('parenting-tips', 'PageController@parenting_tips')->name('parenting_tips');
Route::post('parenting_tip_save', 'PageController@parenting_tip_save')->name('parenting_tip_save');
Route::post('parenting_tip_reply', 'PageController@parenting_tip_reply')->name('parenting_tip_reply');
Route::get('parenting-webinars', 'PageController@parenting_webinars')->name('parenting_webinars');
Route::get('parenting-webinars/{id}', 'PageController@webinar_details')->name('webinar_details');
Route::post('webinar_attent', 'PageController@webinar_attent')->name('webinar_attent');

Route::get('webinar-payment-confirmation/{id}', 'PageController@webinar_payment_confirmation')->name('webinar_payment_confirmation');
Route::post('webinar-thankyou', [RazorpayPaymentController::class, 'save'])->name('razorpay.payment.save');
Route::get('webinar-thankyou', [RazorpayPaymentController::class, 'success'])->name('razorpay.payment.success');

Route::post('webinar_save', 'PageController@webinar_save')->name('webinar_save');

Route::get('contact-us', 'PageController@contact')->name('contact');


Route::get('terms-conditions', 'PageController@terms')->name('terms');
Route::get('privacy-policy', 'PageController@privacy_policy')->name('privacy_policy');
Route::get('teacher', 'PageController@teacher')->name('teacher');
Route::get('service', 'PageController@service')->name('service');
Route::get('faqs', 'PageController@faqs')->name('faqs');
Route::get('account', 'PageController@account')->name('account');

Route::get('login-register', 'PageController@student')->name('login-register');
Auth::routes();
Auth::routes(['verify' => true]);

/*--- Social Login Route ---*/ 
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');
/*--- End Social Login Route ---*/ 

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');






Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'StudentController@index')->middleware('verified');
Route::get('my-profile', 'StudentController@my_profile')->name('my_profile');
Route::get('my-courses', 'StudentController@my_courses')->name('my_courses');
Route::get('student-parenting-forum', 'StudentController@student_parenting_forum')->name('student_parenting_forum');
Route::get('transactions', 'StudentController@transactions')->name('transactions');
Route::get('student-list', 'StudentController@student_list')->name('student_list');
Route::get('student-details/{id}','StudentController@student_details')->name('student_details');
Route::get('published-blog', 'StudentController@published_blog')->name('published_blog');
Route::get('approval-blog', 'StudentController@approval_blog')->name('approval_blog');
Route::get('rejected-blog', 'StudentController@rejected_blog')->name('rejected_blog');
Route::get('blog-list', 'StudentController@blog_list')->name('blog_list');
Route::get('following-me', 'StudentController@following_me')->name('following_me');
Route::get('my-program', 'StudentController@my_program')->name('my_program');
Route::get('student-program', 'StudentController@student_program')->name('student_program');
Route::get('ajax-student-program', 'StudentController@ajax_student_program')->name('ajax_student_program');
Route::get('ajax-booking-slot', 'StudentController@ajax_booking_slot')->name('ajax_booking_slot');
Route::get('myprogram', 'StudentController@myprogram')->name('myprogram');
Route::get('student-appointment', 'StudentController@student_appointment')->name('student_appointment');
Route::get('following', 'StudentController@following')->name('following');
Route::get('fav-blogs', 'StudentController@fav_blogs')->name('fav_blogs');

Route::get('my-query', 'StudentController@my_query')->name('my_query');
Route::get('myquery-edit/{id}', 'StudentController@myquery_edit')->name('myquery_edit');
Route::post('myquery_update', 'StudentController@myquery_update')->name('myquery_update');
Route::post('myquery-delete', 'StudentController@myquery_delete')->name('myquery_delete');

Route::get('tips-given', 'StudentController@tips_given')->name('tips_given');
Route::get('webinar-attended', 'StudentController@webinar_attended')->name('webinar_attended');
Route::get('favourite-webinar', 'StudentController@favourite_webinar')->name('favourite_webinar');
Route::get('batch', 'StudentController@batch')->name('batch');
Route::get('batch/{id}','StudentController@batch_view')->name('batch.batch_view');
Route::get('student-teacher', 'StudentController@student_teacher')->name('student_teacher');
Route::get('counsellor-feeback/{id}','StudentController@counsellor_feeback')->name('counsellor_feeback');
Route::get('teacher-feeback/{id}','StudentController@teacher_feeback')->name('teacher_feeback');
Route::post('feedback_save','StudentController@feedback_save')->name('feedback_save');
Route::get('study-materials', 'StudentController@study_materials')->name('study_materials');
Route::get('study-materials/{id}','StudentController@study_view')->name('study_view');
Route::post('teacher-observation', 'StudentController@teacher_observation');
Route::post('student-document', 'StudentController@student_document');
Route::get('change-password', 'StudentController@change_password')->name('change_password');
Route::post('profile_update','StudentController@profile_update')->name('profile_update');	
Route::post('update-password', 'StudentController@UpdatePassword');

Route::get('payment-list', 'StudentController@payment')->name('payment');
Route::get('wallet', 'StudentController@student_wallet')->name('student_wallet');
Route::get('payment-history', 'StudentController@payment_history')->name('payment_history');
Route::get('download-invoice', 'StudentController@download_invoice')->name('download_invoice');
Route::get('invoice', 'StudentController@payment_invoice')->name('payment_invoice');
Route::get('paymentinvoice', 'StudentController@paymentinvoice')->name('paymentinvoice');

Route::get('payment-details', 'StudentController@payment_details')->name('payment_details');
Route::get('feedback-and-reviews', 'StudentController@feedback')->name('feedback_and_reviews');

Route::get('appointment', 'StudentController@appointment')->name('appointment');

Route::get('booking-appointment', 'StudentController@booking_appointment')->name('booking_appointment');
Route::resource('slot','SlotController');	

Route::get('/about', 'HomeController@about')->name('about');


Route::get('admin','Admin\AdminAuthController@getLogin')->name('adminLogin');
Route::get('admin/login','Admin\AdminAuthController@getLogin')->name('adminLogin');
Route::post('admin/login', 'Admin\AdminAuthController@postLogin')->name('adminLoginPost');
Route::get('admin/logout', 'Admin\AdminAuthController@logout')->name('adminLogout');

Route::group(['prefix' => 'admin','middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard','Admin\AdminController@dashboard')->name('admin.dashboard');	
	Route::get('profile','Admin\AdminController@profile')->name('admin.profile');	
	Route::post('profile_update','Admin\AdminController@profile_update')->name('admin.profile_update');	
	Route::get('user', 'Admin\UserController@index')->name('admin.user.index');
	Route::get('user/{id}','Admin\UserController@view')->name('admin.user.view');
	Route::get('user/status/{status}/{id}', 'Admin\UserController@UserStatus')->name('admin.user.status');	
	Route::get('teacher','Admin\UserController@teacher')->name('admin.user.teacher');	
	Route::resource('batch','Admin\BatchController');	
	Route::resource('assign','Admin\AssignController');	
	Route::get('assign/teacher/{id}','Admin\AssignController@teacher')->name('admin.assign.teacher');	
	Route::resource('study-material','Admin\StudyMaterialController');	
	Route::get('teacher/{id}','Admin\UserController@view')->name('admin.user.teacher.view');
	Route::get('counsellors','Admin\UserController@counsellors')->name('admin.user.counsellors');	
	Route::get('counsellors/{id}','Admin\UserController@view')->name('admin.user.counsellors.view');
	Route::resource('course','Admin\CourseController');
	Route::resource('batches','Admin\BatchesController');		
	Route::resource('banner','Admin\BannerController');	
	Route::resource('week','Admin\WeekController');	
	Route::get('slot','Admin\WeekController@slot')->name('admin.week.slot');	
	Route::get('booking-appointment', 'Admin\WeekController@booking_appointment')->name('admin.booking_appointment');
	Route::resource('page','Admin\PageController');	
	Route::resource('program','Admin\ProgramController');

	Route::resource('category','Admin\CategoryController');
	Route::resource('tag_category','Admin\TagCategoryController');
	Route::resource('search_tag','Admin\SearchTagController');

	Route::get('booking-program', 'Admin\ProgramController@booking_program')->name('admin.booking_program');

	Route::resource('session','Admin\SessionController');
	Route::resource('blogcategory','Admin\BlogCategoryController');	
	Route::resource('blog','Admin\BlogController');
	Route::resource('parentingwebinar','Admin\ParentingwebinarController');	
	Route::resource('speaker','Admin\SpeakerController');	
	Route::get('information', 'Admin\ParentingwebinarController@information')->name('admin.parentingwebinar.information');	
	Route::get('webinar-attended', 'Admin\ParentingwebinarController@webinar_attended')->name('admin.parentingwebinar.webinar_attended');	
	Route::resource('faq','Admin\FaqController');
	Route::resource('testimonial','Admin\TestimonialController');	
	Route::post('bannerDelete','Admin\BannerController@bannerDelete');	
	Route::get('logout', 'Admin\AdminAuthController@logout')->name('admin.logout');

});
