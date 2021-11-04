@extends('include.layout')
@section('content')
<style type="text/css">
   .yl-breadcrumb-section .breadcrumb-overlay {
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   opacity: 1;
   background-color: #030014; 
   background-image: linear-gradient(to right, #0051de 0%, #ffa300 100%);
   }
   .yl-breadcrumb-section {
   padding: 10px 0px 10px;
   }
   .cd-review-form:before {
   top: 0;
   left: 0;
   height: 0;
   width: 111%;
   content: "";
   position: absolute;
   background-color: #f2f2f4;
   }
   #social-links ul{
          padding-left: 0;
     }
     #social-links ul li {
          display: inline-block;
     } 
     #social-links ul li a {
          padding: 4px 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin: 1px;
          font-size: 25px;
     }
     #social-links .fa-facebook-square{
           color: #0d6efd;
     }
     #social-links .fa-twitter{
           color: deepskyblue;
     }
     #social-links .fa-linkedin{
           color: #0e76a8;
     }
     #social-links .fa-whatsapp{
          color: #25D366
     }
     #social-links .fa-reddit{
          color: #FF4500;;
     }
     #social-links .fa-telegram{
          color: #0088cc;
     }
</style>
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Program Detail</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="{{ url('parenting-webinars')}}" style="color:#fff">Program</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Program Detail</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of blog details content section
   ============================================= -->
<section id="event-details" class="event-details-section" style="padding: 70px 0px 70px !important;">
   <div class="container">
      <div class="event-details-content">
         <div class="row">
            <div class="col-lg-9">
               <div class="event-details-text-wrap">
               @if(!empty($programInfo->banner) && $programInfo->banner!=null)
               <div class="event-details-img" align="left">
                  <img src="{{ url('/storage/program/').'/'.$programInfo->banner}}" alt="{{$programInfo->title}}">
               </div>
               @endif
               <div class="event-details-text yl-headline pera-content">
                  <!-- <div class="yl-blog-meta-2 text-uppercase" style="margin-bottom: 0px !important">
                     <a href="javascript:void(0)"><i class="fas fa-calendar-alt"></i> Date : {{date('j F, Y',strtotime($programInfo->created_at))}}</a>
                  </div> -->
                  <div class="yl-blog-meta-2" style="font-weight:600;margin-bottom:10px !important">
                     Fees:
                     @if($programInfo->fees!=0)
                        {{ '₹'.$programInfo->fees}}
                     @else
                        Free
                     @endif
                  </div>
                  <h3 style="color:000;    margin-bottom: 10px;">{{$programInfo->title}}</h3>
                  <article align="justify">
                     {{$programInfo->description}}
                     @if(!empty($programInfo->about_course) || !empty($programInfo->why_joinus) || !empty($programInfo->gain_after) || !empty($programInfo->curriculum))
                     <div class="course-details-overview-feature">
                        <!-- <h3 class="c-overview-title">This Is What our Courses Are Like</h3> -->
                        <div class="overview-feature-list clearfix">
                        @if(!empty($programInfo->about_course))
                           <div class="overview-feature-icon-text yl-headline pera-content" style="width: 100% !important;margin-bottom: 20px;">
                              <div class="overview-feature-icon-title" style="margin-bottom: 0px !important;">
                                 <h3><a href="javascript:void(0)">About the course</a></h3>
                              </div>
                              <div class="overview-feature-text">
                                 <p>{{$programInfo->about_course}}</p>
                              </div>
                           </div>
                        @endif
                        @if(!empty($programInfo->why_joinus))
                           <div class="overview-feature-icon-text yl-headline pera-content" style="width: 100% !important;margin-bottom: 20px;">
                              <div class="overview-feature-icon-title" style="margin-bottom: 0px !important;">
                                 <h3><a href="javascript:void(0)">Why to join this course?</a></h3>
                              </div>
                              <div class="overview-feature-text">
                                 <p>{{$programInfo->why_joinus}}</p>
                              </div>
                           </div>
                        @endif
                        @if(!empty($programInfo->gain_after))
                           <div class="overview-feature-icon-text yl-headline pera-content" style="width: 100% !important;margin-bottom: 20px;">
                              <div class="overview-feature-icon-title" style="margin-bottom: 0px !important;">
                                 <h3><a href="javascript:void(0)">What you will gain after completing the course?</a></h3>
                              </div>
                              <div class="overview-feature-text">
                                 <p>{{$programInfo->gain_after}}</p>
                              </div>
                           </div>
                        @endif
                        @if(!empty($programInfo->curriculum))
                           <div class="overview-feature-icon-text yl-headline pera-content" style="width: 100% !important;margin-bottom: 20px;">
                              <div class="overview-feature-icon-title" style="margin-bottom: 0px !important;">
                                 <h3><a href="javascript:void(0)">Curriculum Details</a></h3>
                              </div>
                              <div class="overview-feature-text">
                                 <p>{{$programInfo->curriculum}}</p>
                              </div>
                           </div>
                        @endif
                        @if(!empty($programInfo->about_mentor))
                           <div class="overview-feature-icon-text yl-headline pera-content" style="width: 100% !important;margin-bottom: 20px;">
                              <div class="overview-feature-icon-title" style="margin-bottom: 0px !important;">
                                 <h3><a href="javascript:void(0)">About the mentor </a></h3>
                              </div>
                              <div class="overview-feature-text">
                                 <p>{{$programInfo->about_mentor}}</p>
                              </div>
                           </div>
                        @endif
                        </div>
                     </div> 
                     @endif
                  </article>
                  <br>
                  <div class="social-btn-sp">
                     {!! $shareButtons !!}
                  </div>

               </div>
               </div>
            </div>
            <div class="col-lg-3">
               <div class="yl-event-sidebar">
                  <div class="yl-event-widget ul-li yl-headline">
                     <h3 class="widget-title">Program Detail</h3>
                     <div class="event-details-widget-item">
                        <div class="ed-inner-widget">
                           <div class="ed-inner-title"><i class="fas fa-user"></i> Age Group:</div>
                           <span>{{$programInfo->age_group}}</span>
                        </div>
                        <div class="ed-inner-widget">
                           <div class="ed-inner-title"><i class="fas fa-clock"></i>Batch strength :</div>
                           <span>{{$programInfo->batch_strength}}</span>
                        </div>
                        <div class="ed-inner-widget">
                           <div class="ed-inner-title"><i class="fas fa-users"></i>Classes per week :</div>
                           <span>{{$programInfo->class_per_week}}</span>
                        </div>
                        <div class="ed-inner-widget">
                           <div class="ed-inner-title"><i class="fas fa-rupee-sign"></i> Rate Per Session:</div>
                           <span>{{'₹'.$programInfo->rate_per_session}}</span>
                        </div>
                        <div class="ed-inner-widget">
                           <div class="ed-inner-title"><i class="fas fa-dollar-sign"></i> Booking Fees:</div>
                           <span>{{'₹'.$programInfo->fees}}</span>
                        </div>
                     </div>
                     <a class="ed-book-btn text-center" href="{{url('program-book-for-demo/'.$programInfo->title_slug)}}">Book for Demo</a>
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </div>
   </div>
   </div>
</section>
<!-- End of blog details content section
   ============================================= -->   
@endsection