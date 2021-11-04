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
            <h2 style="color:#fff">My Queries</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">My Queries</a></li>
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
                     <h5 class="mb-0 h6">My Queries</h5>
                  </div>
                  <div class="card-body">
                     <div class="order-list-tabel-main table-responsive">
                        <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                           <thead>
                              <tr role="row">
                                 <th class="w-10p">S.No.</th>
                                 <th class="wd-15p">Query</th>
                                 <th class="wd-15p">Category</th>
                                 <th class="wd-15p">Created Date</th>
                                 <th class="wd-15p">Action</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($myquery as $key=>$st_value)                            
                              <tr role="row" class="odd">
                                 <td class="sorting_1">{{$key+1}}.</td>
                                 <td><a href="{{url('parenting-tips')}}" style="    color: #0000ff;">{{$st_value->query}}</a></td>
                                 <td>{{$st_value->getCategoryDetails->name}}</td>
                                 <td>{{date('d M, Y h:i:s',strtotime($st_value->created_at))}} </td>
                                 <td style="display: flex;">
                                       <a href="{{url('myquery-edit/'.$st_value->id)}}"  class="label label-primary" style="color:#0000fe;font-weight: 700;border:none;background:none"><i class="fa fa-edit"></i></a> | 
                                       <a href="javascript:void(0)" class="label label-danger">
                                          <form action="{{url('myquery-delete/')}}" method="post">
                                             {!! csrf_field() !!}  
                                             <input type="hidden" name="query_id" value="{{$st_value->id}}">
                                             <button type="submit" style="color:#fe001a;font-weight: 700;border:none;background:none"> <i class="fa fa-trash"></i></button> 
                                          </form>
                                       </a>
                                    </td>
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header">
                        <h5 class="mb-0 h6">Tips Given by me</h5>
                     </div>
                     <div class="card-body">
                        <div class="order-list-tabel-main table-responsive">
                           <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                              <thead>
                                 <tr role="row">
                                    <th class="w-10p">S.No.</th>
                                    <th class="wd-15p">Reply Query</th>
                                    <th class="wd-15p">Query</th>
                                    <th class="wd-15p">Created Date</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($tipsmyquery as $key=>$st_value)                            
                                 <tr role="row" class="odd">
                                    <td class="sorting_1">{{$key+1}}.</td>
                                    <td><a href="{{url('parenting-tips')}}" style="    color: #0000ff;">{{$st_value->query}}</a></td>
                                    <td>{{@$st_value->getChildQueryname->query}}</td>
                                    <td>{{date('d M, Y',strtotime($st_value->created_at	))}} </td>
                                    
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