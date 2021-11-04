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
            <h2 style="color:#fff">Teacher Feeback</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Teacher Feeback</a></li>
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
                        <h5 class="mb-0 h6"> Teacher Feeback</h5>
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
                        
                        <form  action="{{ url('feedback_save') }}" method="post" >
                           {!! csrf_field() !!}
                           <input type="hidden" name="counsellor" value="{{ $teacher->teacher }}" />
                           <input type="hidden" name="id" value="{{ $teacher->id }}" />
                         
                         
                           <div class="form-group row">
                            
                              <div class="col-md-12">
                              <h4>Counselor : {{ $teacher->getteacher->name }}</h4>
                              </div>
                             
                              <div class="col-md-12" style="font-size: 14px;">
                                 <label class="col-form-label">Rating <span class="error">*</span></label>
                                 <br>
                                 <input type="radio" name="rating" value="1"  >&nbsp; <i class="fas fa-star" style=" color: #ffc601;"></i> &nbsp;<br/>
                                 <input type="radio" name="rating" value="2" >&nbsp; <i class="fas fa-star" style=" color: #ffc601;"></i><i class="fas fa-star" style=" color: #ffc601;"></i> &nbsp;&nbsp;<br/>
                                 <input type="radio" name="rating" value="3" >&nbsp; <i class="fas fa-star"style=" color: #ffc601;"></i><i class="fas fa-star" style=" color: #ffc601;"></i><i class="fas fa-star" style=" color: #ffc601;"></i> &nbsp;<br/>
                                 <input type="radio" name="rating" value="4" >&nbsp; <i class="fas fa-star"style=" color: #ffc601;"></i><i class="fas fa-star"style=" color: #ffc601;"></i><i class="fas fa-star"style=" color: #ffc601;"></i><i class="fas fa-star"style=" color: #ffc601;"></i> &nbsp;&nbsp;<br/>
                                 <input type="radio" name="rating" value="5" >&nbsp; <i class="fas fa-star"style=" color: #ffc601;"></i><i class="fas fa-star"style=" color: #ffc601;"></i><i class="fas fa-star"style=" color: #ffc601;"></i> <i class="fas fa-star"style=" color: #ffc601;"></i><i class="fas fa-star"style=" color: #ffc601;"></i>&nbsp;
                              </div>
                           
                              <div class="col-md-12" style="margin-top:20px">
                                 <label class="col-form-label">Feeback <span class="error">*</span></label>
                                 <textarea class="form-control mb-2" name="feedback" style="height:90px" ></textarea>
                              </div>
                             
                           <div class="form-group mt-4 text-left col-md-12">
                              <button type="submit" class="btn btn-info" style="background: #0051DE">Feedback Save </button>
                           </div>
                     </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
@endsection