<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>{{config('app.name')}} </title>
      <meta name="description" content="Welcome to Kids Fable" />
      <meta name="keywords" content="Welcome to Kids Fable" />
      <meta name="theme-color" content="#0051DE">
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/kids-logo.png') }}" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link href='https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
      <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/odometer-theme-default.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
      
      <style>
         .invalid-feedback {  
         width: 100%;    
         font-size: 12px;
         color: #dc3545;
         display: block;
         }
         .error{
         color:red;
         }
      </style>
   </head>
   <body class="yl-home">
      <!-- preloader - start -->
      <div class="up">
         <a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
      </div>
      <!-- Start of header section
         ============================================= -->
      <header id="yl-header" class="yl-header-main header-style-four">
         <div class="header-top clearfix">
            <div class="container">
               <div class="header-top-cta-social">
                  <div class="header-top-cta float-left">
                     <span><i class="fas fa-phone"></i>  <a href="tel:+918178023579">+918178023579</a></span>
                     <span><i class="fas fa-envelope"></i>  <a href="mailto:info@kidsfabel.com">info@kidsfable.com</a></span>
                  </div>
                  <div class="header-top-social float-right">
                     <a href="#"><i class="fab fa-whatsapp"></i></a>
                     <a href="https://www.facebook.com/KidFables"><i class="fab fa-facebook-f"></i></a>
                     <a href="https://twitter.com/kids_fable"><i class="fab fa-twitter"></i></a>
                     <a href="https://www.linkedin.com/company/kids-fable"><i class="fab fa-linkedin"></i></a>
                     <a href="https://www.instagram.com/kidsfable/"><i class="fab fa-instagram"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="yl-header-menu-wrap clearfix">
            <div class="container">
               <div class="yl-main-nav-wrap">
                  <div class="yl-brand-logo float-left">
                     <a href="{{ url('/') }}"><img src="{{url('assets/images/Kids-Fable-logo.png')}}" alt="Kids Fable" style="padding:2px 0;"></a>
                  </div>
                  <nav class="yl-main-navigation float-right ul-li" style="width: 86%">
                     <ul id="main-nav" class="navbar-nav text-capitalize clearfix">
                        @if((\Request::route()->getName() == 'about') || (\Request::route()->getName() == 'who_we_are') || (\Request::route()->getName() == 'what_we_do') || (\Request::route()->getName() == 'faqs') || (\Request::route()->getName() == 'contact') || (\Request::route()->getName() == 'fablian_family'))
                        <li class="dropdown" @if((\Request::route()->getName() == 'about')){{ __('class=active') }} @endif>
                        <a href="javascript:void(0)">About Us <i class="fas fa-angle-down"></i></a>
                        <ul class="dropdown-menu clearfix">
                           <li @if((\Request::route()->getName() == 'about')){{ __('class=active') }} @endif><a href="{{ url('about-us')}}">About Us</a></li>
                           <li @if((\Request::route()->getName() == 'who_we_are')){{ __('class=active') }} @endif><a href="{{ url('who-we-are') }}">Who We Are  </a></li>
                           <li @if((\Request::route()->getName() == 'what_we_do')){{ __('class=active') }} @endif><a href="{{ url('what-we-do') }}">What We Do  </a></li>
                        </ul>
                        </li>
                        <li class="dropdown" @if((\Request::route()->getName() == 'parenting_forum')){{ __('class=active') }} @endif>
                           <a href="javascript:void(0)" >Our Solutions <i class="fas fa-angle-down"></i></a>
                           <ul class="dropdown-menu clearfix">
                              <li @if((\Request::route()->getName() == 'about_parenting_forum')){{ __('class=active') }} @endif><a href="{{ url('about-parenting-forum') }}">About parenting forum</a></li>
                              <li @if((\Request::route()->getName() == 'about_kids_wellness_services')){{ __('class=active') }} @endif><a href="{{ url('about-kids-wellness-services') }}">About kids wellness service</a></li>
                              <li  @if((\Request::route()->getName() == 'about_our_program')){{ __('class=active') }} @endif><a href="{{ url('about-our-program') }}">About our programs</a></li>
                           </ul>
                        </li>
                        <li @if(\Request::route()->getName() == 'fablian_family'){{ __('class=active') }} @endif><a href="{{ url('fablian-family') }}" > Fabilian Family   </a>    </li>
                        <li  @if((\Request::route()->getName() == 'faqs')){{ __('class=active') }} @endif><a href="{{ url('faqs') }}">FAQs</a></li>
                        @elseif((\Request::route()->getName() == 'about_parenting_forum'))
                           <li @if((\Request::route()->getName() == 'about_parenting_forum')){{ __('class=active') }} @endif><a href="{{ url('about-parenting-forum')}}">About parenting forum</a></li>
                        @elseif((\Request::route()->getName() == 'about_kids_wellness_services'))
                           <li @if((\Request::route()->getName() == 'about_kids_wellness_services')){{ __('class=active') }} @endif><a href="{{ url('about-kids-wellness-services')}}">About kids wellness service</a></li>
                        @elseif((\Request::route()->getName() == 'about_our_program'))
                           <li @if((\Request::route()->getName() == 'about_our_program')){{ __('class=active') }} @endif><a href="{{ url('about-our-program')}}">About our programs</a></li>

                        @elseif((\Request::route()->getName() == 'kids_wellness_services') || (\Request::route()->getName() == 'counsellors_and_coaches')  || (\Request::route()->getName() == 'courses'))
                           <li @if((\Request::route()->getName() == 'counsellors_and_coaches')){{ __('class=active') }} @endif><a href="{{ url('counsellors-and-coaches')}}">Coaches  & Counselors</a></li>
                        @elseif((\Request::route()->getName() == 'parenting_forum') || (\Request::route()->getName() == 'blog') || (\Request::route()->getName() == 'parenting_tips') || (\Request::route()->getName() == 'parenting_webinars') || (\Request::route()->getName() == 'blog_details') || (\Request::route()->getName() == 'webinar_details'))
                           <li @if((\Request::route()->getName() == 'blog')  || (\Request::route()->getName() == 'blog_details')){{ __('class=active') }} @endif><a href="{{ url('blog')}}">Blogs</a></li>
                           <li @if((\Request::route()->getName() == 'parenting_tips')){{ __('class=active') }} @endif><a href="{{ url('parenting-tips') }}">Parenting tips</a></li>
                           <li @if((\Request::route()->getName() == 'parenting_webinars')  || (\Request::route()->getName() == 'webinar_details')){{ __('class=active') }} @endif><a href="{{ url('parenting-webinars') }}">Webinars & Workshops</a></li>
                        @elseif((\Request::route()->getName() == 'program') || (\Request::route()->getName() == 'program_data') || (\Request::route()->getName() == 'live_demo') || (\Request::route()->getName() == 'live_for_program')  || (\Request::route()->getName() == 'crafting_my_live') || (\Request::route()->getName() == 'leader_in_me'))
                        @foreach($categoryList as $cate_val)
                        <li><a href="{{ url('program'.'/'.$cate_val->url_slug) }}">{{$cate_val->title}}</a></li>
                        @endforeach
                        
                        @elseif((\Request::route()->getName() == 'child_counsellor') || (\Request::route()->getName() == 'about_counselling_service'))
                           <li @if((\Request::route()->getName() == 'child_counsellor')){{ __('class=active') }} @endif><a href="{{ url('child-counsellor')}}">Our Counselling</a></li>
                           <li @if((\Request::route()->getName() == 'about_counselling_service')){{ __('class=active') }} @endif><a href="{{ url('about-counselling-service') }}">About Counselling Service</a></li>
                        @else
                        
                        <li><a href="{{ url('blog')}}">Parenting Forum</a></li>
                        <li><a href="{{ url('counsellors-and-coaches') }}">Kids wellness services</a></li>
                        <li><a href="{{ url('program'.'/'.$categoryList[0]->url_slug) }}">Our Programs</a></li>
                        
                        @endif
                        @guest
                        <li class="btn_login " style="padding: 6px 5px; border: 1px solid #0051DE;float: right;  margin-top: -6px;margin-right:0px"><a href="{{ url('login-register')}}" >Sign In/Sign Up</a></li>
                        @else
                        <li class="btn_login dropdown" style="padding: 6px 5px; border: 1px solid #0051DE;float: right; margin-top: -6px;">
                           <a href="{{ url('dashboard') }}" ><b style="color: #FFA300;">Hi,</b></span> {{ substr(Auth::user()->name,0, 13) }} <i class="fas fa-angle-down" style="margin-left:3px"></i></a>
                           <ul class="dropdown-menu clearfix">
                              <li><a href="{{ url('my-profile') }}">Edit Profile </a></li>
                              <li><a href="{{ url('change-password') }}">Change Password</a></li>
                              <li>
                                 <a href="{{ url('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                 </form>
                              </li>
                           </ul>
                        </li>
                        @endguest
                     </ul>
                  </nav>
               </div>
               <div class="yl-mobile-menu-wrap">
                  <div class="yl-mobile_menu position-relative">
                     <div class="yl-mobile_menu_button yl-open_mobile_menu">
                        <i class="fas fa-bars"></i>
                     </div>
                     <div class="yl-mobile_menu_wrap">
                        <div class="mobile_menu_overlay yl-open_mobile_menu"></div>
                        <div class="yl-mobile_menu_content">
                           <div class="yl-mobile_menu_close yl-open_mobile_menu">
                              <i class="fas fa-times"></i>
                           </div>
                           <div class="m-brand-logo text-center">
                              <a href="{{ url('/') }}"><img src="{{url('assets/images/Kids-Fable-logo.png')}}" alt="Kids Fable"></a>
                           </div>
                           <div class="header-top-cta-social">
                              <div class="header-top-cta ">
                                 <span style="color: #000"><i class="fas fa-phone"></i>  <a href="tel:+918178023579">+918178023579</a></span>
                                 <br>
                                 <span style="color: #000"><i class="fas fa-envelope"></i>  <a href="mailto:info@kidsfabel.com">info@kidsfable.com</a></span>
                              </div>
                              <div class="header-top-social" style="margin: 12px 0;">
                                 <a href="#" style="color:#000 !important"><i class="fab fa-whatsapp"></i></a>
                                 <a href="https://www.facebook.com/KidFables" style="color:#000 !important"><i class="fab fa-facebook-f"></i></a>
                                 <a href="https://twitter.com/kids_fable" style="color:#000 !important"><i class="fab fa-twitter"></i></a>
                                 <a href="https://www.linkedin.com/company/kids-fable" style="color:#000 !important"><i class="fab fa-linkedin"></i></a>
                                 <a href="https://www.instagram.com/kidsfable/" style="color:#000 !important"><i class="fab fa-instagram"></i></a>
                              </div>
                              <div class="header-top-cta " style="display:flex;margin-top: 20px;">
                                 @guest
                                 <a href="{{ url('login-register')}}" class="student_btn_login" style="border: 1px solid #0051DE;">Sign In/Sign Up</a><br>                     
                                 @else
                                 <a href="{{ url('dashboard')}}" class="student_btn_login" style="border: 1px solid #0051DE;"><b style="color: #FFA300;">Hi.,</b></span> {{ Auth::user()->name }} </a><br>  
                                 <a href="{{ url('login-register')}}" class="student_btn_login" style="margin-left: 3%;border: 1px solid #0051DE;" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" alt="Logout" title="Logout" >
                                    <i class="fas fa-lock"></i> 
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                       @csrf
                                    </form>
                                 </a>
                                 @endguest
                              </div>
                              <br>
                           </div>
                           <nav class="yl-mobile-main-navigation  clearfix ul-li">
                              <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                              @if((\Request::route()->getName() == 'about') || (\Request::route()->getName() == 'who_we_are') || (\Request::route()->getName() == 'what_we_do') || (\Request::route()->getName() == 'faqs') || (\Request::route()->getName() == 'contact') || (\Request::route()->getName() == 'fablian_family'))
                              <li class="dropdown" @if((\Request::route()->getName() == 'about')){{ __('class=active') }} @endif>
                              <a href="javascript:void(0)" style="color:#000 !important">About Us <i class="fas fa-angle-down"></i></a>
                              <ul class="dropdown-menu clearfix">
                                 <li @if((\Request::route()->getName() == 'about')){{ __('class=active') }} @endif><a href="{{ url('about-us')}}" style="color:#000 !important">About Us</a></li>
                                 <li @if((\Request::route()->getName() == 'who_we_are')){{ __('class=active') }} @endif><a href="{{ url('who-we-are') }}" style="color:#000 !important">Who We Are  </a></li>
                                 <li @if((\Request::route()->getName() == 'what_we_do')){{ __('class=active') }} @endif><a href="{{ url('what-we-do') }}" style="color:#000 !important">What We Do  </a></li>
                              </ul>
                              </li>
                              <li class="dropdown" @if((\Request::route()->getName() == 'parenting_forum')){{ __('class=active') }} @endif>
                              <a href="javascript:void(0)" style="color:#000 !important">Our Solutions <i class="fas fa-angle-down"></i></a>
                              <ul class="dropdown-menu clearfix">
                                 <li @if((\Request::route()->getName() == 'about_parenting_forum')){{ __('class=active') }} @endif><a href="{{ url('about-parenting-forum') }}" style="color:#000 !important">About parenting forum</a></li>
                                 <li @if((\Request::route()->getName() == 'about_kids_wellness_services')){{ __('class=active') }} @endif><a href="{{ url('about-kids-wellness-services') }}" style="color:#000 !important">About kids wellness service</a></li>
                                 <li  @if((\Request::route()->getName() == 'about_our_program')){{ __('class=active') }} @endif><a href="{{ url('about-our-program') }}" style="color:#000 !important">About our programs</a></li>
                              </ul>
                              </li>
                              <li @if(\Request::route()->getName() == 'fablian_family'){{ __('class=active') }} @endif><a href="{{ url('fablian-family') }}" style="color:#000 !important"> Fabilian Family   </a>    </li>
                              <li  @if((\Request::route()->getName() == 'faqs')){{ __('class=active') }} @endif><a href="{{ url('faqs') }}" style="color:#000 !important">FAQs</a></li>
                              @elseif((\Request::route()->getName() == 'about_parenting_forum'))
                              <li @if((\Request::route()->getName() == 'about_parenting_forum')){{ __('class=active') }} @endif><a href="{{ url('about-parenting-forum')}}" style="color:#000 !important">About parenting forum</a></li>
                              @elseif((\Request::route()->getName() == 'about_kids_wellness_services'))
                              <li @if((\Request::route()->getName() == 'about_kids_wellness_services')){{ __('class=active') }} @endif><a href="{{ url('about-kids-wellness-services')}}" style="color:#000 !important">About kids wellness service</a></li>
                              @elseif((\Request::route()->getName() == 'about_our_program'))
                              <li @if((\Request::route()->getName() == 'about_our_program')){{ __('class=active') }} @endif><a href="{{ url('about-our-program')}}" style="color:#000 !important">About our programs</a></li>

                              @elseif((\Request::route()->getName() == 'kids_wellness_services') || (\Request::route()->getName() == 'counsellors_and_coaches'))
                              <li @if((\Request::route()->getName() == 'counsellors_and_coaches')){{ __('class=active') }} @endif><a href="{{ url('counsellors-and-coaches')}}" style="color:#000 !important">Coaches  & Counselors</a></li>
                              @elseif((\Request::route()->getName() == 'parenting_forum') || (\Request::route()->getName() == 'blog') || (\Request::route()->getName() == 'parenting_tips') || (\Request::route()->getName() == 'parenting_webinars') || (\Request::route()->getName() == 'blog_details') || (\Request::route()->getName() == 'webinar_details'))
                              <li @if((\Request::route()->getName() == 'blog')  || (\Request::route()->getName() == 'blog_details')){{ __('class=active') }} @endif><a href="{{ url('blog')}}" style="color:#000 !important">Blogs</a></li>
                              <li @if((\Request::route()->getName() == 'parenting_tips')){{ __('class=active') }} @endif><a href="{{ url('parenting-tips') }}" style="color:#000 !important">Parenting tips</a></li>
                              <li @if((\Request::route()->getName() == 'parenting_webinars')  || (\Request::route()->getName() == 'webinar_details')){{ __('class=active') }} @endif><a href="{{ url('parenting-webinars') }}" style="color:#000 !important">Webinars & Workshops</a></li>
                              @elseif((\Request::route()->getName() == 'program') || (\Request::route()->getName() == 'program_data') || (\Request::route()->getName() == 'live_demo') || (\Request::route()->getName() == 'live_for_program')  || (\Request::route()->getName() == 'crafting_my_live') || (\Request::route()->getName() == 'leader_in_me'))
                              @foreach($categoryList as $cate_val)
                              <li><a href="{{ url('program'.'/'.$cate_val->url_slug) }}" style="color:#000 !important">{{$cate_val->title}}</a></li>
                              @endforeach
                              
                              @elseif((\Request::route()->getName() == 'child_counsellor') || (\Request::route()->getName() == 'about_counselling_service'))
                              <li @if((\Request::route()->getName() == 'child_counsellor')){{ __('class=active') }} @endif><a href="{{ url('child-counsellor')}}" style="color:#000 !important">Our Counselling</a></li>
                              <li @if((\Request::route()->getName() == 'about_counselling_service')){{ __('class=active') }} @endif><a href="{{ url('about-counselling-service') }}" style="color:#000 !important">About Counselling Service</a></li>
                              @else
                              
                              <li><a href="{{ url('blog')}}" style="color:#000 !important">Parenting Forum</a></li>
                              <li><a href="{{ url('counsellors-and-coaches') }}" style="color:#000 !important">Kids wellness services</a></li>
                              <li><a href="{{ url('program'.'/'.$categoryList[0]->url_slug) }}" style="color:#000 !important">Our Programs</a></li>
                             
                              @endif
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
                  <!-- /Mobile-Menu -->
               </div>
            </div>
         </div>
      </header>
      @yield('content')
      <!-- Start of Footer  section
         ============================================= -->  
      <footer id="yl-footer" class="yl-footer-section" style="background: #FFA300">
         <div class="container">
            <div class="yl-footer-content-wrap">
               <div class="row">
                  <div class="col-lg-3 col-md-6">
                     <div class="yl-footer-widget">
                        <div class="yl-footer-logo-widget yl-headline pera-content">
                           <div class="yl-footer-logo">
                              <a href="{{ url('/') }}"><img src="{{ asset('assets/images/Kids-Fabble-logo.png') }}" alt="kids fable" style="width: 100px;"></a>
                           </div>
                           <p align="justify">At Kids Fable, the kids are our primary focus and will always be. There are several courses to choose from. We are here to assist you further. </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <div class="yl-footer-widget">
                        <div class="yl-footer-newslatter-widget pera-content">
                           <h3 class="widget-title">Quick Links</h3>
                           <div class="yl-blog-widget-wrap" style="background-color: transparent;">
                              <div class="yl-category-widget yl-headline ul-li-block position-relative" style="padding: 0">
                                 <ul style="color: #fff">
                                    <li><a href="{{ url('/') }}"><i class="fa fa-angle-right"></i> Home</a></li>
                                    <li><a href="{{ url('about-us') }}"><i class="fa fa-angle-right"></i> About Us</a></li>
                                    <li><a href="{{ url('service') }}"><i class="fa fa-angle-right"></i> Our Service</a></li>
                                    <li><a href="{{ url('blog') }}"><i class="fa fa-angle-right"></i> Our Blog</a></li>
                                    <li><a href="{{ url('contact-us') }}"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                                    <li><a href="{{ url('faqs') }}"><i class="fa fa-angle-right"></i> FAQs</a></li>
                                    <li><a href="{{ url('terms-conditions') }}"><i class="fa fa-angle-right"></i> Terms & Conditions</a></li>
                                    <li><a href="{{ url('privacy-policy') }}"><i class="fa fa-angle-right"></i> Privacy Policy</a></li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <div class="yl-footer-widget">
                        <div class="yl-footer-newslatter-widget pera-content">
                           <h3 class="widget-title">Newsletter</h3>
                           <p>Subscribe our newsletter to get our
                              latest update & news
                           </p>
                           <form action="#">
                              <input type="email" placeholder="Your mail address">
                              <button type="submit"><i class="far fa-paper-plane"></i></button>
                           </form>
                           <div class="yl-footer-social ul-li">
                              <ul>
                                 <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                                 <li><a href="https://www.facebook.com/KidFables"><i class="fab fa-facebook-f"></i></a></li>
                                 <li><a href="https://twitter.com/kids_fable"><i class="fab fa-twitter"></i></a></li>
                                 <li><a href="https://www.linkedin.com/company/kids-fable"><i class="fab fa-linkedin"></i></a></li>
                                 <li><a href="https://www.instagram.com/kidsfable/"><i class="fab fa-instagram"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                     <div class="yl-footer-widget">
                        <div class="yl-footer-info-widget ul-li">
                           <h3 class="widget-title">Official info</h3>
                           <ul>
                              <li>
                                 <i class="fas fa-map-marker-alt"></i> 
                                 <a href="#">E-802, Corona Optus, Sector 37C,  122001 - Gurgaon, Haryana
                                 </a>
                              </li>
                              <li>
                                 <i class="fas fa-phone"></i><a href="+918178023579">+918178023579</a>
                              </li>
                              <li>
                                 <i class="fas fa-envelope"></i><a href="#">info@kidsfable.com</a>
                              </li>
                           </ul>
                           <div class="office-open-hour">
                              <span>Open Hours: </span>
                              <p>Mon - Sat: 8 am - 5 pm,
                                 Sunday: CLOSED
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div style="background: #0051DE">
            <div class="container">
               <div class="yl-footer-copyright text-center"><span>Copyright © {{date("Y")}} {{config('app.name')}} . All rights reserved.</span></div>
            </div>
         </div>
      </footer>
      <!-- End of Footer section
         ============================================= -->              
      <!-- JS library -->
      <script src="{{ asset('assets/js/jquery.js') }}"></script>
      <script src="{{ asset('assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/js/appear.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/wow.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
      <script src="{{ asset('assets/js/owl.js') }}"></script>
      <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
      <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
      <script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
      <script src="{{ asset('assets/js/odometer.js') }}"></script>
      <script src="{{ asset('assets/js/custom.js') }}"></script>
      <!-- Share JS -->
      <script src="{{ asset('js/share.js') }}"></script>
      <script>
         // setTimeout(function () {
         //           $(".alert").fadeOut();
         //       }, 3000); 
      </script>
      <script>
         $(document).ready(function(){
            $(".reply").click(function(){
               let reply 		= $(this).attr('alt');
               $("#query_id").val(reply);
            });
            
            $("a.menu_click").click(function(e) {
               e.preventDefault();
               var $div = $(this).next('.dropdown');
               $(".dropdown").not($div).hide();
               if ($div.is(":visible")) {
               $div.hide()
               }  else {
               $div.show();
               }
            });
         });
      </script>
      @if((\Request::route()->getName() == 'child_counsellor'))
      <script src="{{ asset('assets/js/plugins.js') }}"></script>
      <script type="text/javascript">
         $(document).ready(function(){
         $( "#slider-range" ).slider({
            range: true,
            min: 1,
            max: 2500,
            values: [ 1, 2500 ],
            slide: function( event, ui ) {
            $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            },     
            stop: function( event, ui ) {
            $( "#amount" ).val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
            filter_data(1,0);   
            }
         });
         $( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0 ) +
            " - " + $( "#slider-range" ).slider( "values", 1 ) );
         
         
         
         
         });
         
      </script>
      @endif
      @yield('script')
      @if ($message = session()->has('success_message'))
      <script type="text/javascript">
         $(document).ready(function(){
            $('#messageModal').modal('show');
            $('#modalMessage').text("{{session()->get('success_message')}}");
            setTimeout(function() {$('#messageModal').modal('hide');}, 3000);
          });
      </script>
      @endif
      <!-- Message Modal -->
      <div class="modal fade" id="messageModal" role="dialog" style="z-index: 9999;">
         <div class="modal-dialog modal-sm" style="max-width:500px">
            <div class="modal-content">
               <div class="modalcolor modal-header modal-header-success" style=" font-family: auto;background:#0051DE">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"></h4>
               </div>
               <div class="modal-body" style=" font-family: auto;">
                  <p id="modalMessage" style="padding-top: 17px;padding-bottom: 0px;font-size: 20px;"></p>
               </div>
               <div class="modalcolor modal-footer modal-header-success" style=" font-family: auto;background:#0051DE">
               </div>
            </div>
         </div>
      </div>
   </body>
</html>