@extends('include.layout')
@section('content')
<style>
   .cd-review-form input {
   width: 100%;
   }
   .btn_login:hover{
   border: 1px solid #FFA300 !important;
   }
   .btn_login:hover a{
   color:#FFA300 !important;
   }
   .cd-review-form:before {
   top: 0;
   left: 0;
   height: 40px;
   width: 111%;
   content: "";
   position: absolute;
   background-color: transparent;
   }
   .cd-review-form select {
   display: block !important;
   height: 45px;
   border: none;
   padding-left: 15px;
   border-radius: 4px;
   margin-bottom: 20px;
   background-color: #efeff0;
   }
   .cd-review-form  .nice-select.form-control{
   display: none;
   }
   .yl-login-content input, .yl-sign-up-content input {
   width: 100%;
   height: 45px;
   border: none;
   padding-left: 20px;
   margin-bottom: 20px;
   border-radius: 0px; 
   background-color: #efeff0;
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
   .razorpay-payment-button{
      color: #fff;
      width: 170px;
      height: 50px;
      border: none;
      font-weight: 700;
      border-radius: 40px;
      background-color: #0000fe;
   }
</style>
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Payment Confirmation</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/')}}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li><a href="{{ url('program')}}" style="color:#fff">Webinar</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Payment Confirmation</a></li>
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
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
               <div class="course-details-tab-area" style="border: 5px double #0051DE;padding: 30px;">
                  <div class="course-details-tab-wrapper">
                     <div class="row">
                        <div class="col-lg-2">&nbsp;</div>
                        <div class="col-lg-8">
                        @if($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> {{ $message }}
                        </div>
                        @endif
                        @if($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Success!</strong> {{ $message }}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <label>Webinar Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$webinar->title}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Payable Amount</label>
                            </div>
                            @if($payInfo->payment!='Free')
                            <div class="col-md-6">
                                <p>{{$payInfo->payment}} INR</p>
                            </div>
                            @else
                            <div class="col-md-6">
                                <p>{{$payInfo->payment}}</p>
                            </div>
                            @endif
                        </div>
                        @if($payInfo->payment!='Free')
                        <form action="{{ route('razorpay.payment.save') }}" method="POST" >
                            @csrf
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="{{ env('RAZORPAY_KEY') }}"
                            data-amount="{{$payInfo->payment*100}}"
                            data-currency="INR"
                            data-buttontext="Pay {{$payInfo->payment}} INR"
                            data-name="Kids Fable"
                            data-description="Tales to be told"
                            data-image="{{asset('assets/images/Kids-Fable-logo.png')}}"
                            data-prefill.name="Rinku Vishwakarma"
                            data-prefill.email="test@gmail.com"
                            data-theme.color="#0051DE"></script>
                        </form>
                        @else
                           <a href="{{route('razorpay.payment.success')}}" class="btn btn-primary" style="color:#fff">Confirm Payment</a>
                        @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-2"></div>
         </div>
      </div>
   </div>
</section>
<!-- End of course details section
   ============================================= -->    
@endsection