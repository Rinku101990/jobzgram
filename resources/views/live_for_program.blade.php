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
</style>
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Enroll for program</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/')}}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li><a href="{{ url('program')}}" style="color:#fff">Enroll for program</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">{{@$program->title}}</a></li>
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
               <div class="course-details-tab-area">
                  <div class="course-details-tab-wrapper">
                     <div class="row">
                        <div class="col-lg-2">&nbsp;</div>
                        <div class="col-lg-8">
                           @if ($message = session()->has('errors_validation'))
                              <div class="alert alert-danger" role="alert" id="danger-alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                                 @foreach(session()->get('errors_validation') as $err)
                                 {{$err}}
                                 <br>
                                 @endforeach
                              </div>
                           @endif
                              @if ($message = session()->has('success_message'))
                              <div class="alert alert-success" role="alert" id="danger-alert">
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                                 {{session()->get('success_message')}}
                              </div>
                           @endif
                           <div class="cd-review-form mt-4 mb-4" style="border: 5px double #0051DE;padding: 30px;">
                              <h3 class="c-overview-title" style="border-bottom: 1px solid #0051DE;">Enroll for the program </h3>
                              <form id="live_demo_update"  action="{{ url('live_demo_update') }}" method="post" >
                                 <input type="hidden" name="student_id" value="{{@Auth::user()->id}}">
                                 <input type="hidden" name="program_id" value="{{@Auth::user()->id}}">
                                 {!! csrf_field() !!}
                                 <div class="row mt-4">
                                    <div class="col-md-6">
                                       <label> Name <span class="red">*</span></label>
                                       <br/>
                                       <input type="text" name="name" placeholder="Enter Name " value="{{@Auth::user()->name}}" readonly>
                                    </div>
                                    <div class="col-md-6">
                                       <label>Child’s name <span class="red">*</span></label>
                                       <br/>
                                       <input type="text" name="child_name" placeholder="Enter Child’s Name " required>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <label>Email Address <span class="red">*</span></label>
                                       <br/>
                                       <input type="email" name="student_email" placeholder="Enter Email Address " value="{{@Auth::user()->email}}" readonly>
                                      
                                    </div>
                                    <div class="col-md-6">
                                       <label>Contact No. <span class="red">*</span></label>
                                       <br/>
                                       <input type="tel" name="student_phone" placeholder="Enter Contact No" minlength="10" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{@Auth::user()->mobile}}" readonly>
                                      
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <label>Age Group  <span class="red">*</span></label>
                                       <br/>
                                       <input type="text" name="age_group" value="{{$program->age_group}}" placeholder="Age Group" readonly >
                                    </div>
                                    <div class="col-md-6">
                                       <label>Program <span class="red">*</span></label>
                                       <br/>
                                       <input type="text" name="program_type" value="{{$program->title}}" placeholder="Program Type" readonly >
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <label>Amount <span class="red">*</span></label>
                                       <br/>
                                       <input type="hidden" name="transaction_type" value="Enroll for program">
                                       <input type="text" name="program_price" value="{{$program->fees}}" placeholder="Enter Amount (Rs.)" readonly >
                                    </div>
                                 
                                    <div class="col-md-12">
                                       <label>Query<span class="red">*</span></label>
                                       <br/>
                                       <textarea name="student_query" placeholder=" Query..." style="height: 80px;"></textarea>
                                    </div>
                                 </div>
                                 @guest
                                 <a href="{{url('login-register')}}"> <button type="button">Login Parents <i class="fas fa-arrow-right"></i></button></a>

                                 @else
                                    @if(Auth::user()->registerAs=='student')
                                       <button type="submit">Submit <i class="fas fa-arrow-right"></i></button>
                                    @else
                                       <div class="alert-danger" style="padding:15px">
                                          <strong>Note: </strong> Program allowed for Parents.
                                       </div>
                                    @endif
                                 @endguest
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
<!-- End of course details section
   ============================================= -->    
@endsection