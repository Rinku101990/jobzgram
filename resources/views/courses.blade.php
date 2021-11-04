@extends('include.layout')
@section('content')
<style type="text/css">
   .yl-login-content input, .yl-sign-up-content input {
   width: 100%;
   height: 45px;
   border: none;
   padding-left: 20px;
   margin-bottom: 20px;
   border-radius: 0px; 
   background-color: #efeff0;
   }
   .yl-popular-course-img-text .popular-course-fee .course-fee-amount {
   margin-top: 11px;
   float: right;
   }
   .yl-popular-course-img-text .popular-course-fee strong {
   color: #000;
   font-size: 19px;
   font-weight: 700;
   }
   .yl-blog-widget-wrap .yl-category-widget li a {
   color: #000;
   font-weight: 400;
   padding-left: 15px;
   position: relative;
   transition: 0.4s all ease-in-out;
   }
</style>
<style type="text/css">
   ul.list-inline.checkbox-color.checkbox-color-circle.mb-0 li label {
   display: inline-block;
   margin-bottom: .5rem;
   width: 30px;
   border: 2px solid #eee;
   }
   ul.list-inline.checkbox-color.checkbox-color-circle.mb-0 li{
   display: inline-block;
   float: left;
   padding-right: 10px;
   width: 33%;
   }
   .checkbox label {
   padding-left: 5px;
   }
   .box-content.overflow-auto.size_list .checkbox {
   width: 32%;
   display: inline-block;
   }
   input[type=checkbox] {
   box-sizing: border-box;
   padding: 0;
   height: 25px;
   width: 25px;
   padding-right: 20px;
   vertical-align: middle;
   }
   .ca_search_filters input {
   padding-left: 2px;
   background: none;
   border: none;
   height: inherit;
   color: #666;
   font-size: 14px;
   width: 120px;
   }
   .ca_search_filters #slider-range {
   margin-bottom: 22px;
   background: #e5e5e5;
   border-radius: 0;
   border: none;
   height: 8px;
   margin-top: 12px;
   }
   .ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
   border-bottom-right-radius: 5px;
   }
   .ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
   border-bottom-left-radius: 5px;
   }
   .ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr {
   border-top-right-radius: 5px;
   }
   .ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl {
   border-top-left-radius: 5px;
   }
   .ui-widget-content {
   border: 1px solid #a6c9e2;
   color: #222222;
   }
   .ui-widget {
   font-family: Lucida Grande,Lucida Sans,Arial,sans-serif;
   font-size: 1.1em;
   }
   .ui-slider-horizontal {
   height: .8em;
   }
   .ui-slider {
   position: relative;
   text-align: left;
   }
   .ui-slider-horizontal .ui-slider-range {
   background: #0051DE;
   }
   .ui-slider-horizontal .ui-slider-range {
   top: 0;
   height: 100%;
   }
   .ui-slider .ui-slider-range {
   position: absolute;
   z-index: 1;
   font-size: .7em;
   display: block;
   border: 0;
   background-position: 0 0;
   }
   .ui-slider .ui-slider-handle {
   position: absolute;
   z-index: 2;
   width: 1.2em;
   height: 1.2em;
   cursor: default;
   -ms-touch-action: none;
   touch-action: none;
   }
   .ui-slider-horizontal .ui-slider-handle {
   top: -.3em;
   margin-left: -.6em;
   }
   .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
   border: 1px solid #c5dbec;
   /* background: #dfeffc url(images/ui-bg_glass_85_dfeffc_1x400.png) 50% 50% repeat-x; */
   font-weight: bold;
   color: #2e6e9e;
   }
   .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
   border: 1px solid #0051DE;
   background: #0051DE;
   font-weight: bold;
   color: #0051DE;
   width: 16px;
   height: 16px;
   border-radius: 0;
   cursor: ew-resize;
   }
   .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
   border: 1px solid #0051DE;
   background: #0051DE;
   font-weight: bold;
   color: #0051DE;
   width: 16px;
   height: 16px;
   border-radius: 0;
   cursor: ew-resize;
   }
   .form-group.search-select select {
   display: block !important;
   }
   .search-select  .nice-select.form-control{
   display: none;
   }
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
</style>
<!-- Start of header section
   ============================================= -->
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Courses</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Courses</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of course details section
   ============================================= -->   
<section id="course-details" class="course-details-section">
   <div class="container">
      <div class="course-details-content">
        <div class="row">
            <div class="col-lg-12">
               <div class="row">
                  @foreach($courses as $crsValue)
                  <div class="col-lg-3 col-md-6">
                     <div class="yl-popular-course-img-text" style="padding: 16px !important;">
                        <div class="yl-popular-course-img text-center">
                           @if($crsValue->img !='')
                                <img src="{{ url('/storage/course/').'/'.$crsValue->img}}" alt="">
                           @else
                                <img src="{{ asset('assets/img/course/no_course_available.jpg') }}" alt="">
                           @endif
                        </div>
                        <div class="yl-popular-course-text">
                           <br>
                           <div class="popular-course-title yl-headline">
                              <h3><a href="#">{{$crsValue->title}}</a></h3>
                              <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Small description </b> :  {{ mb_strimwidth($crsValue->description, 0, 46, "...")}}</p>
                              <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Course Fee</b> :  ₹{{$crsValue->amount}}</p>
                              <p style="color: #111;font-size: 14px;"><b>Age Group </b> :  {{$crsValue->age_group}}</p>
                              <span class="showmenu" clickId="{{$crsValue->id}}" style="color:#007bff;cursor: pointer;">Read more..</span>
                           </div>
                           <div class="popular-course-rate clearfix ul-li" id="menu{{$crsValue->id}}" style="display: none;">
                              <div class="float-left">
                                <a href="{{url('course-details/'.$crsValue->id)}}" class="btn btn-primary" style="color:#fff;background-color: #007bff;border-color: #007bff;padding: 7px;border-radius: 5px;"><span>Book For demo</span></a>
                              </div>
                              <div class="float-right">
                                <a href="{{url('course-details/'.$crsValue->id)}}" class="btn btn-primary" style="color:#fff;background-color: #007bff;border-color: #007bff;padding: 7px;border-radius: 5px;"><span>Enrol for program</span></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End of course details section
   ============================================= -->  
@endsection