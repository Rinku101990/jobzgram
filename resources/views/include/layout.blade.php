<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>{{config('app.name')}} </title>
      <!-- Responsive -->
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <!-- Stylesheets -->
      <link rel="shortcut icon" href="{{ asset('assets/img/favicon.jpg') }}" type="image/x-icon">
      <link rel="icon" href="{{ asset('assets/img/favicon.jpg') }}" type="image/x-icon">
      <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
   </head>
   <body data-anm=".anm">
      <div class="page-wrapper">
         <!-- Main Header-->
         <header class="main-header header-style-two" style="background-color: #0a5c96 !important;">
            <div class="auto-container">
               <!-- Main box -->
               <div class="main-box">
                  <!--Nav Outer -->
                  <div class="nav-outer">
                     <div class="logo-box">
                        <div class="logo" style="background: #fff;"><a href="{{ url('/') }}"><img src="{{ asset('assets/img/jobzgram-logo.png') }}" alt="jobzgram" title="jobzgram" style="height:100px"></a></div>
                     </div>
                     <nav class="nav main-menu">
                        <ul class="navigation" id="navbar">
                           <li class="">
                              <span>Search Jobs</span>                               
                           </li>
                           <li class="">
                              <span>Work From Home</span>                               
                           </li>
                           <li class="">
                              <span>Recruiters</span>                               
                           </li>
                           <li class="">
                              <span>Services</span>                               
                           </li>
                           <li class="">
                              <span>Career Guidence</span>                               
                           </li>
                        </ul>
                     </nav>
                     <!-- Main Menu End-->
                  </div>
                  <div class="outer-box">
                     <!-- Login/Register -->
                     @guest
                     <div class="btn-box">
                        <a href="{{ url('login-page') }}" class="theme-btn btn-style-five"><span class="btn-title">Jobseeker Login</span></a>
                     </div>
                     @else
                     <div class="btn-box">
                        <a href="{{ url('dashboard') }}" class="theme-btn btn-style-five"><span class="btn-title">Hi,{{ substr(Auth::user()->name,0, 13) }}</span></a>
                     </div>
                     @endguest
                  </div>
               </div>
            </div>
            <!-- Mobile Header -->
            <div class="mobile-header">
               <div class="logo"><a href="."><img src="{{ asset('assets/img/jobzgram-logo.png') }}" alt="jobzgram" title="jobzgram"></a></div>
               <!--Nav Box-->
               <div class="nav-outer clearfix">
                  <div class="outer-box">
                     <!-- Login/Register -->
                     <div class="login-box"> 
                        <a href="#" class="call-modal"><span class="icon-user"></span></a>
                     </div>
                     <a href="#nav-mobile" class="mobile-nav-toggler navbar-trigger"><span class="flaticon-menu-1"></span></a>
                  </div>
               </div>
            </div>
            <!-- Mobile Nav -->
            <div id="nav-mobile"></div>
         </header>
         <!--End Main Header -->
         @yield('content')
         <!-- Start of Footer  section ============================================= -->  
         <!-- Main Footer -->
         <footer class="main-footer style-two">
            <div class="auto-container">
               <!--Widgets Section-->
               <div class="widgets-section">
                  <div class="row">
                     <div class="big-column col-xl-4 col-lg-3 col-md-12">
                        <div class="footer-column about-widget">
                           <div class="logo"><a href="."><img src="{{ asset('assets/img/jobzgram-logo-white.png') }}" alt="" style="    height: 100px;"></a></div>
                           <p class="phone-num"><span>Connect With Us</span></p>
                           <div class="social-links">
                              <a href="#"><i class="fab fa-facebook-f"></i></a>
                              <a href="#"><i class="fab fa-twitter"></i></a>
                              <a href="#"><i class="fab fa-instagram"></i></a>
                              <a href="#"><i class="fab fa-linkedin-in"></i></a>
                           </div>
                           <br/>
                           <p class="phone-num"><span>Download Now</span></p>
                           <img src="{{ asset('assets/img/google-play.png') }}" />
                           <img src="{{ asset('assets/img/app-store.png') }}" />
                        </div>
                     </div>
                     <div class="big-column col-xl-8 col-lg-9 col-md-12">
                        <div class="row">
                           <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                              <div class="footer-widget links-widget">
                                 <h4 class="widget-title">Information</h4>
                                 <div class="widget-content">
                                    <ul class="list">
                                       <li><a href="{{ url('login-page') }}">About Us</a></li>
                                       <li><a href="{{ url('login-page') }}">Contact Us</a></li>
                                       <li><a href="{{ url('login-page') }}">Creeer With Us</a></li>
                                       <li><a href="{{ url('login-page') }}">FAQs</a></li>
                                       <li><a href="{{ url('login-page') }}">Terms & Conditions</a></li>
                                       <li><a href="{{ url('login-page') }}">Privacy Policy</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                              <div class="footer-widget links-widget">
                                 <h4 class="widget-title">Job Seekers</h4>
                                 <div class="widget-content">
                                    <ul class="list">
                                       <li><a href="{{ url('login-page') }}">Register Now</a></li>
                                       <li><a href="{{ url('login-page') }}">Search Job</a></li>
                                       <li><a href="{{ url('login-page') }}">Login</a></li>
                                       <li><a href="{{ url('login-page') }}">Create Job Alert</a></li>
                                       <li><a href="{{ url('login-page') }}">Report a problem</a></li>
                                       <li><a href="{{ url('login-page') }}">Our Blog</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                              <div class="footer-widget links-widget">
                                 <h4 class="widget-title">Job </h4>
                                 <div class="widget-content">
                                    <ul class="list">
                                       <li><a href="{{ url('login-page') }}">Software and Technology</a></li>
                                       <li><a href="{{ url('login-page') }}">Artificial intelligence & Data Science</a></li>
                                       <li><a href="{{ url('login-page') }}">Management </a></li>
                                       <li><a href="{{ url('login-page') }}">Creativity and Design</a></li>
                                       <li><a href="{{ url('login-page') }}">Emerging Technologies</a></li>
                                       <li><a href="{{ url('login-page') }}">Engeering-non CS</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="footer-column col-lg-3 col-md-6 col-sm-12">
                              <div class="footer-widget links-widget">
                                 <h4 class="widget-title">Browse Job </h4>
                                 <div class="widget-content">
                                    <ul class="list">
                                       <li><a href="{{ url('login-page') }}">Browse ll jobs</a></li>
                                       <li><a href="{{ url('login-page') }}">Premium MBA jobs</a></li>
                                       <li><a href="{{ url('login-page') }}">Premium Engeering Jobs</a></li>
                                       <li><a href="{{ url('login-page') }}">Govt. Jobs </a></li>
                                       <li><a href="{{ url('login-page') }}">International Jobs</a></li>
                                       <li><a href="{{ url('login-page') }}">Jobs in Gulf</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!--Bottom-->
            <div class="footer-bottom">
               <div class="auto-container">
                  <div class="outer-box text-center">
                     <div class="copyright-text " style=" width: 100%;  text-align: center;">Copyright © {{date("Y")}} {{config('app.name')}} . All rights reserved.</div>
                  </div>
               </div>
            </div>
            <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
         </footer>
         <!-- End Main Footer -->
      </div>
      <!-- End of Footer section
         ============================================= -->              
      <!-- JS library -->
      <script src="{{ asset('assets/js/jquery.js') }}"></script> 
      <script src="{{ asset('assets/js/popper.min.js') }}"></script>
      <script src="{{ asset('assets/js/chosen.min.js') }}"></script>
      <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
      <script src="{{ asset('assets/js/jquery.modal.min.js') }}"></script>
      <script src="{{ asset('assets/js/mmenu.polyfills.js') }}"></script>
      <script src="{{ asset('assets/js/mmenu.js') }}"></script>
      <script src="{{ asset('assets/js/appear.js') }}"></script>
      <script src="{{ asset('assets/js/anm.min.js') }}"></script>
      <script src="{{ asset('assets/js/owl.js') }}"></script>
      <script src="{{ asset('assets/js/wow.js') }}"></script>
      <script src="{{ asset('assets/js/script.js') }}"></script>
   </body>
</html>