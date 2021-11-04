@extends('include.layout')
@section('content')
<style type="text/css">
@media (min-width: 576px){
.modal-dialog {
    max-width: 600px;
    margin: 1.75rem auto;
}
}

   .card-header {
   background: #0051DE;
   color: #fff;
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
   input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 0px 12px;
    cursor: pointer;
}
</style>
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">My Program</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="javascript:void(0)" style="color:#fff">My Program</a></li>
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
                        <h5 class="mb-0 h6">My Program</h5>
                     </div>
                     <div class="card-body">
                        <div class="order-list-tabel-main table-responsive">
                        
                           <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                              <thead>
                                 <tr role="row" style="text-align: center;">
                                    <th class="w-10p">S.No.</th>
                                    <th class="w-10p">Program Name</th>
                                    <th class="wd-15p">My Batch</th>
                                    <th class="wd-15p">My Schedule</th>
                                    <th class="wd-15p">Start Date</th>
                                    <th class="wd-15p">End date</th>
                                    <th class="wd-15p">Teacher</th>
                                    <th class="wd-15p">Documents</th>
                                    <th class="wd-15p">Teacher's Observation</th>
                                    <th  class="wd-15p">Whatsapp Group link</th>
                                    <th  class="wd-15p">Fabilian Family Link</th>
                                    <th class="wd-15p">Feedback</th>

                                  
                                 </tr>
                              </thead>
                              <tbody>
                                
                                 @foreach($program as $key=>$pval)
                                  <tr>
                                  <td>{{$key+1}}.</td>
                                  <td>{{@$pval->program_type}}</td>
                                  <td>{{@$pval->getprogram->getbatch->name}}</td>
                                  <td><a href="javascript:void(0);" class="calendarModal" program="{{@$pval->id}}" program_name="{{@$pval->program_type}} – {{date('h:i A',strtotime(@$pval->getprogram->getbatch->duration))}}" style="color: #0051de;">{{@$pval->getprogram->getbatch->schedule}} – {{date('h:i A',strtotime(@$pval->getprogram->getbatch->duration))}}</a></td>
                                  <td>{{date('d M, Y',strtotime(@$pval->getprogram->getbatch->start_date))}}</td>
                                  <td>{{date('d M, Y',strtotime(@$pval->getprogram->getbatch->end_date))}}</td>
                                  <td>{{@$pval->getprogram->getbatch->getteacher->name}}</td>
                                  <td>    @if(Storage::disk('public')->exists('/program/'.$pval->document) && $pval->document !='')
                            
                            <center> <a href="<?=url('/storage/program/').'/'.$pval->document ?>" target="_blank" style="color:#2d3ad6"> <i class="fa fa-download"></i> </a></center>
                         
                    @endif
                                      <form action="{{url('student-document')}}" method="post" enctype="multipart/form-data">
                                         @csrf
                                         <input type="hidden" name="bookedprogram" value="{{$pval->id}}"/>
 
                                         <label class="custom-file-upload yl-course-more-btn text-center" >
     <input type="file" name="document" accept=".doc, .docx, .pdf" onchange="this.form.submit()"/>
     <i class="fa fa-cloud-upload"></i> Upload Sheet
 </label>
 
                                       
 </form></td>
                                  <td>   @if(Storage::disk('public')->exists('/program/'.@$pval->teacher_observation) && @$pval->teacher_observation !='')
                            
                            <center> <a href="<?=url('/storage/program/').'/'.@$pval->teacher_observation ?>" target="_blank" style="color:#2d3ad6"> <i class="fa fa-download"></i> </a></center>
                         
                    @endif </td>
                                  <td></td>
                                  <td></td>
                                  <td><a href="{{url('teacher-feeback'.'/'.$pval->id)}}" style="color: #007bff; font-size: 14px;"><u>Feedback</u></a></td></tr>
                                  
                                     @endforeach
                                   
                                
                              </tbody>
                           </table>
                           @if(empty($program[0]->id))
                                     <p><b>Note : </b> It seems like you have not registerd for any of our program. Please go to our demo page to book a demo. </p>
                                     @endif


   





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
      var program=$(this).attr('program');    
      var program_name=$(this).attr('program_name');     
      $('#titleshow').html(program_name);
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
events: SITEURL + "/ajax-student-program?program="+program,
        
          
});
});
});

</script>
 
@endsection('script')
