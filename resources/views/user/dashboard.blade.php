@extends('include.layout')
@section('content')
<?php $page='dashboard';?>
<style type="text/css">
   a.fc-day-grid-event.fc-h-event.fc-event.fc-start.fc-end.fc-draggable.fc-resizable{
   background: #0553e0;
   color: #fff;  
   padding: 3px;
   text-align: center;
   }
   span.fc-title {
   white-space: pre-line;
   }
   .card-header {
   background: #0051DE;
   color: #fff;
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
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Dashboard</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Dashboard</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<section id="course-details" class="course-details-section">
   <div class="container">
   <div class="course-details-content">
   <div class="row">
      @include('user.user_sidebar')
      <div class="col-lg-9">
         <div class="aiz-user-panel">
            <!-- Basic Info-->
            <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               no notification found!
            </div>
            <div class="card">
               <div class="card-header">
                  <h5 class="mb-0 h6">Dashboard </h5>
               </div>
               <div class="card-body">
                  @if(Auth::user()->registerAs=='student')
                  <div class="row gutters-10">
                     <div class="col-md-4">
                        <a href="{{ url('my-program')}}">
                           <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                              <div class="px-3 pt-3">
                                 <div class="h3 fw-700">{{$bookedprogram}} Program</div>
                                 <div class="opacity-50">In Program List</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4">
                        <a href="{{ url('booking-appointment')}}">
                           <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                              <div class="px-3 pt-3">
                                 <div class="h3 fw-700">{{$bookingappointment}}  Appointment</div>
                                 <div class="opacity-50">In Booking Appointment List</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4">
                        <a href="{{ url('blog-list')}}">
                           <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
                              <div class="px-3 pt-3">
                                 <div class="h3 fw-700">{{$blog}} Blogs</div>
                                 <div class="opacity-50">In Blogs List</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L26.7,192C53.3,192,107,192,160,202.7C213.3,213,267,235,320,218.7C373.3,203,427,149,480,117.3C533.3,85,587,75,640,90.7C693.3,107,747,149,800,149.3C853.3,149,907,107,960,112C1013.3,117,1067,171,1120,202.7C1173.3,235,1227,245,1280,213.3C1333.3,181,1387,107,1413,69.3L1440,32L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-12">
                        <div class="card-header mb-4">
                           <h5 class="mb-0 h6">Program Calendar</h5>
                        </div>
                        <div id='calendar' class="mb-4"></div>
                     </div>
                     <div class="col-md-12">
                        <div class="card-header mb-4">
                           <h5 class="mb-0 h6">Counseling Booking</h5>
                        </div>
                        <div id='calendar2' class="mb-4"></div>
                     </div>
                     <div class="col-md-12">
                        <div class="card-header mb-4">
                           <h5 class="mb-0 h6">Webinar & Workshop</h5>
                        </div>
                        <div id='calendar3' class="mb-4"></div>
                     </div>
                  </div>
                  @elseif(Auth::user()->registerAs=='teacher')
                  <div class="row gutters-10">
                     <div class="col-md-4">
                        <a href="{{url('myprogram')}}">
                           <div class="bg-grad-3 text-white rounded-lg mb-4 overflow-hidden">
                              <div class="px-3 pt-3">
                                 <div class="h3 fw-700">{{$bookedprogramCount}} Program</div>
                                 <div class="opacity-50">in your Program</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L26.7,192C53.3,192,107,192,160,202.7C213.3,213,267,235,320,218.7C373.3,203,427,149,480,117.3C533.3,85,587,75,640,90.7C693.3,107,747,149,800,149.3C853.3,149,907,107,960,112C1013.3,117,1067,171,1120,202.7C1173.3,235,1227,245,1280,213.3C1333.3,181,1387,107,1413,69.3L1440,32L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4">
                        <a href="{{url('student-list')}}">
                           <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                              <div class="px-3 pt-3">
                                 <div class="h3 fw-700">{{$studentCount}} Students</div>
                                 <div class="opacity-50">in your Students</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4">
                        <a href="{{url('batch')}}">
                           <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                              <div class="px-3 pt-3">
                                 <div class="h3 fw-700">{{$batchCount}} Batches</div>
                                 <div class="opacity-50">in your Batches</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-12">
                        <div class="card-header mb-4">
                           <h5 class="mb-0 h6">Program </h5>
                        </div>
                        <div id='calendar' class="mb-4"></div>
                     </div>
                  </div>
                  @elseif(Auth::user()->registerAs=='child_counsellor')
                  <div class="row gutters-10">
                     <div class="col-md-4">
                        <a href="{{url('appointment')}}">
                           <div class="bg-grad-1 text-white rounded-lg mb-4 overflow-hidden">
                              <div class="px-3 pt-3">
                                 <div class="h3 fw-700">{{$appointment}} Appointment</div>
                                 <div class="opacity-50">in your booking Appointment</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,192L30,208C60,224,120,256,180,245.3C240,235,300,181,360,144C420,107,480,85,540,96C600,107,660,149,720,154.7C780,160,840,128,900,117.3C960,107,1020,117,1080,112C1140,107,1200,85,1260,74.7C1320,64,1380,64,1410,64L1440,64L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-4">
                        <a href="{{url('slot')}}">
                           <div class="bg-grad-2 text-white rounded-lg mb-4 overflow-hidden">
                              <div class="px-3 pt-3">
                                 <div class="h3 fw-700">{{$Slot}}  Slot</div>
                                 <div class="opacity-50">in your Slot Availability</div>
                              </div>
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                 <path fill="rgba(255,255,255,0.3)" fill-opacity="1" d="M0,128L34.3,112C68.6,96,137,64,206,96C274.3,128,343,224,411,250.7C480,277,549,235,617,213.3C685.7,192,754,192,823,181.3C891.4,171,960,149,1029,117.3C1097.1,85,1166,43,1234,58.7C1302.9,75,1371,149,1406,186.7L1440,224L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
                              </svg>
                           </div>
                        </a>
                     </div>
                     <div class="col-md-12">
                        <div class="card-header mb-4">
                           <h5 class="mb-0 h6">Booked Slot </h5>
                        </div>
                        <div id='calendar2' class="mb-4"></div>
                     </div>
                  </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<!-- End Contact Us -->
<script>
    $(document).ready(function() {
        var SITEURL = "{{ url('/') }}";
        var eventsData = [];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   
        var calendar = $('#calendar').fullCalendar({
            // header: {
            //     left: 'prev,next today',
            //     center: 'title',
            //     right: 'month,basicWeek,basicDay'
            // },
            defaultView: 'month',
            editable: true,
            selectable: true,
            longPressDelay: 1,
            selectHelper: true,
            events: SITEURL + "/student-program",
            // displayEventTime: false,
            // eventRender: function (event, element, view) {
            //     if (event.allDay === 'true') {
            //         event.allDay = true;
            //     } else {
            //         event.allDay = false;
            //     }
            // }   
        });
   
        var calendar = $('#calendar2').fullCalendar({
            defaultView: 'month',
            editable: true,
            selectable: true,
            longPressDelay: 1,
            selectHelper: true,
            events: SITEURL + "/student-appointment",
            //events : SITEURL + "/ajax-student-program",
            // eventMouseover: function(calEvent, jsEvent) {
            //     var $tooltip = $(tooltip).appendTo('body');
            //    $(this).mouseover(function(e) {
            //         $(this).css('z-index', 10000);
            //         $tooltip.fadeIn('500');
            //         $tooltip.fadeTo('10', 1.9);
            //    }).mousemove(function(e) {
            //         $tooltip.css('top', e.pageY + 10);
            //         $tooltip.css('left', e.pageX + 20);
            //    });
            // },
        });

        var calendar = $('#calendar3').fullCalendar({
            defaultView: 'month',
            editable: true,
            selectable: true,
            longPressDelay: 1,
            selectHelper: true,
            //events: SITEURL + "/student-appointment",
            //events : SITEURL + "/ajax-student-program",
            // eventMouseover: function(calEvent, jsEvent) {
            //     var $tooltip = $(tooltip).appendTo('body');
            //    $(this).mouseover(function(e) {
            //         $(this).css('z-index', 10000);
            //         $tooltip.fadeIn('500');
            //         $tooltip.fadeTo('10', 1.9);
            //    }).mousemove(function(e) {
            //         $tooltip.css('top', e.pageY + 10);
            //         $tooltip.css('left', e.pageX + 20);
            //    });
            // },
        });
   });
</script>
@endsection