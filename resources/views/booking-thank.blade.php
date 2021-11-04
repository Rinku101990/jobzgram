@extends('include.layout')
@section('content')
<style type="text/css">
   .yl-popular-course-img-text .popular-course-fee .course-fee-amount {
   display: inline-block;
   float: none;
   }
   ul.slot li {
   border-radius: 5px;
   padding: 6px 8px;
   display: inline-block;
   color: #ffa000;
   border:1px solid #ffa000;
   /* background: #ffa000; */
   }
   ul.slot li:hover{
   color: #0000fe;
   border:1px solid #0000fe;
   }
   .yl-popular-course-text .fa {
   color: #1639e1 !important;
   }
   input[type=radio] {
   height: 18px;
   }
   ul.slot {
   padding: 10px;
   padding-left: 0;
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
            <h2 style="color:#fff">Thank You</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Thank You</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- Start of contact content section
   ============================================= -->       
<section id="contact-content" class="contact-content-section" style="    padding: 40px 0px;">
   <div class="container">
      <div class="yl-contact-content-wrap">
         <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
               <div class="yl-contact-content-inner text-center">
                  <div class="yl-contact-content-icon">
                     <img class="img-fluid mb-5" src="{{url('img/thanks.png')}}" alt="404" style="width: 70px;">
                  </div>
                  <div class="yl-contact-content-text yl-headline">
                     <h1 class="mt-2 mb-2 text-success">CONGRATULATION!</h1>
                     <p class="text-success">You have successfully booked your time</p>
                     <div id="dvCountDown" style = "display:none;font-size:15px;" class="text-danger">
                        You will be redirected after <span id = "lblCount"></span>&nbsp;seconds.
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End of contact content section
   ============================================= -->    
@endsection