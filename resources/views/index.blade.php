@extends('include.layout')
@section('content')
<!-- End of header section -->

<!-- Start of slider section -->        
<section id="yl-slider" class="yl-slider-section">
   <div id="yl-main-slider" class="yl-main-slider-wrap owl-carousel">
      @forelse($banner as $row)
      <div class="slider-main-item position-relative">
         <img src="{{ url('storage/banner/'.$row->file) }}" style="width:100%;">
         <!-- <div class="slider-main-img img-zooming" data-background="{{ url('storage/banner/'.$row->file) }}"></div> -->
         <!-- <div class="slider-main-img" data-background="{{ url('storage/banner/'.$row->file) }}" style="width:100%;object-fit: cover;"></div>
         <div class="slider-overlay"></div> -->
         <!-- <div class="container">
            <div class="slider-main-text yl-headline pera-content">
               <span>&nbsp;</span>
               <h1>&nbsp;<br>
                  &nbsp;
               </h1>
            </div>
         </div> -->
      </div>
      @empty
      <div class="slider-main-item position-relative">
         <!-- <div class="slider-main-img img-zooming" data-background="{{ asset('assets/images/banner/Kids-Fabel-Banners-6.jpg') }}"></div> -->
         <div class="slider-main-img" data-background="{{ asset('assets/images/banner/Kids-Fabel-Banners-5.jpg') }}"></div>
         <div class="slider-overlay"></div>
         <div class="container">
            <div class="slider-main-text yl-headline pera-content">
               <span>&nbsp;</span>
               <h1>&nbsp;<br>
                  &nbsp;
               </h1>
            </div>
         </div>
      </div>
      @endforelse
   </div>
</section>
<!-- End of Slider section  --> 
<section id="about-page-about" class="about-page-about-section">
   <div class="container">
      <div class="about-page-about-content">
         <div class="row">
            <div class="col-lg-12">
               <div class="about-page-about-text">
                  <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width:100%">
                     <span>Why us?</span>
                     <h2 class="wow fadeInLeft animated"  data-wow-delay="0.5s">The way kids are growing nowadays is alarming</h2>
                  </div>
                  <div class="about-page-about-text-wrap" align="justify" style="padding-bottom: 0;margin-bottom: 0;">
                     <p>Kids these days face variety of challenges from a very young age. COVID-19 has added more to the list of challenges for both parents & kids. Increased use of mobile phones or computers for work for home and online classes, mindless use of social media & lack of awareness on handling the changes that have come with the post-Covid world are some of the problems both parents & kids are undergoing these days.</p>
                  </div>
               </div>
            </div>
            
         </div>
         <div class="row">
            <div class="col-lg-6">
               <h4 class="wow fadeInLeft animated"  data-wow-delay="0.2s"><b>Few challenges faced by parents</b></h4>
               <div class="yl-blog-text yl-headline pera-content wow fadeInRight animated"  data-wow-delay="0.2s">
                  <img src="{{ asset('assets/images/Steering.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;">
               </div>
            </div>
            <div class="col-lg-6">
               <h4 class="wow fadeInRight animated"  data-wow-delay="0.2s"><b>Few challenges faced by children</b></h4>
               <div class="yl-blog-text yl-headline pera-content wow fadeInLeft animated"  data-wow-delay="0.2s">
                  <img src="{{ asset('assets/images/issues_our_children_face_today.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<section id="yl-blog-4" class="yl-blog-section-4 yl-blog2-section-4" style="background:#0051DE;padding: 20px 0px !important;">
   <div class="container">
      <div class="yl-course-top">
         <div class="row">

            <div class="col-lg-12">
               <div class="yl-section-title yl-headline">
                  <center><h2 style="color: #fff" class="wow slideInLeft animated"  data-wow-delay="0.5s">Steering towards the Right Path</h2></center>
                  <div class="row" style="margin-bottom: 2%;">
                     <div class="col-lg-2"></div>
                     <div class="col-lg-8">
                        <p style="color:#fff;text-align:center">In a world obsessed with success, grades and money, life skills take a backseat, but they are an important aspect.</p>
                        <p style="color:#fff;text-align:center">More so, in today’s times when kids are forced to stay home and isolate more. In this world of instant gratification and social media craziness, we, at Kids Fable aim to provide kids with resources and inner strength to guide them and steer them towards the right path.</p>
                     </div>
                     <div class="col-lg-2"></div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="yl-blog-text yl-headline pera-content wow fadeInRight animated"  data-wow-delay="0.2s">
                           <img src="{{ asset('assets/images/steering_towords_one.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;border-radius: 10px;">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="yl-blog-text yl-headline pera-content wow fadeInRight animated"  data-wow-delay="0.2s">
                           <img src="{{ asset('assets/images/steering_towords_two.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;border-radius: 10px;">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <p style="color:#fff;margin-top:15px !important">If you have maximum yes to the above questions then your kids need holistic learning. These learning will help them transition from current state to a stronger mental and emotional state. Hence, this will bring a meaningful change in their interpersonal and intrapersonal skills. These positive changes will be a blessing for them forever. Gift them a life that they deserve not a life that they curse. Help them grow holistically under our guidance and enjoy watching them stronger, more confident, happier and successful. </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>

<section id="about-page-about" class="about-page-about-section">
   <div class="container">
      <div class="about-page-about-content">
         <div class="row">
            <div class="col-lg-6">
               <h3 class="wow slideInRight animated"  data-wow-delay="0.5s"><strong>What we can do for the kids?</strong></h3>
               <div class="yl-blog-text yl-headline pera-content wow fadeInLeft animated"  data-wow-delay="0.2s">
                  <img src="{{ asset('assets/images/kids_learns.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;margin-top:7%">
               </div>
            </div>
            <div class="col-lg-6">
               <h3 class="wow slideInLeft animated"  data-wow-delay="0.5s"><strong>We bring the desired transition and Positive change in your kids’ personality</strong></h3>
               <div class="yl-blog-text yl-headline pera-content wow fadeInRight animated"  data-wow-delay="0.2s">
                  <img src="{{ asset('assets/images/kids_personality.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;border-radius: 10px;margin-top:15px;margin-bottom:15px">
               </div>
               <!-- <div class="col-lg-12">
                  <p style="margin-bottom: 0rem;">Instill Life skills</p>
                  <p style="margin-bottom: 0rem;">Life Coaching and mental health wellness</p>
                  <p>Environment for Holistic Development</p>
               </div> -->
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Start of service  section  -->

<section id="about-page-service" class="about-page-service-section" data-background="{{ asset('assets/img/banner/ser-bg.jpg') }}">
   <div class="container">
      <div class="yl-section-title yl-headline">
         <h2 class="wow fadeInDown animated"  data-wow-delay="0.5s">Here is How?</h2>
         <h3 class="wow slideInLeft animated"  data-wow-delay="0.5s"><b>We have empathetically derived the need of a<br> kid of 21st century</b></h3>
      </div>
      <div class="row">
         <div class="col-lg-6">
            <p style="margin-top:10px !important">We are a dedicated organization that is focused on bringing this transition in our younger generation. Hence we are in a process of curating services that will help kids learn these life skills in a very innovative manner.</p>
            <p>Our team of child development experts, life coaches & child psychologists go beyond the traditional curriculum of counseling and therapy. Our sessions consist of mindfulness, value building, emotional coaching, social-emotional learning, and cultivating personality development sessions. These solutions have the capability to provide them tools and techniques to deal the challenges of life with a positive approach.</p>
         </div>
         <div class="col-lg-6">
            <div class="yl-blog-text yl-headline pera-content wow fadeInRight animated"  data-wow-delay="0.2s" style="margin-top: -4%;">
               <img src="{{ asset('assets/images/our_solutions.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;border-radius: 10px;">
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End of service  section  -->

<!-- Our Program Info  section -->
<section id="about-page-about" class="about-page-about-section" style="padding: 20px 0px !important;">
   <div class="container">
      <div class="about-page-about-content">
         <div class="row">
            <div class="col-lg-12">
               <div class="about-page-about-text">
                  <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width:100%">
                     <h2 class="wow fadeInLeft animated"  data-wow-delay="0.5s">Our Programs</h2>
                     <h3 class="wow slideInRight animated"  data-wow-delay="0.5s">Tools and techniques to deal with the real challenges of life</h3>
                  </div>
                  <div class="about-page-about-text-wrap" align="justify" style="padding-bottom: 0;margin-bottom: 0;">
                     <p>The live online-sessions of our programs are facilitated by highly trained mentors, who are specialist in dealing with child’s psychology and their development. The programs are curated by researchers and the experts in the domain of curriculum development and child psychology and give a strong impact on kids’ mental and emotional development for longer term.</p>
                     <p>Through our psychometric tests and various observations, we help your child to know their strength and give them a suitable path to strengthen their core strength at the same time we help them build a strong <strong>inter-personal and intra-personal excellence</strong>. These two core elements are highly recommended by psychologists to develop an highly impressive and successful personality. We, at kids fable, understand the phenomena of instilling these skills into your kids through our program that can bring a desired transition in their overall personality and thought process.</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="row">
                  <div class="col-lg-6">
                     <h4 class="wow fadeInLeft animated"  data-wow-delay="0.5s">The programs at Kids Fable focus on six key life skills that empower kids:</h4>
                     <div class="yl-blog-text yl-headline pera-content wow fadeInRight animated"  data-wow-delay="0.2s" style="margin-top: 20%;">
                        <img src="{{ asset('assets/images/our_programe.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;border-radius: 10px;">
                     </div>
                  </div>

                  <div class="col-lg-6">
                     <h4 class="wow fadeInRight animated"  data-wow-delay="0.5s">Our Programs Make a Difference in the personality of kids</h4>
                     <div class="yl-blog-text yl-headline pera-content wow fadeInLeft animated"  data-wow-delay="0.2s">
                        <img src="{{ asset('assets/images/personality_of_kids.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;">
                     </div>
                  </div>
               </div>
            </div>
            
         </div>
      </div>
   </div>
</section>
<!-- End of our program Info  section -->
<section id="course-details" class="course-details-section">
   <div class="container">
      <div class="course-details-content">
         <div class="row">
            <div class="col-lg-12">
               <div class="row">
               @foreach($program as $prgm)
                  <div class="col-lg-3 col-md-6">
                     <div class="yl-popular-course-img-text" style="padding: 16px !important;">
                        <div class="yl-popular-course-img text-center">
                            @if($prgm->img !='')
                                <img src="{{ url('/storage/course/').'/'.$prgm->img}}" alt="">
                            @else
                                <img src="{{ asset('assets/img/course/no_course_available.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="yl-popular-course-text">
                            <br>
                            <div class="popular-course-title yl-headline">
                                <h3><a href="#">{{$prgm->title}}</a></h3>
                                <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Small description </b> :  {{ mb_strimwidth($prgm->short_description, 0, 55, "...")}}</p>
                                <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Course Fee</b> :  ₹{{$prgm->fees}}</p>
                                <p style="color: #111;font-size: 14px;"><b>Age Group </b> :  {{$prgm->age_group}}</p>
                                <a href="{{url('program-detail/'.$prgm->title_slug)}}" style="color:#007bff;">Read more..</a>
                            </div>
                            <div class="popular-course-rate clearfix ul-li">
                                @if($prgm->status=='active')
                                    <div class="float-left">
                                        <a href="{{url('program-book-for-demo/'.$prgm->title_slug)}}" class="btn btn-primary" style="color:#fff;background-color: #007bff;border-color: #007bff;padding: 7px;border-radius: 5px;"><span>Book For demo</span></a>
                                    </div>
                                    <div class="float-right">
                                        <a href="{{url('enroll-for-program/'.$prgm->title_slug)}}" class="btn btn-primary" style="color:#fff;background-color: #007bff;border-color: #007bff;padding: 7px;border-radius: 5px;"><span>Enroll for program</span></a>
                                    </div>
                                @else
                                    <center><div class="btn btn-warning" style="color:#fff;padding: 7px;border-radius: 5px;">Coming Soon</div></center>
                                @endif
                            </div>
                        </div>
                     </div>
                  </div>
               @endforeach
               </div>
               <div class="blog-btn-4 text-center wow slideInUp animated "  data-wow-delay="0.5s" style="margin-top:0px !important">
                  <a href="{{ url('program'.'/'.$categoryList[0]->url_slug) }}"style="color:#fff;background-color: #007bff;">View All <i class="fas fa-arrow-right"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>

<!-- Start of Counseller Section -->       
<section id="yl-registration" class="yl-registration-section" style="padding: 25px 0px 0px !important;display:none">
   <div class="container">
      <div class="yl-course-top">
         <div class="yl-section-title text-center yl-headline yl-title-style-two position-relative">
            <h2 class="wow slideInLeft animated"  data-wow-delay="0.5s">Our Program</h2>
         </div>
      </div>
      <div class="yl-blog-content-4">
         <div class="row">
            @foreach($counsellor as $clr_val)
               <div class="col-lg-3 col-md-6" style="height:517px !important">
                  <div class="yl-popular-course-img-text">
                     <div class="yl-popular-course-img text-center">
                        @if(Storage::disk('public')->exists('/profile/'.$clr_val->profileImage) && $clr_val->profileImage !='')
                        <img src="{{ url('/storage/profile/').'/'.$clr_val->profileImage}}" alt="">
                        @else
                        <img src="{{ asset('assets/img/teacher/inst-7.jpg') }}" alt="">
                        @endif
                     </div>
                     <div class="yl-popular-course-text">
                        <div class="popular-course-fee clearfix">
                           <span>Consultation Fee:  </span>
                           <div class="course-fee-amount">
                              <!-- <del>₹59</del> -->
                              <strong>₹{{$clr_val->consultation_fee}}</strong>
                           </div>
                        </div>
                        <div class="popular-course-title yl-headline">
                           <h3><a href="#">{{$clr_val->prefixName.' '.$clr_val->name}}, <small>{{$clr_val->specialization}}</small></a>
                           </h3>
                           <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Specialization</b> :  {{$clr_val->specialization}}</p>
                           <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Qualification</b> :  {{$clr_val->qualification}}</p>
                           <p style="color: #111;font-size: 14px;"><b>Experience</b> :  {{$clr_val->experience}}</p>
                        </div>
                        <div class="popular-course-rate clearfix ul-li">
                           <div class="p-rate-vote float-left">
                              <ul>
                                 <li><i class="fas fa-star"></i></li>
                                 <li><i class="fas fa-star"></i></li>
                                 <li><i class="fas fa-star"></i></li>
                                 <li><i class="fas fa-star"></i></li>
                                 <li><i class="fas fa-star"></i></li>
                              </ul>
                              <span>(0 Votes)</span>
                           </div>
                           <div class="p-course-btn float-right">
                              <a href="{{url('counsellor-slot?counsellor='.$clr_val->id)}}"><i class="fas fa-chevron-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
         <div class="blog-btn-4 text-center wow slideInUp animated"  data-wow-delay="0.5s" style="margin-top:0px !important">
            <a href="{{ url('counsellors-and-coaches') }}" style="background-color:#fff;color:#0000fe;margin-bottom:10px">View All <i class="fas fa-arrow-right"></i></a>
         </div>
      </div>
   </div>
</section>
<!-- End of of Counseller Section -->

<!-- Start of Course section -->
<section id="yl-course" class="yl-course-section">
   <div class="container">
      <div class="about-page-about-content">
         <div class="row">
            <div class="col-lg-6">
               <div class="about-page-about-text">
                  <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width:100%">
                     <h2 class="wow fadeInUp animated"  data-wow-delay="0.5s">Our Kids Wellness Services</h2>
                     <h3 class="wow slideInRight animated"  data-wow-delay="0.5s">When you need support we are there</h3>
                  </div>
                  <div class="about-page-about-text-wrap" align="justify" style="padding-bottom: 0;margin-bottom: 0;">
                     <p>The mission at Kids Fable is to let kids become the leaders of their own lives that can’t happen unless they are nurtured in it from the beginning.</p>
                     <p>Kids Fable provides a wide range of Life Coaching and child counseling services through our experienced certified and licensed coaches and counselors. These counselors and coaches are verified and are rightly aligned with your kids need. A small childhood trauma can lead to an unrecognized pattern of behavior that would trouble life-long. To avoid such big mistakes contact us to get mental tonic from time to time through our reliable coaches and counselors.</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="yl-blog-text yl-headline pera-content">
                  <img src="{{ asset('assets/images/skills_that_empower.jpg') }}" alt="" style="height: auto;width:94%;object-fit: cover;border-radius: 10px;margin-top:10%">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End of Course section --> 

<!-- Start of Counseller Section -->       
<section id="about-page-about" class="about-page-about-section" style="padding: 30px 0px !important;">
   <div class="container">
      <div class="yl-course-top">
         <div class="yl-section-title text-center yl-headline yl-title-style-two position-relative">
            <h2 class="wow slideInLeft animated"  data-wow-delay="0.5s">Our Counsellors & Coaches</h2>
         </div>
      </div>
      <div class="yl-blog-content-4">
         <div class="row">
            @foreach($counsellor as $clr_val)
               <div class="col-lg-3 col-md-6" style="height:517px !important">
                  <div class="yl-popular-course-img-text">
                     <div class="yl-popular-course-img text-center">
                        @if(Storage::disk('public')->exists('/profile/'.$clr_val->profileImage) && $clr_val->profileImage !='')
                        <img src="{{ url('/storage/profile/').'/'.$clr_val->profileImage}}" alt="">
                        @else
                        <img src="{{ asset('assets/img/teacher/inst-7.jpg') }}" alt="">
                        @endif
                     </div>
                     <div class="yl-popular-course-text">
                        <div class="popular-course-fee clearfix">
                           <span>Consultation Fee:  </span>
                           <div class="course-fee-amount">
                              <!-- <del>₹59</del> -->
                              <strong>₹{{$clr_val->consultation_fee}}</strong>
                           </div>
                        </div>
                        <div class="popular-course-title yl-headline">
                           <h3><a href="#">{{$clr_val->prefixName.' '.$clr_val->name}}, <small>{{$clr_val->specialization}}</small></a>
                           </h3>
                           <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Specialization</b> :  {{$clr_val->specialization}}</p>
                           <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Qualification</b> :  {{$clr_val->qualification}}</p>
                           <p style="color: #111;font-size: 14px;"><b>Experience</b> :  {{$clr_val->experience}}</p>
                        </div>
                        <div class="popular-course-rate clearfix ul-li">
                           <div class="p-rate-vote float-left">
                              <ul>
                                 <li><i class="fas fa-star"></i></li>
                                 <li><i class="fas fa-star"></i></li>
                                 <li><i class="fas fa-star"></i></li>
                                 <li><i class="fas fa-star"></i></li>
                                 <li><i class="fas fa-star"></i></li>
                              </ul>
                              <span>(0 Votes)</span>
                           </div>
                           <div class="p-course-btn float-right">
                              <a href="{{url('counsellor-slot?counsellor='.$clr_val->id)}}"><i class="fas fa-chevron-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
         <div class="blog-btn-4 text-center wow slideInUp animated"  data-wow-delay="0.5s">
            <a href="{{ url('counsellors-and-coaches') }}">View All <i class="fas fa-arrow-right"></i></a>
         </div>
      </div>
   </div>
</section>
<!-- End of of Counseller Section -->

<!-- Our parenting forum -->        
<section id="yl-registration" class="yl-registration-section" style="padding: 25px 0px 0px !important;">
   <div class="container">
      <div class="yl-registration-content">
         <div class="row">
            <div class="col-lg-6">
               <div class="yl-section-title yl-headline">
                  <h2 class="wow slideInLeft animated"  data-wow-delay="0.5s" style="color:#fff">Parenting Forum</h2>
                  <h3 class="wow slideInRight animated"  data-wow-delay="0.5s" style="color:#fff">Empowering Parents for making their kids grow in the best holistic manner</h3>
               </div>
               <div class="about-page-about-text-wrap" align="justify" style="padding-bottom: 0;margin-bottom: 0;">
                  <p style="color:#fff">We know how important it is to ensure parents are super involved in their kids’ life from an early age. At Kids Fable, we provide a dynamic platform for parents to overcome the challenges they face with their kids, especially in the new post-Covid world. Our effective parenting solutions are the key to ensuring a better future with the kids in this ever-changing world.</p>
                  <p style="color:#fff">Solutions include Blogs reading and writing to know more about how other peer-parents are facing the similar challenges and their life experience. Ask or give Parenting tips from and to your peer parents. Parenting webinars conducted by us from time-to-time to address some real problems and challenges faced by all the parents in current scenario.</p>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="yl-blog-text yl-headline pera-content">
                  <center><img src="{{ asset('assets/images/Empowering_parents.jpg') }}" alt="" style="height: auto;width:80%;object-fit: cover;border-radius: 10px;margin-bottom: 20px;margin-top:10%"></center>
               </div>
            </div>
            <br>
         </div>
      </div>
   </div>
</section>
<!-- End of parenting forum -->

<!-- Start of blog section -->       
<section id="yl-testimonial-3" class="yl-testimonial-section-3" data-background="{{ asset('assets/img/tst-bg.jpg') }}" style="padding: 30px 0px !important;">
   <div class="container">
      <div class="yl-course-top">
         <div class="yl-section-title text-center yl-headline yl-title-style-two position-relative">
            <h2 class="wow slideInLeft animated"  data-wow-delay="0.5s">Latest Blog
            </h2>
         </div>
      </div>
      <div class="yl-blog-content-4">
         <div class="row">
            @foreach($blog as $key=>$b_value)
            <div class="col-lg-4 col-md-6">
               <div class="yl-blog-img-text">
                  <a href="{{ url('blog/'.$b_value->id) }}">
                     <div class="yl-blog-img text-center position-relative">
                        <img src="{{ url('/storage/blog/').'/'.$b_value->img}}" alt="{{$b_value->title}}" style=" width: 100%; height: 187px;  object-fit: fill;">
                        <div class="yl-blog-date">
                           <i class="fas fa-calendar-alt"></i> {{date('d M, Y',strtotime($b_value->created_at))}}
                        </div>
                     </div>
                  </a>
                  <div class="yl-blog-text yl-headline pera-content">
                     <div class="yl-blog-meta text-uppercase" style="margin-top: 10px !important;">
                        <a href="{{ url('blog/'.$b_value->id) }}"><i class="far fa-user"></i> {{$b_value->author}}</a>
                     </div>
                     <div class="yl-blog-title">
                        <h3><a href="{{ url('blog/'.$b_value->id) }}">{{ mb_strimwidth($b_value->title, 0, 37, "...")}}</a> </h3>
                        <p>{{ mb_strimwidth($b_value->description, 0, 55, "...")}}
                        </p>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </div>
         <div class="blog-btn-4 text-center wow slideInUp animated"  data-wow-delay="0.5s">
            <a href="{{ url('blog') }}">View All <i class="fas fa-arrow-right"></i></a>
         </div>
      </div>
   </div>
</section>
<!-- End of of blog section -->

<!-- Fabilian Family -->
<section id="about-page-about" class="about-page-about-section">
   <div class="container">
      <div class="about-page-about-content">
         <div class="row">
            <div class="col-lg-12">
               <div class="about-page-about-text">
                  <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width:100%">
                     <h2 class="wow fadeInUp animated"  data-wow-delay="0.5s">Fabilian Family</h2>
                     <h3 class="wow slideInRight animated"  data-wow-delay="0.5s">Providing an environment for life-long learning and holistic development</h3>
                  </div>
                  <div class="about-page-about-text-wrap" align="justify" style="padding-bottom: 0;margin-bottom: 0;">
                     <p>Kids that grow up with Kids Fable by their side will be able to understand & express their needs, without superseding over others and will have the right mixture of confidence and assertion by their side. Our Fabilian kids are empowered by the ability to make smart choices, inculcate a positive approach towards life and foster leadership skills.</p>
                     <p>How Kids at Kids Fable Grow Up Differently?</p>
                     <p>They will be recognised with common traits of a Fabilian family as indicated here.</p>
                     <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                           <div class="yl-blog-text yl-headline pera-content">
                              <img src="{{ asset('assets/images/fabilian_vs_non_fabilian_kids.jpg') }}" alt="" style="height: auto;width:100%;object-fit: cover;border-radius:10px">
                           </div>
                        </div>
                        <div class="col-lg-2"></div>
                     </div>
                     <p>Join Our Programs to see the change in the way your kids develop their skills as they grow up and find opportunities to excel beyond the school curriculum.</p>
                     <p>With a dedicated team of professionals that are passionate to change the way kids are prepared to deal with the world and manage the influences that they might not have control over.</p>
                     <p>From parents to their kids, we have the resources to <strong>motivate, inspire and educate.</strong></p>
                  </div>
                  <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width:100%">
                     <h3 class="wow slideInRight animated"  data-wow-delay="0.5s">Want to check out our kid-friendly approach?</h3>
                     <p>Take a look at the safe and comfortable space Kids Fable has created exclusively for you.</p>
                  </div>
               </div>
               <div class="row">
                  <!-- <div class="col-lg-2" style="margin: 0;width:170px !important">
                     <div class="yl-course-more-btn text-center  wow fadeInLeft animated" data-wow-delay="0.2s" style="width:163px !important">
                        <a href="{{url('live-demo')}}"> Book a Demo Now <i class="fas fa-arrow-right"></i></a>
                     </div>
                  </div>
                  <div class="col-lg-2" style="margin: 0;width:170px !important">
                     <div class="yl-course-more-btn text-center wow fadeInRight animated" data-wow-delay="0.2s" style="width:160px !important">
                        <a href="{{url('login-register')}}"> Register Now <i class="fas fa-arrow-right"></i></a>
                     </div>
                  </div> -->
                  <a href="{{url('blog')}}" class="btn btn-primary" style="color:#fff;margin: 4px;"><span>Blogs </span></a>
                  <a href="{{url('parenting-tips')}}" class="btn btn-primary" style="color:#fff;margin: 4px;"><span>Parenting tips </span></a>
                  <a href="{{url('parenting-webinars')}}" class="btn btn-primary" style="color:#fff;margin: 4px;"><span>Parenting webinars </span></a>
                  <a href="{{ url('program'.'/'.$program[0]->title) }}" class="btn btn-primary" style="color:#fff;margin: 4px;"><span>Book a demo </span></a>
                  <a href="{{ url('live-for-program') }}?amount={!! $program[0]->fees !!}&program={{$program[0]->title}}" class="btn btn-primary" style="color:#fff;margin: 4px;"><span>Enroll for program</span></a>
                  <a href="{{url('counsellors-and-coaches')}}" class="btn btn-primary" style="color:#fff;margin: 4px;"><span>Book a counselor or coach </span></a>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<!-- End of Fabilian Family -->

<!-- Start of testimonial section  -->   
<section id="yl-testimonial-3" class="yl-testimonial-section-3" data-background="{{ asset('assets/img/tst-bg.jpg') }}" style="display:none">
   <div class="container">
      <div class="yl-testimonial-content-3">
         <div class="row">
            <div class="col-lg-9">
               <div class="testimonial-slider-3 owl-carousel">
                  @foreach($testimonial as $row)
                  <div class="yl-testimonial-img-text-2 yl-headline position-relative pera-content">
                     <div class="yl-testimonial-icon-2">
                        <i class="fas fa-quote-right"></i>
                     </div>
                     <div class="yl-testimonial-text-2">
                        <h3>{{$row->title}}</h3>
                        <p>{{$row->description}}</p>
                     </div>
                     <div class="yl-testimonial-author-2 clearfix">
                        <div class="yl-testi-author-img-2 position-relative float-left">
                           <img src="{{url('storage/testimonial/'.$row->img)}}" alt="">
                        </div>
                        <div class="yl-testi-author-text-2">
                           <h4><a href="#">{{$row->name}}</a></h4>
                           <span>{{$row->designation}}</span>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
            <div class="col-lg-3">
               <div class="testimonial-text-3">
                  <div class="yl-section-title yl-headline pera-content">
                     <span >Testimonial</span>
                     <h2 class="wow slideInUp animated"  data-wow-delay="0.5s">The cleaners
                        came within
                        the timeframe.
                     </h2>
                     <p>Thank you for your interest in hiring Denver Cleaning Service Company. </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End of testimonial section  -->

@endsection