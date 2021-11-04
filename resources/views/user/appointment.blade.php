@extends('include.layout')
@section('content')
<style type="text/css">
@media (min-width: 576px){
.modal-dialog {
    max-width: 600px;
    margin: 1.75rem auto;
}
}
.fc-content {
    background: #00296f;
    color: #fff;
    overflow: hidden;
    /* text-overflow: ellipsis; */
    white-space: break-spaces !important;
    /* border: 1px solid #fff; */
    padding: 2px;
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
            <h2 style="color:#fff">Appointment List</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Appointment List</a></li>
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
                  <div class="card">
                     <div class="card-header">
                        <h5 class="mb-0 h6">Appointment List</h5>
                     </div>
                     <div class="card-body">
                        <div class="order-list-tabel-main table-responsive">
                           <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                              <thead>
                                 <tr role="row">
                                    <th class="w-10p">S.No.</th>
                                    <th class="w-10p">Customer</th>
                                    <th class="wd-15p">Week</th>
                                    <th class="wd-15p">Slot</th>
                                    <th class="wd-15p">Transaction</th>
                                    <th class="wd-15p">Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($booking as $key=>$st_value)                            
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{$key+1}}.</td>
                                    <td>{{$st_value->getuser->name}}</td>
                                    <td><a href="javascript:void(0);" class="calendarModal" appointment="{{$st_value->id}}" student_name="{{$st_value->getuser->name}} - {{date('d M, Y',strtotime($st_value->getslot->slot_date))}}" style="color: #0051de;">{{date('d M, Y',strtotime($st_value->getslot->slot_date))}}</a>
                                       </td>
                                    <td>{{date('h:i A',strtotime($st_value->getslot->start_time))}} -{{date('h:i A',strtotime($st_value->getslot->end_time))}}</td>
                                    <td>₹{{$st_value->transaction}}</td>
                                    <td>
                                       @if($st_value->payment_status=='paid')
                                       <span class="badge badge-success">Paid</span>
                                       @else 
                                       <span class="badge badge-danger">Un Paid</span>
                                       @endif
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


<!-- Modal -->
<div class="modal fade" id="calendarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleshow"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id='calendar' class="mb-4"></div>
      </div>
      
    </div>
  </div>
</div>                




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
   $(".calendarModal").click(function(){	 
      var appointment=$(this).attr('appointment');    
      var counsellor_name=$(this).attr('student_name');     
      $('#titleshow').html(counsellor_name);
	  $("#calendarModal").modal();
var SITEURL = "{{ url('/') }}";
var eventsData = [];
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var calendar = $('#calendar').fullCalendar({
defaultView: 'month',
editable: true,
selectable: true,
longPressDelay: 1,
selectHelper: true,
events: SITEURL + "/ajax-booking-slot?appointment="+appointment,
        
          
});
});
});

</script>
 
@endsection('script')



