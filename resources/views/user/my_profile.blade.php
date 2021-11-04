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
            <h2 style="color:#fff">My Profile</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">My Profile</a></li>
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
                        <h5 class="mb-0 h6"> My Profile</h5>
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
                        <form id="profile_update"  action="{{ url('profile_update') }}" method="post" enctype="multipart/form-data">
                           {!! csrf_field() !!}
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
                                             @if(Storage::disk('public')->exists('/profile/'.Auth::user()->profileImage) && Auth::user()->profileImage !='')
                                             <img id="profile-photo" src="{{ url('/storage/profile/').'/'.Auth::user()->profileImage}}">
                                             @else
                                             <img id="profile-photo" src="{{ asset('assets/images/medium_thumbnail.png') }}">
                                             @endif
                                          </div>
                                       </div>
                                       <div class="o-profile-photo__desc">
                                          <div class="o-profile-photo__desc__text">
                                             Pick a photo from your computer
                                          </div>
                                          <div class="o-profile-photo__desc__actions">
                                             <span class="btn btn-styled btn-base-1 btn--sm btn--fileupload mt-1" style="     padding-left: 0px; ">
                                                <input accept="image/*" type="file" name="img" class="btn btn-anim-primary w-100" >
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
                                 <label class="col-form-label">Title <span class="error">*</span></label>
                                 <select class="form-control mb-2" name="title">
                                    <option {{ (Auth::user()->prefixName) == 'Mr.'  ? 'selected' : ''}} value="Mr." >Mr</option>
                                    <option {{ (Auth::user()->prefixName) == 'Miss.'  ? 'selected' : ''}} value="Miss.">Miss</option>
                                    <option {{ (Auth::user()->prefixName) == 'Mrs.' ? 'selected' : ''}} value="Mrs.">Mrs</option>
                                    <option {{ (Auth::user()->prefixName) == 'Dr.'  ? 'selected' : ''}} value="Dr.">Dr</option>
                                 </select>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Full Name <span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" placeholder=" Full Name" name="name" value="{{ Auth::user()->name }}">
                              </div>
                              <div class="col-md-6">
                                 <label class=" col-form-label">Email Address</label>
                                 <input type="email" class="form-control mb-2" placeholder=" Email Address" name="email"  value="{{ Auth::user()->email }}"  disabled>
                              </div>
                              <div class="col-md-6">
                                 <label class="col-form-label">Mobile Number <span class="error">*</span></label>
                                 <input type="number" class="form-control mb-2" placeholder=" Mobile Number"  name="mobile" value="{{ Auth::user()->mobile }}">
                              </div>
                              <div class="col-md-6" style="font-size: 14px;">
                                 <label class="col-form-label">Gender <span class="error">*</span></label>
                                 <br>
                                 <input type="radio" name="gender" value="1"  @if(Auth::user()->gender=='1')checked @endif style="width: 16px;vertical-align: text-top; height: 20px;" >&nbsp; Male &nbsp;&nbsp;
                                 <input type="radio" name="gender" value="2"  @if(Auth::user()->gender=='2')checked @endif style="width: 16px;vertical-align: text-top; height: 20px;">&nbsp; Female &nbsp;&nbsp;
                                 <input type="radio" name="gender" value="3"  @if(Auth::user()->gender=='3')checked @endif style="width: 16px;vertical-align: text-top; height: 20px;">&nbsp; Other
                              </div>
                              <div class="col-md-6">
                                 <label class=" col-form-label">Date of Birth</label>
                                 <input type="date" class="form-control" name="dob" value="{{Auth::user()->dob}}" placeholder="Date of Birth">
                              </div>
                              @if(Auth::user()->registerAs=='child_counsellor')
                              <div class="col-md-6">
                                 <label class=" col-form-label">Consultation Fee (₹)</label>
                                 <input type="number" class="form-control" name="consultation_fee" value="{{Auth::user()->consultation_fee}}" placeholder="Consultation Fee (₹)">
                              </div>
                              <div class="col-md-6">
                                 <label class=" col-form-label">Specialization</label>
                                 <input type="text" class="form-control" name="specialization" value="{{Auth::user()->specialization}}" placeholder="Specialization">
                              </div>
                              <div class="col-md-6">
                                 <label class=" col-form-label">Qualification</label>
                                 <input type="text" class="form-control" name="qualification" value="{{Auth::user()->qualification}}" placeholder="Qualification">
                              </div>
                              <div class="col-md-6">
                                 <label class=" col-form-label">Experience</label>
                                 <input type="text" class="form-control" name="experience" value="{{Auth::user()->experience}}" placeholder="Experience">
                              </div>
                              <div class="col-md-6">
                                 <label class=" col-form-label">Awards & Achievements</label>
                                 <input type="text" class="form-control" name="award_achievements" value="{{Auth::user()->award_achievements}}" placeholder="Awards & Achievements">
                              </div>
                              <div class="col-md-6">
                                 <label class=" col-form-label">License (or relevant document)</label>
                                 <input type="text" class="form-control" name="license" value="{{Auth::user()->license}}" placeholder="License (or relevant document)">
                              </div>
                              <div class="col-md-6">
                                 <label class=" col-form-label">No. of Sessions Taken</label>
                                 <input type="text" class="form-control" name="session_taken" value="{{Auth::user()->session_taken}}" placeholder="No. of Sessions Taken">
                              </div>
                              @elseif(Auth::user()->registerAs=='student')
                              <div class="col-md-6">
                                 <label class=" col-form-label">Hobbies / Interest</label>
                                 <input type="text" class="form-control" name="hobbies" value="{{Auth::user()->hobbies}}" placeholder="Hobbies / Interest">
                              </div>
                              @endif
                              <div class="col-md-6">
                                 <label class=" col-form-label">About Your Self</label>
                                 <textarea class="form-control" name="about_your_self">{{Auth::user()->about_your_self}}</textarea>
                              </div>
                              <!-- <div class="col-md-6">
                                 <label class="col-form-label">Blood Group</label>
                                  <select class="form-control mb-2" name="bloodgroup">
                                  	<option value="">Select Blood Group</option>
                                  	<option value="O+" @if(Auth::user()->bloodgroup=='O+')selected @endif >O+</option>
                                  	<option value="A+" @if(Auth::user()->bloodgroup=='A+')selected @endif >A+</option>
                                  	<option value="B+" @if(Auth::user()->bloodgroup=='B+')selected @endif >B+</option>
                                  	<option value="O-" @if(Auth::user()->bloodgroup=='O-')selected @endif >O-</option>
                                  	<option value="A-" @if(Auth::user()->bloodgroup=='A-')selected @endif >A-</option>
                                  	<option value="B-"@if(Auth::user()->bloodgroup=='B-')selected @endif >B-</option>
                                  	<option value="AB+" @if(Auth::user()->bloodgroup=='AB+')selected @endif >AB+</option>
                                  	<option value="AB-" @if(Auth::user()->bloodgroup=='AB-')selected @endif >AB-</option>
                                  </select>
                                 </div>
                                  <div class="col-md-6">
                                 <label class="col-form-label">Timezone</label>
                                  <select class="form-control mb-2" name="timezone">
                                  	<option value="">Select Timezone</option>
                                  	<option value="(UTC-11) Pacific/Midway" @if(Auth::user()->timezone=='(UTC-11) Pacific/Midway')selected @endif>(UTC-11) Pacific/Midway</option>
                                  	<option value="(UTC-10/UTC-09) America/Adak" @if(Auth::user()->timezone=='(UTC-10/UTC-09) America/Adak')selected @endif>(UTC-10/UTC-09) America/Adak</option>
                                  	<option value="(UTC-10) Pacific/Honolulu" @if(Auth::user()->timezone=='(UTC-10) Pacific/Honolulu')selected @endif>(UTC-10) Pacific/Honolulu</option>
                                  	<option value="(UTC-09:30) Pacific/Marquesas" @if(Auth::user()->timezone=='(UTC-09:30) Pacific/Marquesas')selected @endif>(UTC-09:30) Pacific/Marquesas</option>
                                  	<option value="(UTC-09/UTC-08) America/Anchorage" @if(Auth::user()->timezone=='(UTC-09/UTC-08) America/Anchorage')selected @endif>(UTC-09/UTC-08) America/Anchorage</option>
                                  	<option value="(UTC-09) Pacific/Gambier" @if(Auth::user()->timezone=='(UTC-09) Pacific/Gambier')selected @endif>(UTC-09) Pacific/Gambier</option>
                                  	<option value="(UTC-08/UTC-07) America/Los_Angeles" @if(Auth::user()->timezone=='(UTC-08/UTC-07) America/Los_Angeles')selected @endif>(UTC-08/UTC-07) America/Los_Angeles</option>
                                  	<option value="(UTC-08) Pacific/Pitcairn" @if(Auth::user()->timezone=='(UTC-08) Pacific/Pitcairn')selected @endif>(UTC-08) Pacific/Pitcairn</option>
                                  </select>
                                 
                                 </div> -->
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
                                 <label class="col-form-label">House No./ Street Name/ Area <span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" name="house_no" value="{{Auth::user()->house_no}}" >
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Colony / Street / Locality <span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" name="colony" value="{{Auth::user()->colony}}" >
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">City <span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" name="city" value="{{Auth::user()->city}}" >
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-4">
                                 <label class="col-form-label">State <span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2"  name="state" value="{{Auth::user()->state}}" >
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Country <span class="error">*</span></label>
                                 <select class="form-control mb-2">
                                    <option value="India">India</option>
                                 </select>
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Pincode <span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" name="zipCode" value="{{Auth::user()->zipCode}}" >
                              </div>
                           </div>
                           @if(Auth::user()->registerAs=='child_counsellor'|| Auth::user()->registerAs=='teacher')
                           <div class="form-group row">
                              <div class="col-md-12">
                                 <h5>Bank Account Details</h5>
                                 <hr>
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-4">
                                 <label class="col-form-label">Bank Name<span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" name="bankName" value="{{Auth::user()->bankName}}" placeholder="Bank name">
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Account Holder Name<span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" name="accountHolderName"  placeholder="Account Holder Name" value="{{Auth::user()->accountHolderName}}">
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">Account Number<span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" name="accountNumber" value="{{Auth::user()->accountNumber}}"  placeholder="XXXX-XXXX-XXXX-1234">
                              </div>
                              <div class="col-md-4">
                                 <label class="col-form-label">IFSC Code <span class="error">*</span></label>
                                 <input type="text" class="form-control mb-2" name="ifscCode" value="{{Auth::user()->ifscCode}}"  placeholder="IFSC Code">
                              </div>
                              <div class="col-md-8">
                                 <label class="col-form-label">Bank Address<span class="error">*</span></label>
                                 <textarea class="form-control mb-2" name="bankAddress" placeholder="Bank Address">{{Auth::user()->bankAddress}}</textarea>
                              </div>
                           </div>
                           
                         
                           @endif
                           <div class="form-group mt-4 text-right">
                              <button type="submit" class="btn btn-info" style="background: #0051DE">Save Changes</button>
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