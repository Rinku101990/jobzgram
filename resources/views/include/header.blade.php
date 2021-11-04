
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
}</style>
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
                     <span><i class="fas fa-phone"></i>  <a href="tel:+966504949140">+966504949140</a></span>
                      <span><i class="fas fa-envelope"></i>  <a href="mailto:info@kidsfabel.com">info@kidsfabel.com</a></span>
                    
                     
                  </div>

                
 <div class="header-top-social float-right">
                    
 <a href="#"><i class="fab fa-whatsapp"></i></a>
                     <a href="https://www.facebook.com/KidFables"><i class="fab fa-facebook-f"></i></a>
                     <a href="https://twitter.com/kids_fable"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-linkedin"></i></a>
                     <a href="https://www.instagram.com/kidsfable/"><i class="fab fa-instagram"></i></a>
                  </div>
                  
               </div>
            </div>
         </div>
         
@yield('navbar')
      
 

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
                           <p align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
                           
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
                                 <li><a href="{{ url('/') }}">Home</a></li>
                                 <li><a href="{{ url('about-us') }}">About Us</a></li>
                                  <li><a href="{{ url('service') }}">Our Service</a></li>
                                 <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                                 <li><a href="{{ url('blog') }}">Our Blog</a></li>
                                 <li><a href="{{ url('faqs') }}">FAQs</a></li>
                                 
                                 
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
                                 <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
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
                                 <a href="#">C-71 sector -19 Noida UP India 201301
</a>
                              </li>
                              <li>
                                 <i class="fas fa-phone"></i><a href="#">+966504949140</a>
                              </li>
                               <li>
                                 <i class="fas fa-envelope"></i><a href="#">info@kidsfabel.com</a>
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

      </body>
      </html>   