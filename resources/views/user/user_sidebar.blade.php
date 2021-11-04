<style>
   .course-table-item i.fa.fa-angle-down {
   margin-top: 7px;
   }
   .course-table-item ul li {
   color: #111;
   padding-top: 10px;
   }
   /* .course-table-item:hover ul.dropdown{
   display: block !important;	
   } */
   ul li ul.dropdown li{
   display: block;
   }
</style>
<div class="col-lg-3">
   <div class="yl-instructor-img-text text-center position-relative" style="background: #fff">
      <div class="yl-instructor-img position-relative">
         @if(Storage::disk('public')->exists('/profile/'.Auth::user()->profileImage) && Auth::user()->profileImage !='')
         <img id="profile-photo" src="{{ url('/storage/profile/').'/'.Auth::user()->profileImage}}">
         @else
         <img id="profile-photo" src="{{ asset('assets/img/teacher/inst-7.jpg') }}">
         @endif
      </div>
      <div class="yl-instructor-text yl-headline position-relative">
         <h5 style="color:#0051DE;font-size:0.85rem !important" class="mb-1">@if(Auth::user()->registerAs=='student'){{__('(Parents)')}} 
            @elseif(Auth::user()->registerAs=='child_counsellor'){{__('(Counselor or Coach)')}}
            @elseif(Auth::user()->registerAs=='teacher'){{__('(Mentor)')}}
            @endif
         </h5>
         @if(Auth::user()->prefixName!='')
         <h3><a href="{{url('dashboard')}}">{{ Auth::user()->prefixName.' '.Auth::user()->name }}</a></h3>
         @else
         <h3><a href="{{url('dashboard')}}">{{ Auth::user()->name }}</a></h3>
         @endif
         <span class="yl-ins-degi">+91-{{ Auth::user()->mobile }}
         @if(Auth::user()->registerAs=='child_counsellor')
         <br>
         {{ Auth::user()->specialization }}
         @endif
         </span>
         @if(Auth::user()->registerAs!='student')
         <div class="star rating">
            <ul>
               <li><i class="fa fa-star"></i></li>
               <li><i class="fas fa-star"></i></li>
               <li><i class="fas fa-star"></i></li>
               <li><i class="fas fa-star"></i></li>
               <li><i class="fas fa-star"></i></li>
            </ul>
         </div>
         @endif
      </div>
   </div>
   <br>
   <div class="course-details-widget">
      <div class="course-widget-wrap">
         <div class="cd-course-table-widget">
            <div class="cd-course-table-list">
               <div class="course-table-item @if((@$page == 'dashboard')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('dashboard') }}">
                  <span class="cd-table-title"><i class="fas fa-home"></i> Dashboard </span>
                  </a>
               </div>
               <div class="course-table-item  @if((\Request::route()->getName() == 'my_profile') || (\Request::route()->getName() == 'change_password')){{ __('active') }} @endif clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="1">
                  <span class="cd-table-title"><i class="fas fa-user"></i> My Profile <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> <ul class="dropdown show1"  @if((\Request::route()->getName() == 'my_profile') || (\Request::route()->getName() == 'change_password')) style="display:block" @else style="display:none" @endif >
                  <li><a href="{{ url('my-profile')}}" @if((\Request::route()->getName() == 'my_profile')) style="color:#0051DE" @endif>Edit Profile</a></li>
                  <li><a href="{{ url('change-password') }}" @if((\Request::route()->getName() == 'change_password')) style="color:#0051DE" @endif>Change Password</a></li>
                  <li>
                     <a href="javascript:void(0)" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                     Logout
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
                  </li>
                  </ul>
               </div>
               @if(Auth::user()->registerAs=='student')
               <div class="course-table-item clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="2">
                  <span class="cd-table-title @if((\Request::route()->getName()== 'payment_history') || (\Request::route()->getName() == 'student_wallet')){{ __('active') }} @endif"><i class="fas fa-users"></i>  My Account <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> 
                  <ul class="dropdown show2" @if((\Request::route()->getName() == 'payment_history') || (\Request::route()->getName() == 'student_wallet')) style="display:block" @else style="display:none" @endif>
                     <li><a href="{{url('wallet')}}" @if((\Request::route()->getName() == 'student_wallet')) style="color:#0051DE" @endif>My Wallet</a></li>
                    
                     <li><a href="{{url('payment-history')}}" @if((\Request::route()->getName() == 'payment_history')) style="color:#0051DE" @endif>My Purchase history</a>
                     </li>
                  </ul>
               </div>
               <div class="course-table-item clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="3">
                  <span class="cd-table-title @if((\Request::route()->getName()== 'published_blog') || (\Request::route()->getName() == 'approval_blog') || (\Request::route()->getName()== 'blog_list') || (\Request::route()->getName()== 'rejected_blog') || (\Request::route()->getName()== 'following_me') || (\Request::route()->getName()== 'following') || (\Request::route()->getName()== 'fav_blogs')){{ __('active') }} @endif"><i class="fas fa-barcode"></i>  My Blogs <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> <ul class="dropdown show3"  @if((\Request::route()->getName() == 'published_blog') || (\Request::route()->getName() == 'approval_blog') || (\Request::route()->getName()== 'blog_list') || (\Request::route()->getName()== 'rejected_blog') || (\Request::route()->getName()== 'following_me') || (\Request::route()->getName()== 'following') || (\Request::route()->getName()== 'fav_blogs')) style="display:block" @else style="display:none" @endif>
                  <li><a href="{{url('blog-list')}}" @if((\Request::route()->getName() == 'blog_list')) style="color:#0051DE" @endif> My Blogs</a></li>
                  <!-- <li><a href="{{url('published-blog')}}" @if((\Request::route()->getName() == 'published_blog')) style="color:#0051DE" @endif>My Published Blogs</a></li>
                  <li><a href="{{url('approval-blog')}}" @if((\Request::route()->getName() == 'approval_blog')) style="color:#0051DE" @endif>Pending for Approval</a></li>
                  <li><a href="{{url('rejected-blog')}}" @if((\Request::route()->getName() == 'rejected_blog')) style="color:#0051DE" @endif>Rejected Blogs</a></li> -->
                  <li><a href="{{url('following-me')}}"  @if((\Request::route()->getName() == 'following_me')) style="color:#0051DE" @endif>Following me</a></li>
                  <li><a href="{{url('following')}}" @if((\Request::route()->getName() == 'following')) style="color:#0051DE" @endif>I am Following</a></li>
                  <li><a href="{{url('fav-blogs')}}" @if((\Request::route()->getName() == 'fav_blogs')) style="color:#0051DE" @endif>Fav Blogs</a></li>
                 
                  </ul>                                  
               </div>
               <div class="course-table-item @if((\Request::route()->getName() == 'my_query')) active @endif clearfix">
                  <a href="{{url('my-query')}}" >
                  <span class="cd-table-title"><i class="fas fa-th"></i>  Parenting Tips <!--<i class="fa fa-angle-down" style="float: right;" ></i>--> </span>
                  </a>
                   <!-- <ul class="dropdown show4" @if((\Request::route()->getName() == 'my_query') || (\Request::route()->getName() == 'tips_given')) style="display:block" @else style="display:none" @endif>
                  <li><a href="{{url('my-query')}}" @if((\Request::route()->getName() == 'my_query')) style="color:#0051DE" @endif>My Queries</a></li>
                  <li><a href="{{url('tips-given')}}" @if((\Request::route()->getName() == 'tips_given')) style="color:#0051DE" @endif>Tips Given by me</a></li>
                  </ul>                                   -->
               </div>
               <div class="course-table-item @if((\Request::route()->getName() == 'webinar_attended') || (\Request::route()->getName() == 'favourite_webinar')) active @endif clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="5">
                  <span class="cd-table-title"><i class="fas fa-th"></i>  My Webinar <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> 
                  <ul class="dropdown show5" @if((\Request::route()->getName() == 'webinar_attended') || (\Request::route()->getName() == 'favourite_webinar')) style="display:block" @else style="display:none" @endif>
                     <li><a href="{{url('webinar-attended')}}">Webinar attended by me</a></li>
                     <li><a href="{{url('favourite-webinar')}}">Fav Webinar</a></li>
                  </ul>
               </div>
             
               <div class="course-table-item @if((\Request::route()->getName() == 'my_program') || (\Request::route()->getName() == 'teacher_feeback')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('my-program') }}">
                  <span class="cd-table-title"><i class="fas fa-list"></i> My Program </span>                                       
                  </a>
               </div>
               <!-- <div class="course-table-item clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="7">
                  <span class="cd-table-title"><i class="fas fa-indent"></i>  My Counseling Session <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> 
                  <ul class="dropdown show7" style="display: none;">
                     <li><a href="#">Booked Session</a></li>
                     <li><a href="#">My Batch </a></li>
                     <li><a href="#">My Schedule </a></li>
                     <li><a href="#">Live</a></li>
                     <li><a href="#">About counselor</a></li>
                  </ul>
               </div> -->
               <div class="course-table-item @if((\Request::route()->getName() == 'booking-appointment') || (\Request::route()->getName() == 'counsellor_feeback')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('booking-appointment') }}">
                  <span class="cd-table-title"><i class="fas fa-file-alt"></i> Booking Appointment </span>                                       
                  </a>
               </div>
               @elseif(Auth::user()->registerAs=='teacher')
               <div class="course-table-item clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="22">
                  <span class="cd-table-title @if((\Request::route()->getName()== 'payment')){{ __('active') }} @endif"><i class="fas fa-indent"></i> My Account <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> 
                  <ul class="dropdown show17" @if((\Request::route()->getName() == 'payment')) style="display:block" @else style="display:none" @endif>
                     <li><a href="{{ url('payment-list') }}" @if((\Request::route()->getName() == 'payment')) style="color:#0051DE" @endif>Payment History</a></li>
                     <li><a href="javascript:void(0);">Account Details </a></li>
                    
                  </ul>
               </div>
               <div class="course-table-item @if((\Request::route()->getName() == 'myprogram')){{ __('active') }} @endif  clearfix">
                  <a href="{{ url('myprogram') }}">
                  <span class="cd-table-title"><i class="fas fa-microchip"></i> My Programs</span>                                       
                  </a>
               </div>
               <div class="course-table-item @if((\Request::route()->getName() == 'student_list')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('student-list') }}">
                  <span class="cd-table-title"><i class="fas fa-list"></i> Student List </span>                                       
                  </a>
               </div>
               <div class="course-table-item @if((\Request::route()->getName() == 'batch') || (\Request::route()->getName() == 'batch.batch_view')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('batch') }}">
                  <span class="cd-table-title"><i class="fas fa-th"></i> Batch List </span>                                       
                  </a>
               </div>
               <!-- <div class="course-table-item @if((\Request::route()->getName() == 'study_materials') || (\Request::route()->getName() == 'study_view')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('study-materials') }}">
                  <span class="cd-table-title"><i class="fas fa-file-alt"></i> Study Materials </span>                                       
                  </a>
               </div> -->
               <!-- <div class="course-table-item  clearfix">
                  <a href="#">
                  <span class="cd-table-title"><i class="fas fa-qrcode"></i> My Repositories</span>                                       
                  </a>
               </div>
               <div class="course-table-item  clearfix">
                  <a href="#">
                  <span class="cd-table-title"><i class="fas fa-graduation-cap"></i> My Training Sessions</span>                                       
                  </a>
               </div> -->
               <div class="course-table-item  @if((\Request::route()->getName() == 'feedback_and_reviews')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('feedback-and-reviews') }}" @if((\Request::route()->getName() == 'feedback_and_reviews')) style="color:#0051DE" @endif>
                     <span class="cd-table-title"><i class="fas fa-comments"></i> Feedback & Reviews</span>                                       
                  </a>
               </div>
               @elseif(Auth::user()->registerAs=='child_counsellor')
               <div class="course-table-item clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="17">
                  <span class="cd-table-title @if((\Request::route()->getName()== 'payment')){{ __('active') }} @endif"><i class="fas fa-indent"></i> My Account <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> 
                  <ul class="dropdown show17" @if((\Request::route()->getName() == 'payment')) style="display:block" @else style="display:none" @endif>
                     <li><a href="{{ url('payment-details') }}" @if((\Request::route()->getName() == 'payment')) style="color:#0051DE" @endif>Payment History</a></li>
                     <li><a href="javascript:void(0);">Account Details </a></li>
                     <!-- <li><a href="javascript:void(0)">Subscribe for Premium </a></li> -->
                  </ul>
               </div>
               
               <div class="course-table-item @if((\Request::route()->getName() == 'appointment')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('appointment') }}">
                  <span class="cd-table-title"><i class="fas fa-th"></i> My Bookings </span>
                  </a> 
                  <!-- <ul class="dropdown show18" style="display: none;">
                     <li><a href="#">Past bookings</a></li>
                     <li><a href="#">Upcoming Bookings </a></li>
                  </ul> -->
               </div>
               
               <!-- <div class="course-table-item clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="19">
                  <span class="cd-table-title"><i class="fas fa-phone"></i> Call Details <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> 
                  <ul class="dropdown show19" style="display: none;">
                     <li><a href="javascript:void(0);">Call the client</a></li>
                     <li><a href="javascript:void(0);">Call recordings </a></li>
                  </ul>
               </div> -->  
               
               <!-- <div class="course-table-item clearfix">
                  <a href="javascript:void(0);" class="menu_click" id="20">
                  <span class="cd-table-title"><i class="fas fa-users"></i> 	My Clients <i class="fa fa-angle-down" style="float: right;" ></i></span>
                  </a> 
                  <ul class="dropdown show20" style="display: none;">
                     <li style="list-style: none; margin-left: -20px;"><a href="#" style="color: #0051DE; font-size: 16px; font-weight: 700;"> 1. Client1 </a></li>
                     <li><a href="#">Client Profile</a></li>
                     <li><a href="#">Diagnosis </a></li>
                     <li><a href="#">Detail description of the Case </a></li>
                     <li><a href="#">Sessions Details </a></li>
                     <li style="list-style: none; margin-left: -20px;"><a href="#" style="color: #0051DE; font-size: 16px; font-weight: 700;"> 2. Client2 </a></li>
                     <li><a href="#">Diagnosis </a></li>
                     <li><a href="#">Detail description of the Case </a></li>
                     <li><a href="#">Sessions Details </a></li>
                  </ul>
               </div> -->
               
              
               
               <div class="course-table-item @if((\Request::route()->getName() == 'slot.index') || (\Request::route()->getName() == 'slot.create') || (\Request::route()->getName() == 'slot.edit')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('slot') }}">
                  <span class="cd-table-title"><i class="fas fa-clock"></i> Slot List </span>                                       
                  </a>
               </div>
               <div class="course-table-item  @if((\Request::route()->getName() == 'feedback_and_reviews')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('feedback-and-reviews') }}" @if((\Request::route()->getName() == 'feedback_and_reviews')) style="color:#0051DE" @endif>
                     <span class="cd-table-title"><i class="fas fa-comments"></i> Feedback & Reviews</span>                                       
                  </a>
               </div>
               
               <!-- <div class="course-table-item @if((\Request::route()->getName() == 'appointment')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('appointment') }}">
                  <span class="cd-table-title"><i class="fas fa-file-alt"></i> Appointment List </span>                                       
                  </a>
               </div> -->
               
               <!-- <div class="course-table-item @if((\Request::route()->getName() == 'availability')){{ __('active') }} @endif clearfix">
                  <a href="{{ url('availability') }}">
                  <span class="cd-table-title"><i class="fas fa-th"></i> Availability List </span>                                       
                  </a>
               </div> -->
               @endif
               <!-- <div class="course-table-item @if((\Request::route()->getName() == 'transactions')){{ __('active') }} @endif  clearfix">
                  <a href="{{ url('transactions') }}">
                   <span class="cd-table-title"><i class="fas fa-money-bill-alt"></i> Transactions </span>
                   
                  </a>
                  </div> -->
            </div>
         </div>
      </div>
   </div>
</div>
