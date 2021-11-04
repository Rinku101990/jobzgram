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
}</style>
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
                 
                     
                   
                        <div class="col-lg-7 col-md-7">
                           <div class="yl-popular-course-img-text">
                           <div class="row">
                 
                     
                   
                 <div class="col-lg-5 col-md-5">
                              <div class="yl-popular-course-img text-left">
                              @if(Storage::disk('public')->exists('/profile/'.$counsellor->profileImage) && $counsellor->profileImage !='')
                                 <img src="{{ url('/storage/profile/').'/'.$counsellor->profileImage}}" alt="">
                                 @else
                                 <img src="{{ asset('assets/img/teacher/inst-7.jpg') }}" alt="">
                                 @endif
                              </div>
                              </div>
                                  
                 <div class="col-lg-7 col-md-7">
                              <div class="yl-popular-course-text">
                                 <div class="popular-course-fee clearfix">
                                    <span>Consultation Fee:  </span>
                                    <div class="course-fee-amount">
                                       <!-- <del>₹59</del> -->
                                       <strong>₹{{$counsellor->consultation_fee}}</strong>
                                    </div>
                                   
                                 </div>
                                 <div class="popular-course-title yl-headline">
                                    <h3><i class="fa fa-user" style="color: #737373;"></i> {{$counsellor->name}}
                                    </h3>
                                   
                                 </div>
                                 <div class="popular-course-title yl-headline" style="    padding-bottom: 0;">
                                 <p><i class="fa fa-calendar" style="color: #737373;"></i> {{date('d M, Y',strtotime($slot->slot_date))}}  
                                    </p>
                                 </div>
                                 <div class="popular-course-title yl-headline" style="    padding-bottom: 0;">
                                 <p><i class="fa fa-clock" style="color: #737373;"></i> {{date('h:i A',strtotime($slot->start_time))}} - {{date('h:i A',strtotime($slot->end_time))}}
                                    </p>
                                 </div>
                                 
                                
                              </div>
                              
                           </div>
                           <a href="{{url('counsellor-slot?counsellor='.$counsellor->id)}}" class="link link--style-3" style="    font-size: 14px;color:#0051DE">
                           <i class="fa fa-reply" aria-hidden="true"></i> Change Slot
                            </a>
                        </div>
 
                       
                        
                        
                     </div>
                      </div>
                                    
                   
                      <div class="col-lg-5 col-md-5 ">
                           <div class="yl-popular-course-img-text bg-white" style="box-shadow:none;height: 89% !important">
                          
                              <div class="yl-popular-course-text text-right">
                                 <div class="popular-course-fee clearfix">
                                    <span>Total Amount :  <strong>₹{{$counsellor->consultation_fee}}</strong></span>
                                  
                                 </div>
                              @if(empty(Auth::user()->id))
                                 <a href="{{url('login-register')}}"><button type="button"  class="p-course-btn" style="width:210px; color: #fff; background: #f57c00; border: none;   padding: 10px 25px; border-radius: 22px;    padding-bottom: 12px;">Booking Now</button></a>
                              @else
                              <form action="{{ route('razorpay.payment.store') }}" method="POST" >
                                 @csrf
                                 <script src="https://checkout.razorpay.com/v1/checkout.js"
                                 data-key="{{ env('RAZORPAY_KEY') }}"
                                 data-amount="{{$counsellor->consultation_fee*100}}"
                                 data-currency="INR"
                                 data-buttontext="Pay {{$counsellor->consultation_fee}} INR"
                                 data-name="Kids Fable"
                                 data-description="Tales to be told"
                                 data-image="http://127.0.0.1:8000/assets/images/Kids-Fable-logo.png"
                                 data-prefill.name="Rinku Vishwakarma"
                                 data-prefill.email="test@gmail.com"
                                 data-theme.color="#0051DE"></script>
                              </form>
                              @endif
                               <!-- <form action="{{url('booking_slot')}}" method="post">
                               {!! csrf_field() !!}
                               <input type="hidden" name="counsellor" value="{{$counsellor->id}}" />
                               <input type="hidden" name="slot" value="{{$slot->id}}" />
                               @if(empty(Auth::user()->id))
                                 <a href="{{url('login-register')}}"><button type="button"  class="p-course-btn" style="width:210px; color: #fff; background: #f57c00; border: none;   padding: 10px 25px; border-radius: 22px;    padding-bottom: 12px;">Booking Now</button></a>
                               @else
                               <button type="submit" class="p-course-btn" style="width:210px; color: #fff; background: #f57c00; border: none;   padding: 10px 25px; border-radius: 22px;    padding-bottom: 12px;">Booking Now</button>
                                       @endif
                               </form> -->
                               <br/>
                               &nbsp;
                                 
                                
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




