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
            <h2 style="color:#fff">My Purchase history</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="javascript:void(0)" style="color:#fff">My Purchase history</a></li>
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
                        <h5 class="mb-0 h6">My Purchase history</h5>
                     </div>
                     <div class="card-body">
                        <div class="order-list-tabel-main table-responsive">
                           <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                              <thead>
                                 <tr role="row" style="text-align: center;">
                                    <th class="w-10p">S.No.</th>
                                    <th class="w-10p">Program Name</th>
                                  
                                    <th class="wd-15p">Batch Name</th>
                                    <th class="wd-15p">Start Date</th>
                                    <th class="wd-15p">End Date</th>
                                    <th>No. of sessions</th>
                                    <th>Fee per session </th>
                                           <th>My Total Payment</th>              
                                    <th class="wd-15p">Status</th>
                                    <th class="wd-15p">Download invoice</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($payment as $key=>$st_value) 
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{$key+1}}.</td>
                                    <td>{{@$st_value->getprogram->title}}</td>
                                    <td>{{@$st_value->getprogram->getbatch->name}}</td>
                                    <td>{{date('m F Y',strtotime(@$st_value->getprogram->getbatch->start_date))}} </td>
                                    <td>{{date('m F Y',strtotime(@$st_value->getprogram->getbatch->end_date))}} </td>
                                      <td>@if(empty(@$st_value->getprogram->getsession[0]->id))
                                         0
                                         @else
                                         {{@$st_value->getprogram->totalsession()}}
                                       @endif</td>
                                    <td>{{@$st_value->getprogram->rate_per_session}}</td>
                                   
                                    <td>{{$st_value->transaction}} INR</td>
                                    
                                    <td>
                                       @if($st_value->payment_status=='Paid')
                                       <span class="badge badge-success">Paid</span>
                                       @else 
                                       <span class="badge badge-danger">Un Paid</span>
                                       @endif
                                    </td>
                                    <td> <center><a href="{{url('paymentinvoice?id='.$st_value->id)}}" target="_blank" style="color:#2d3ad6;" ><i class="fa fa-download"></i></a></center></td>

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