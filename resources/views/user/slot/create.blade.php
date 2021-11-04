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

.form-group {
    margin-bottom: 0;
}

</style>

      <!-- Start of breadcrumb section
         ============================================= -->
                 
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
            <span class="breadcrumb-overlay position-absolute"></span>
            <div class="container">
            <div class="row" >
               <div class="col-md-6 col-sm-6">
               <h2 style="color:#fff">Create Slot </h2>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
                        <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
                        <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>                     
                         
                       <li class="active"><a href="#" style="color:#fff">Create Slot</a></li>
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
            <h5 class="mb-0 h6">Create Slot</h5>
        </div>
        <div class="card-body">

                       
                      
                          
                              <form id="profile_update"  action="{{ url('slot') }}" method="post" >
                              {!! csrf_field() !!}
                              	  
                              	 
                        <div class="form-group row">
                        <div class="col-md-6">
                    	<label class="col-form-label">Slot Date <span class="error">*</span></label>
                        <input type="date" class="form-control mb-2" name="slot_date" >
                     
                      @error('slot_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    </div>
                    <div class="form-group row">
                   
                    <div class="col-md-6">
                    	 <label class="col-form-label">Start Time <span class="error">*</span></label>
                         <input type="time" class="form-control mb-2" placeholder="10:00 AM" name="start_time" >
                         @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-md-6">
                    	 <label class="col-form-label">End Time <span class="error">*</span></label>
                         <input type="time" class="form-control mb-2" placeholder="10:00 AM" name="end_time" >
                         @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="col-md-6">
                    	<label class="col-form-label">Status <span class="error">*</span></label>
                      <select class="form-control mb-2" name="status">
                      	<!-- <option value="">Select Status </option> -->
                        
                      	<option value="active" >Active</option>
                          <option value="inactive" >Inactive</option>
                          <option value="not_available" >Not Available</option>
                         
                      	
                      </select>
                      @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    </div>
                    <div class="form-group row">
                   
                  
                    <div class="col-md-6">

                <div class="form-group mt-4 text-left">
                    <button type="submit" class="btn btn-info" style="background: #0051DE">Submit</button>
                    </div> </div>
            
        </div></form>
    </div>


            </div>
        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </section>





@endsection




