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
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Course Detail</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="{{ url('parenting-webinars')}}" style="color:#fff">Course</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Course Detail</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of blog details content section
   ============================================= -->
<section id="yl-blog-details" class="yl-blog-details-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="yl-blog-details-content">
               <div class="yl-blog-details-wrap">
                  <div class="yl-blog-details-thumb" align="left">
                     <img src="{{ url('/storage/course/').'/'.$courses->img}}" alt="{{$courses->title}}">
                  </div>
                  <div class="yl-blog-details-text yl-headline">
                     <div class="yl-blog-meta-2 text-uppercase" style="    margin-bottom: 0px !important">
                        <a href="javascript:void(0)"><i class="fa fa-clock"></i> Date {{date('d, M Y',strtotime($courses->created_date))}}</a>
                     </div>
                     <div class="yl-blog-meta-2" style="font-weight:600;margin-bottom:10px !important">
                        Fee:
                        @if($courses->amount!=0)
                           {{ '₹'.$courses->amount}}
                        @else
                           Free
                        @endif
                     </div>
                     <h3 style="color:000;    margin-bottom: 10px;">{{$courses->title}}</h3>
                     <article align="justify">
                        {{$courses->description}} 
                     </article>

                     <div class="yl-post-cat-share clearfix">
                        <div class="yl-blog-list-share float-right">
                           <span class="blog-share-slug text-uppercase">Share</span>
                           {!! $shareButtons !!}
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="yl-blog-sidebar">
               <div class="yl-blog-widget-wrap">
                  <div class="yl-blog-details-comment-area yl-headline pera-content" style="    margin-top: 0;">
                     <div class="cd-review-form" style="padding-top: 0;">
                        <h3 class="c-overview-title mb-2">Course Purchase</h3>
                        <hr/>
                        <form action="{{url('course_attend')}}" method="post">
                           @csrf
                           <input type="hidden" name="course" value="{{$courses->id}}" />
                           <input type="hidden" name="description" value="{{$courses->description}}" />
                           <div class="cd-comment-input d-flex1 mt-2">
                              <div class="cd-comment-input-field row">
                                 <label for="Name" class="col-lg-4">Name <span class="red">*</span> &nbsp;</label>
                                 <input type="text" name="name" class="col-lg-7" placeholder="Your name *" value="{{@Auth::user()->name}}" required>
                              </div>
                              <div class="cd-comment-input-field row">
                                 <label for="Name" class="col-lg-4">Email <span class="red">*</span> &nbsp;</label>
                                 <input type="email" name="email" class="col-lg-7" placeholder="Your Email *" value="{{@Auth::user()->email}}" required>
                              </div>
                              <div class="cd-comment-input-field row">
                                 <label for="Name" class="col-lg-4">Phone no. <span class="red">*</span> &nbsp;</label>
                                 <input type="tel" name="phone"  class="col-lg-7" minlength="10" maxlength="10"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Your Phone *" value="{{@Auth::user()->mobile}}" required>
                              </div>
                              <div class="cd-comment-input-field row">
                                 <label for="Name" class="col-lg-4">Payment(₹) <span class="red">*</span> &nbsp;</label>
                                 @if($courses->amount!='0')
                                    <input type="text" name="payment"  class="col-lg-7" placeholder="Webinar Amount" value="{{$courses->amount}}" readonly>
                                 @else
                                    <input type="text" name="payment"  class="col-lg-7" placeholder="Webinar Amount" value="Free" readonly>
                                 @endif
                              </div>
                           </div>
                           <div class="row mt-3">
                              <label for="registration" class="col-lg-4"></label>
                              <button type="submit">Pay to register</button>
                           </div>
                        </form>
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
<!-- End of blog details content section
   ============================================= -->   
@endsection