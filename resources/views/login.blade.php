@extends('include.layout')
@section('content')

<!-- Info Section -->
<div class="login-section" style="padding: 150px 0 50px !important;">
   <div class="image-layer" style="background-image: url({{ asset('assets/images/background/12.jpg') }});"></div>
   <div class="outer-box">
         <!-- Login Form -->
      <div class="login-form default-form">
         <div class="form-inner">
            <h3>Login to {{config('app.name')}}</h3>
            <!--Login Form-->
            <form action="{{ route('login') }}" method="post">
               @csrf
               <div class="form-group">
                  <label>{{ __('Email Address')}}</label>
                  <input type="email"  class="@error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" placeholder="{{ __('Email Address')}}" required>
                  @error('email')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                  @enderror
               </div>
               <div class="form-group">
                  <label>{{ __('Password')}}</label>
                  <input type="password"  class="@error('password') is-invalid @enderror" name="password" value="" placeholder="{{ __('Password')}}">
               </div>
               <div class="form-group">
                  <div class="field-outer">
                     <div class="input-group checkboxes square">
                        <input type="checkbox" name="remember" id="remember"  {{ old('remember') ? 'checked' : '' }} >
                        <label for="remember" class="remember"><span class="custom-checkbox"></span> {{ __('Remember Me') }}</label>
                     </div>
                     <a href="{{ route('password.request') }}" class="pwd">{{ __('Forgot Password ?') }}</a>
                  </div>
               </div>
               <div class="form-group">
                  <button class="theme-btn btn-style-one" type="submit" >{{ __('Login') }}</button>
               </div>
            </form>
            <div class="bottom-box">
               <div class="text">Don't have an account? <a href="{{ url('register-page') }}">Signup</a></div>
               <!-- <div class="divider"><span>or</span></div>
               <div class="btn-box row">
                     <div class="col-lg-6 col-md-12">
                        <a href="#" class="theme-btn social-btn-two facebook-btn"><i class="fab fa-facebook-f"></i> Log In via Facebook</a>
                     </div>
                     <div class="col-lg-6 col-md-12">
                        <a href="#" class="theme-btn social-btn-two google-btn"><i class="fab fa-google"></i> Log In via Gmail</a>
                     </div>
               </div> -->
            </div>
         </div>
      </div>
      <!--End Login Form -->
   </div>
</div>
<!-- End Info Section -->
@endsection