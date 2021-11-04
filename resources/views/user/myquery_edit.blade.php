@extends('include.layout')
@section('content')
<style type="text/css">
   .badge-warning {
   color: #fff;
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
            <h2 style="color:#fff">Views on My Query</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Views on My Query</a></li>
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
                        <h5 class="mb-0 h6">Edit Query</h5>
                     </div>
                     <div class="card-body">
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
                        <div class="order-list-tabel-main table-responsive">
                            <form action="{{ url('myquery_update') }}" method="post">
                                {!! csrf_field() !!}
                                <input type="hidden" name="myqueryid" value="{{$myquery->id}}">
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="form-label">Title <span class="error">*</span></label>
                                            <input type="text" class="form-control"  name="title" placeholder="Enter Title " value="{{$myquery->query}}">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="form-label">Category <span class="error">*</span></label>
                                            <select class="form-control"  name="category"   style="display: block !important;" required>
                                                <option value="">Select Category</option>
                                                @foreach($querycategory as $bc_val)
                                                <option value="{{$bc_val->id}}" {{ $bc_val->id == $myquery->category  ? 'selected' : ''}}>{{$bc_val->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="form-label">Category <span class="error">*</span></label>
                                            <select class="form-control"  name="status"   style="display: block !important;">
                                                <option value="">Select Status</option>
                                                <option value="active" {{ $myquery->status == 'active'  ? 'selected' : ''}}>Active</option>
                                                <option value="inactive" {{ $myquery->status == 'inactive'  ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
</section>
@endsection