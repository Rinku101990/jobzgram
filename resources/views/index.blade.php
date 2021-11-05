@extends('include.layout')
@section('content')
<!-- End of header section -->

<!-- Start of slider section -->        
<!-- Banner Section-->
<section class="banner-section-two">
   <div class="auto-container">
      <div class="row">
         <div class="content-column col-lg-7 col-md-12 col-sm-12">
            <div class="inner-column wow fadeInUp">
               <div class="title-box">
                  <h3>5,00,000 + Jobs. Find Better Faster</h3>
               </div>
               <!-- Job Search Form -->
               <div class="job-search-form">
                  <form method="post" action="#">
                     <div class="row">
                        <div class="form-group col-lg-9 col-md-12 col-sm-12">
                           <span class="icon flaticon-search-1"></span>
                           <input type="text" name="search" placeholder="Search by Skills, Company & Job Title">
                        </div>
                        <!-- Form Group -->
                        <!-- Form Group -->
                        <div class="form-group col-lg-3 col-md-12 col-sm-12 text-right">
                           <button type="submit" class="theme-btn btn-style-one"><span class="btn-title">Search</span></button>
                        </div>
                     </div>
                  </form>
               </div>
               <!-- Job Search Form -->
               <!-- Popular Search -->
               <div class="popular-searches">
                  <span class="title">Popular Searches : </span>
                  <a href="#">Designer</a>, 
                  <a href="#">Developer</a>, 
                  <a href="#">Web</a>, 
                  <a href="#">IOS</a>,
                  <a href="#">PHP</a>,
                  <a href="#">Senior</a>,
                  <a href="#">Engineer</a>,
               </div>
               <!-- End Popular Search -->
               <div class="bottom-box">
                  <div class="count-employers">
                     <span class="title">10k+ Candidates</span>
                     <img src="{{ asset('assets/images/resource/multi-peoples.png') }}" alt="">
                  </div>
                  <a href="#" class="upload-cv"><span class="icon flaticon-file"></span> Upload your CV</a>
               </div>
            </div>
         </div>
         <div class="image-column col-lg-5 col-md-12">
            <div class="image-box">
               <figure class="main-image anm"  data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2"><img src="{{ asset('assets/images/resource/banner-img-2.png') }}" alt=""></figure>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Banner Section-->
<!-- Work Section -->
<section class="work-section">
   <div class="auto-container">
      <div class="sec-title text-justify">
         <div class="text">Jobzgram is the Pioneer Platform for hunting amazing Job Opportunities in Canada. We provide our registered users access to quality Job Opportunities with higher visibility to Recruiters in the Canadian Job Market. You can land your dream job in Canada or avail of our services in advancing your career with Scholarship Study Programs available through our services.  We house a wide range of job placements for every field and every skill there is, and our focused and result-driven service will get you lined up with the right recruiters and educational platforms in no time. 
         </div>
      </div>
   </div>
</section>
<!-- End Work Section -->
<!-- Call To Action Two -->
<section class="call-to-action-two" style="background-image: url({{ asset('assets/images/background/1.jpg') }});">
   <div class="auto-container wow fadeInUp">
      <div class="row">
         <div class="col-md-8 text-left">
            <h2 style="color: #fff;">Let us un-pause your Career Break?</h2>
            <br>
            <h3 style="color: #fff;">Breathe, Refresh, Restart with our New Career Opportunities!</h3>
            <br>
            <h1 style="color: #fff;">#RESTARTWITHJOBZGRAM</h1>
            <br>&nbsp;
            <div class="btn-box">
               <a href="#" class="theme-btn btn-style-two">Explore Opportunities.</a>
            </div>
         </div>
         <div class="col-md-4">
            <div class="image-box">
               <figure class="main-image anm"  data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2"><img src="{{ asset('assets/img/Girl.png') }}" alt="" style="margin-top: -50px;"></figure>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Call To Action -->
<!-- Candidates Section -->
<section class="candidates-section">
   <div class="auto-container">
      <div class="sec-title text-center">
         <h2>Land your Dream Job in the place of your choice!</h2>
      </div>
      <div class="carousel-outer wow fadeInUp">
         <div class="candidates-carousel owl-carousel owl-theme default-dots">
            <!-- Candidate Block -->
            <div class="candidate-block">
               <div class="inner-box">
                  <figure class="image" style="width:100%;height:auto;border-radius: 0;"><img src="{{ asset('assets/images/jobss.jpg') }}" alt=""></figure>
                  <h4 class="name">Information Technology</h4>
                  <span class="designation">190,000 Jobs</span>
                  <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Canada</span></a>
               </div>
            </div>
            <div class="candidate-block">
               <div class="inner-box">
                  <figure class="image" style="width:100%;height:auto;border-radius: 0;"><img src="{{ asset('assets/images/jobss.jpg') }}" alt=""></figure>
                  <h4 class="name">Information Technology</h4>
                  <span class="designation">190,000 Jobs</span>
                  <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Canada</span></a>
               </div>
            </div>
            <div class="candidate-block">
               <div class="inner-box">
                  <figure class="image" style="width:100%;height:auto;border-radius: 0;"><img src="{{ asset('assets/images/jobss.jpg') }}" alt=""></figure>
                  <h4 class="name">Information Technology</h4>
                  <span class="designation">190,000 Jobs</span>
                  <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Canada</span></a>
               </div>
            </div>
            <div class="candidate-block">
               <div class="inner-box">
                  <figure class="image" style="width:100%;height:auto;border-radius: 0;"><img src="{{ asset('assets/images/jobss.jpg') }}" alt=""></figure>
                  <h4 class="name">Information Technology</h4>
                  <span class="designation">190,000 Jobs</span>
                  <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Canada</span></a>
               </div>
            </div>
            <div class="candidate-block">
               <div class="inner-box">
                  <figure class="image" style="width:100%;height:auto;border-radius: 0;"><img src="{{ asset('assets/images/jobss.jpg') }}" alt=""></figure>
                  <h4 class="name">Information Technology</h4>
                  <span class="designation">190,000 Jobs</span>
                  <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Canada</span></a>
               </div>
            </div>
            <div class="candidate-block">
               <div class="inner-box">
                  <figure class="image" style="width:100%;height:auto;border-radius: 0;"><img src="{{ asset('assets/images/jobss.jpg') }}" alt=""></figure>
                  <h4 class="name">Information Technology</h4>
                  <span class="designation">190,000 Jobs</span>
                  <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Canada</span></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Candidates Section -->
<!-- About Section -->
<section class="about-section">
   <div class="auto-container">
      <div class="row">
         <!-- Content Column -->
         <div class="content-column col-lg-12 col-md-12 col-sm-12 order-2" style="    margin-bottom: 0;">
            <div class="inner-column wow fadeInUp">
               <div class="sec-title text-center">
                  <h2>Why Jobzgram?</h2>
                  <div class="text-box">Accelerate your Job placement and Education with our premium services.
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Fun Fact Section -->
      <div class="fun-fact-section">
         <div class="row">
            <!--Column-->
            <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
               <img src="{{ asset('assets/img/Empolye.png') }}" alt="" style="width:100px;display: block;">
               <div class="count-box"><span class="count-text" data-speed="3000" data-stop="2.4">0</span> crore+</div>
               <h4 class="counter-title">Candidates</h4>
            </div>
            <!--Column-->
            <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
               <img src="{{ asset('assets/img/jobs.png') }}" alt="" style="width:100px;display: block;">
               <div class="count-box"><span class="count-text" data-speed="3000" data-stop="30000">0</span>+</div>
               <h4 class="counter-title">Jobs</h4>
            </div>
            <!--Column-->
            <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
               <img src="{{ asset('assets/img/companies.png') }}" alt="" style="width:100px;display: block;">
               <div class="count-box"><span class="count-text" data-speed="3000" data-stop="13000">0</span>+</div>
               <h4 class="counter-title">Companies</h4>
            </div>
         </div>
      </div>
      <!-- Fun Fact Section -->
   </div>
</section>
<!-- End About Section -->
<!-- Call To Action Two -->
<section class="call-to-action-two" style="background-image: url({{ asset('assets/images/bg-primium.jpg') }});">
   <div class="auto-container wow fadeInUp">
      <div class="row">
         <div class="col-md-8 text-left">
            <br/>
            <img src="{{ asset('assets/images/premium-logo.png') }}" alt="" style="
               margin-top: 65px;  width: 100px;    display: inline;    vertical-align: unset;">
            <h3 style="display: block;color: #ffd800;/* vertical-align: sub; */margin-top: -80px;margin-left: 100px;">Jobzgram Premium</h3>
            <br>
            <br>
            <h2 style="color: #fff;">Fastrack your job search with our premium services</h2>
            <br>
            <div class="text-box">
               <p style="color:#fff"><i class="fa fa-check" style="color:green"></i> Enhance Profile &nbsp; <i class="fa fa-check" style="color:green"></i> 10 times higher visibility to recruiters</p>
            </div>
         </div>
         <div class="col-md-4">
            <div class="image-box">
               <figure class="main-image anm"  data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2"><img src="{{ asset('assets/images/premium.png') }}" alt="" ></figure>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Call To Action -->
<!-- Job Section -->
<section class="job-section-two" style="background: #fff;">
   <div class="auto-container">
      <div class="sec-title text-center">
         <h2>Need Help in Resumé Writing?</h2>
      </div>
      <div class="row wow fadeInUp">
         <!-- Job Block-two -->
         <div class="job-block-two col-lg-8">
            <div class="inner-box">
               <div class="content">
                  <h4>Resume Writing</h4>
                  <p>Create the perfect Resumé for Recruiters to spot you 10 x Faster! </p>
                  <span class="company-logo"><img src="{{ asset('assets/images/resume.png') }}" alt=""></span>
                  <div class="btn-box text-left">
                     <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Get Expert Help</span></a>
                  </div>
               </div>
            </div>
            <br/>
            <div class="inner-box">
               <div class="content">
                  <h4>Resume Builder</h4>
                  <p>Build Professional Resumé with proven and ready to use templates. </p>
                  <span class="company-logo"><img src="{{ asset('assets/images/resume-builder.png') }}" alt=""></span>
                  <div class="btn-box text-left">
                     <a href="#" class="theme-btn btn-style-one bg-blue"><span class="btn-title">Build Your Resue</span></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="image-box">
               <figure class="main-image anm"  data-wow-delay="1000ms" data-speed-x="2" data-speed-y="2">
                  <img src="{{ asset('assets/images/Resources_2x.png') }}" alt="" ></figure>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Job Section -->

@endsection