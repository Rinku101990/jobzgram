@extends('include.layout')
@section('content')
<style type="text/css">
   .yl-login-content input, .yl-sign-up-content input {
   width: 100%;
   height: 45px;
   border: none;
   padding-left: 20px;
   margin-bottom: 20px;
   border-radius: 0px; 
   background-color: #efeff0;
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
   .fb {
   background-color: #3B5998;
   color: #fff !important;
   width: 100%;
   margin-bottom:10px;
   }
   .google {
   background-color: #dd4b39;
   color: #fff !important;
   width: 100%;
   margin-bottom:10px;
   }
</style>
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Login Or Register</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/')}}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Login Or Register</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of course details section
   ============================================= -->   
<section id="course-details" class="course-details-section">
   <div class="container">
      <div class="course-details-content">
         <div class="row">
            <div class="col-lg-12">
               <div class="course-details-tab-area">
                  <div class="course-details-tab-wrapper">
                     <div class="row">
                        <div class="col-lg-7">
                           <center>
                              <img src="{{ asset('assets/images/student-login.jpg') }}" alt="Kids Fabel" >
                           </center>
                        </div>
                        <div class="col-lg-5">
                           <br><br>
                           <div class="course-details-tab-btn clearfix ul-li" style="margin-bottom: 0;">
                              <ul id="tabs" class="nav text-uppercase nav-tabs">
                                 <li class="nav-item"><a href="#" data-target="#Login" data-toggle="tab" class="nav-link text-capitalize getActiveTabLogin" onclick="getActiveTab('login')">{{ __('Login') }} </a></li>
                                 <li class="nav-item"><a href="#" data-target="#Register" data-toggle="tab" class="nav-link text-capitalize getActiveTabRegister" onclick="getActiveTab('register')">{{ __('Register')}}  </a></li>
                              </ul>
                           </div>
                           <div class="course-details-tab-content-wrap" style=" padding-top: 30px;padding-bottom: 30px;   border: 1px solid #f2f2f4;">
                              <div id="tabsContent" class="tab-content">
                                 <div id="Login" class="tab-pane fade  active show">
                                    <div class="yl-login-content pera-content text-left">
                                       <form action="{{ route('login') }}" method="post">
                                          @csrf
                                          <label> {{ __('Email Address')}} <span class="error">*</span></label>
                                          <input type="email"  class="@error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" placeholder="{{ __('Enter Email Address')}}" required autocomplete="email" autofocus>
                                          @error('email')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <label>{{ __('Password')}} <span class="error">*</span></label>
                                          <input type="password"  class="@error('password') is-invalid @enderror" name="password" placeholder="{{ __('Enter Password')}}"  required autocomplete="current-password">
                                          @error('password')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <div class="yl-login-label clearfix">
                                             <span><input type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }}>{{ __('Remember Me') }}</span>
                                             <a href="{{ route('password.request') }}"><u>{{ __('Forgot Password ?') }}</u></a>
                                          </div>
                                          <button type="submit">{{ __('Login') }}</button>
                                       </form>
                                       <div class="social-auth-links text-center">
                                          <p style="margin-bottom:10px">- OR -</p>
                                          <a href="{{ url('/login/facebook') }}" class="fb btn"><i class="fab fa-facebook-f" style="color:#fff;padding:3px"></i>  Login with Facebook</a>
                                          <a href="{{ url('/login/google') }}" class="google btn"><i class="fab fa-google-plus" style="color:#fff;padding:3px"></i>  Login with Google+</a>
                                       </div>
                                    </div>
                                 </div>
                                 <div id="Register" class="tab-pane fade">
                                    <div class="yl-login-content pera-content text-left">
                                       <form action="{{ route('register')}}" method="post">
                                          @csrf
                                          <label> {{ __('Full Name') }} <span class="error">*</span></label>
                                          <input type="text" id="name" name="name" class=" @error('name') is-invalid @enderror" placeholder="{{ __('Enter Full Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                          @error('name')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <label> {{ __('Mobile Number') }} <span class="error">*</span></label>
                                          <input type="tel" id="mobile" minlength="10" maxlength="10"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class=" @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="{{ __('Mobile Number') }}" required autocomplete="mobile">
                                          @error('mobile')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <label> {{ __('Register As')}} <span class="error">*</span></label> 
                                          <select  class=" form-control @error('registerAs') is-invalid @enderror" name="registerAs" style="width: 100%; height: 45px;  border: none;  padding-left: 20px;   margin-bottom: 20px;    border-radius: 0px;      font-size: 15px;  background-color: #efeff0;">
                                             <option value="student">Parents</option>
                                             <option value="teacher">Mentor</option>
                                             <option value="child_counsellor">Counselor or Coach</option>
                                          </select>
                                          @error('registerAs')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <label> {{ __('Email Address') }} <span class="error">*</span></label>
                                          <input type="email" id="email" class=" @error('email') is-invalid @enderror" name="email" value=" {{ old('email') }}" placeholder=" Email ID"  required autocomplete="email" >
                                          @error('email')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <label> {{ __('Password') }} <span class="error">*</span></label>
                                          <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password"  placeholder="{{ __('Password') }}" required autocomplete="new-password">
                                          @error('password')
                                          <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                          </span>
                                          @enderror
                                          <label>{{ __('Confirm Password') }}</label>
                                          <input type="password" id="password-confirm"  name="password_confirmation"  placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                                          <div class="yl-login-label clearfix">
                                             <span style="font-size: 14px;"><input type="checkbox" checked name="term">{{ __('By signing up I agree to all ')}}&nbsp; <a href="{{url('terms-conditions')}}" style="color:#112389"><u> {{__('terms & conditions')}}</u> .</a></span>
                                          </div>
                                          <button type="submit">{{ __('Register') }}</button>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End of course details section
   ============================================= -->  
@endsection
@section('script')
<script>
   $(document).ready(function(){
     var activeTab =  localStorage.getItem("activeTab");
     if(activeTab == 'register'){
      $('.getActiveTabRegister').addClass('active');
      $('#Register').addClass('active show');
      $('#Login').removeClass('active show');
     }else{
      $('.getActiveTabLogin').addClass('active');
      $('#Login').addClass('active show');
      $('#Register').removeClass('active show');
     }
   
   });
   
   function getActiveTab(data){
      localStorage.setItem("activeTab",data);
   }
</script>
@endsection