@extends('include.layout')
@section('content')
<style type="text/css">
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
            <h2 style="color:#fff">Feedback and Reviews List</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="javascript:void(0)" style="color:#fff">Feedback and Reviews List</a></li>
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
                        <h5 class="mb-0 h6">Feedback and Reviews List</h5>
                     </div>
                     <div class="card-body">
                        <div class="order-list-tabel-main table-responsive">
                           <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                              <thead>
                                 <tr role="row" style="text-align: center;">
                                    <th class="w-10p">S.No.</th>
                                    <th class="wd-15p">User</th>
                                    <th class="wd-15p">Rating</th>
                                    <th class="w-10p">Feedback</th>
                                  
                                    <th class="wd-15p">Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($FeedbackReviews as $key=>$val)
                                <tr role="row" class="odd">
                                   <td>{{$key+1}}
                                    <td>{{$val->getuser->name}}</td>
                                    <td>{{$val->rating}}</td>
                                    <td>{{$val->feedback}}</td>
                                    <td>{{date('d M, Y h:i A',strtotime($val->updated_at))}}</td>
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
@endsection