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
    padding: 65px 0px 65px;
}

</style>

      <!-- Start of breadcrumb section
         ============================================= -->
         <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" >
            <span class="breadcrumb-overlay position-absolute" ></span>
            <div class="container">
               <div class="yl-breadcrumb-content text-center yl-headline"> 
                  <h2>Dashboard</h2>
                  <div class="yl-breadcrumb-item ul-li">
                     <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                 	<div class="col-lg-3">
                  		<div class="yl-instructor-img-text text-center position-relative" style="background: #fff">
                           <div class="yl-instructor-img position-relative">
                              <img src="{{ asset('assets/img/teacher/inst-7.jpg') }}" alt="">
                           </div>
                           <div class="yl-instructor-text yl-headline position-relative">
                              <h3><a href="#">Manish Kumar</a></h3>
                              <span class="yl-ins-degi">Web Developer</span>
                              
                           </div>
                        </div>
                        <br>
                        <div class="course-details-widget">
                          
                           <div class="course-widget-wrap">
                              <div class="cd-course-table-widget">
                                 <div class="cd-course-table-list">
                                    <div class="course-table-item active clearfix">
                                    	<a href="{{ url('account') }}">
                                       <span class="cd-table-title"><i class="fas fa-home"></i> Dashboard </span>
                                       
                                   </a>
                                    </div>
                                     <div class="course-table-item clearfix">
                                    	<a href="{{ url('my-profile') }}">
                                       <span class="cd-table-title"><i class="fas fa-user"></i> My Profile </span>
                                       
                                   </a>
                                    </div>
                                     <div class="course-table-item clearfix">
                                    	<a href="{{ url('my-courses') }}">
                                       <span class="cd-table-title"><i class="fas fa-file-alt"></i> My Courses </span>
                                       
                                   </a>
                                    </div>
                                     <div class="course-table-item clearfix">
                                      <a href="{{ url('transactions') }}">
                                       <span class="cd-table-title"><i class="fas fa-money-bill-alt"></i> Transactions </span>
                                       
                                   </a>
                                    </div>
                                      <div class="course-table-item  clearfix">
                                    	<a href="{{ url('change-password') }}">
                                       <span class="cd-table-title"><i class="fas fa-key"></i> Change Password </span>
                                       
                                   </a>
                                    </div>
                                     <div class="course-table-item clearfix">
                                    	<a href="javascript:void(0)" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <span class="cd-table-title"><i class="fas fa-lock"></i> Logout </span>                                       
                                   </a>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </div>
                                  
                                    
                                 </div>
                                
                              </div>
                           </div>
                           
                        </div>
                     </div>


                     <div class="col-lg-9">
                        <div class="aiz-user-panel">
                    
    <!-- Basic Info-->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Dashboard</h5>
        </div>
        <div class="card-body">
                              <form id="profile_update" action="" method="post" enctype="multipart/form-data">
                              	  <div class="form-group row">
                   
                    <div class="col-md-12">
                    	 <h5>Personal Details</h5>
                    	 <hr>
                    </div>
                </div>
                              	 <div class="form-group row">
                    <label class="col-md-2 col-form-label">Profile photo</label>
                    <div class="col-md-10">
                              	<div class="user-profile__content__section__row__column ">
          <div class="o-profile-photo">
           
            <div class="o-profile-photo__cont">
              <div class="dummy"></div>
              <div class="o-profile-photo__cont__img">
                <img id="profile-photo" src="{{ asset('assets/images/medium_thumbnail.png') }}">
              </div>
            </div>
            <div class="o-profile-photo__desc">
              <div class="o-profile-photo__desc__text">
                Pick a photo from your computer
              </div>
              <div class="o-profile-photo__desc__actions">
              	<span class="btn btn-styled btn-base-1 btn--sm btn--fileupload mt-1" style="     padding-left: 0px; ">
                        <input accept="image/*" type="file" class="btn btn-anim-primary w-100" >
                       <div style="text-align: left;margin-top: -50px;font-size: 14px;">Add Photo  </div> 
                    </span>
                
               
                
              </div>
            </div>
          </div>
        </div>
         </div>
        </div>
                        <div class="form-group row">
                   
                    <div class="col-md-6">
                    	 <label class="col-form-label">First Name</label>
                         <input type="text" class="form-control" placeholder=" First Name" >
                    </div>
                
                   
                    <div class="col-md-6">
                    	 <label class="col-form-label">Last Name</label>
                        <input type="text" class="form-control" placeholder=" Last Name" >
                    </div>
                </div>
                  <div class="form-group row">
                   
                    <div class="col-md-6">
                    	 <label class=" col-form-label">Email Address</label>
                           <input type="email" class="form-control" placeholder=" Email Address" n value="manish.sandlus@gmail.com" >
                    </div>
               
                   
                    <div class="col-md-6">
                    	 <label class="col-form-label">Mobile Number</label>
                        <input type="number" class="form-control" placeholder=" Mobile Number" value="07011407974">
                    </div>
                </div>
               
                <div class="form-group row">
                   
                    <div class="col-md-6" style="font-size: 14px;">
                    	 <label class="col-form-label">Gender</label>
                    	 <br>
                       <input type="radio" name="gender" value="1" style="width: 16px;vertical-align: text-top; height: 20px;" >&nbsp; Male &nbsp;&nbsp;
                        <input type="radio" name="gender" value="2" style="width: 16px;vertical-align: text-top; height: 20px;">&nbsp; Female &nbsp;&nbsp;
                         <input type="radio" name="gender" value="3" style="width: 16px;vertical-align: text-top; height: 20px;">&nbsp; Other
                    </div>
                     
                    <div class="col-md-6">
                    	<label class=" col-form-label">Date of Birth</label>
                       <input type="date" class="form-control" placeholder="Date of Birth">
                    </div>
                </div>
                 <div class="form-group row">
                    
                    <div class="col-md-6">
                    	<label class="col-form-label">Blood Group</label>
                      <select class="form-control">
                      	<option value="">Select Blood Group</option>
                      	<option value="O+">O+</option>
                      	<option value="A+">A+</option>
                      	<option value="B+">B+</option>
                      	<option value="O-">O-</option>
                      	<option value="A-">A-</option>
                      	<option value="B-">B-</option>
                      	<option value="AB+">AB+</option>
                      	<option value="AB-">AB-</option>
                      </select>
                    </div>
                      <div class="col-md-6">
                     <label class="col-form-label">Timezone</label>
                      <select class="form-control">
                      	<option value="">Select Timezone</option>
                      	<option value="(UTC-11) Pacific/Midway">(UTC-11) Pacific/Midway</option>
                      	<option value="(UTC-10/UTC-09) America/Adak">(UTC-10/UTC-09) America/Adak</option>
                      	<option value="(UTC-10) Pacific/Honolulu">(UTC-10) Pacific/Honolulu</option>
                      	<option value="(UTC-09:30) Pacific/Marquesas">(UTC-09:30) Pacific/Marquesas</option>
                      	<option value="(UTC-09/UTC-08) America/Anchorage">(UTC-09/UTC-08) America/Anchorage</option>
                      	<option value="(UTC-09) Pacific/Gambier">(UTC-09) Pacific/Gambier</option>
                      	<option value="(UTC-08/UTC-07) America/Los_Angeles">(UTC-08/UTC-07) America/Los_Angeles</option>
                      	<option value="(UTC-08) Pacific/Pitcairn">(UTC-08) Pacific/Pitcairn</option>
                      </select>
                   
                </div>
            </div>
            <br>
            <div class="form-group row">
                   
                    <div class="col-md-12">
                    	 <h5>Address Details</h5>
                    	 <hr>
                    </div>
                </div>
                 <div class="form-group row">
                   
                    <div class="col-md-4">
                    	 <label class="col-form-label">House No./ Street Name/ Area</label>
                         <input type="text" class="form-control" >
                    </div>
                
                   
                    <div class="col-md-4">
                    	 <label class="col-form-label">Colony / Street / Locality</label>
                        <input type="text" class="form-control" >
                    </div>
                     <div class="col-md-4">
                    	 <label class="col-form-label">City</label>
                        <input type="text" class="form-control" >
                    </div>
                </div>
                 <div class="form-group row">
                   
                    <div class="col-md-4">
                    	 <label class="col-form-label">State</label>
                         <input type="text" class="form-control" >
                    </div>
                
                   
                    <div class="col-md-4">
                    	 <label class="col-form-label">Country</label>
                         <select class="form-control">
                      	<option value="India">India</option>
                      	
                      </select>
                    </div>
                     <div class="col-md-4">
                    	 <label class="col-form-label">Pincode</label>
                        <input type="text" class="form-control" >
                    </div>
                </div>
              

                <div class="form-group mt-4 text-right">
                    <button type="submit" class="btn btn-info" style="background: #0051DE">Save Changes</button>
                </div>
            
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




