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
   margin-bottom: 10px;
   font-size: 14px;
   /* background: #ffa000; */
   }
   ul.slot li:hover{
   color: #0000fe;
   border:1px solid #0000fe;
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
   #social-links ul{
         padding-left: 0;
   }
   #social-links ul li {
         display: inline-block;
   } 
   #social-links ul li a {
         padding: 0px 4px;
         border: 1px solid #ccc;
         border-radius: 5px;
         margin: 1px;
         font-size: 25px;
   }
   #social-links .fa-facebook{
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
<!-- Start of header section
   ============================================= -->
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Counsellor Slot</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Counsellor Slot</a></li>
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
            <div class="col-lg-12 col-md-12">
               <div class="yl-popular-course-img-text">
                  <div class="row">
                     <div class="col-lg-2 col-md-2">
                        <div class="yl-popular-course-img text-left">
                           @if(Storage::disk('public')->exists('/profile/'.$counsellor->profileImage) && $counsellor->profileImage !='')
                           <img src="{{ url('/storage/profile/').'/'.$counsellor->profileImage}}" alt="" style="padding: 2px;border: 6px double #1758ca; width: 160px; height: 160px;">
                           @else
                           <img src="{{ asset('assets/img/teacher/inst-7.jpg') }}" alt="" style="padding: 2px;border: 6px double #1758ca; width: 160px; height: 160px;">
                           @endif
                        </div>
                     </div>
                     <div class="col-lg-3 col-md-3">
                        <div class="yl-popular-course-text">
                           <div class="popular-course-fee clearfix">
                              <span>Consultation Fee:  </span>
                              <div class="course-fee-amount">
                                 <!-- <del>₹59</del> -->
                                 <strong>₹{{$counsellor->consultation_fee}}</strong>
                              </div>
                              <!-- <div class="popular-course-rate clearfix ul-li" style=" display: inline;">
                                 <div class="p-rate-vote float-right">
                                    <ul>
                                       <li><i class="fas fa-star"></i></li>
                                       <li><i class="fas fa-star"></i></li>
                                       <li><i class="fas fa-star"></i></li>
                                       <li><i class="fas fa-star"></i></li>
                                       <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <span>(0 Votes)</span>
                                 </div>
                                 </div> -->
                           </div>
                           <div class="popular-course-title yl-headline" style="border:none">
                              <h3 style="color: #f7a108;">{{$counsellor->prefixName.' '.$counsellor->name}}, <small>{{$counsellor->specialization}}</small></h3>
                              <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Specialization</b> :  {{$counsellor->specialization}}</p>
                              <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Qualification</b> :  {{$counsellor->qualification}}</p>
                              <p style="color: #111;font-size: 14px;"><b>Experience</b> :  {{$counsellor->experience}}</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-7">
                        <img src="{{asset('assets/images/banner/Kids-Fabel-Banners-7.jpg')}}" />
                     </div>
                  </div>

                  <div class="yl-post-cat-share clearfix">
                     <div class="yl-blog-list-share float-left">
                        <span class="blog-share-slug text-uppercase">Share</span>
                        {!! $shareButtons !!}
                     </div>
                  </div>

                  <hr/>
                  <div class="popular-course-title yl-headline" style="  border:none ; padding-bottom: 0;">
                     <div class="row">
                        @foreach($date as $key=>$wval) 
                        <div class="col-md-2">
                           <h4 style="color:#0051DE;  font-size: 17px;">
                           {{date('d M, Y',strtotime($wval->date))}}       </h3>
                           <ul class="slot">
                              @foreach($slot as $sval)   
                              @if($wval->slot_date==$sval->date)                                 
                              <li class="slot_selected">                                   
                                 <a href="{{url('slot-booking?counsellor='.$counsellor->id.'&slot='.$sval->id)}}"  id="{{$sval->id}}">{{date('h:i A',strtotime($sval->start_time))}} - {{date('h:i A',strtotime($sval->end_time))}}</a>
                              </li>
                              @endif
                              @endforeach
                           </ul>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
   </div>
   </div>
</section>
<!-- End of course details section
   ============================================= -->  
@endsection