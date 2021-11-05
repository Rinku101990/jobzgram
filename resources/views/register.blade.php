@extends('include.layout')
@section('content')

<!-- Info Section -->
<div class="login-section" style="padding: 150px 0 50px !important;">
   <div class="image-layer" style="background-image: url({{ asset('assets/images/background/12.jpg') }});"></div>
   <div class="outer-box">
         <!-- Login Form -->
      <div class="login-form default-form">
         <div class="form-inner">
            <h3>Register to {{config('app.name')}}</h3>
            <!--Login Form-->
            <form action="{{ route('register')}}" method="post">
                @csrf
                <div class="form-group">
                  <label>{{ __('Full Name') }}</label>
                  <input type="text" id="name" name="name" class=" @error('name') is-invalid @enderror" placeholder="{{ __('Enter Full Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                    <label> {{ __('Email Address') }} </label>
                    <input type="email" id="email" class=" @error('email') is-invalid @enderror" name="email" value=" {{ old('email') }}" placeholder=" Email ID"  required autocomplete="email" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> {{ __('Mobile Number') }} </label>
                    <input type="number" id="mobile" minlength="10" maxlength="10"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class=" @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="{{ __('Mobile Number') }}" required autocomplete="mobile">
                    @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>{{ __('Password')}}</label>
                    <input type="password" id="password" class="@error('password') is-invalid @enderror" name="password"  placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                  <label>{{ __('Confirm Password') }}</label>
                  <input type="password" id="password-confirm"  name="password_confirmation"  placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                </div>
               <div class="form-group">
                  <div class="field-outer">
                  <span style="font-size: 14px;"><input type="checkbox" checked name="term">{{ __('By signing up I agree to all ')}}&nbsp; <a href="{{url('terms-conditions')}}" style="color:#112389"><u> {{__('terms & conditions')}}</u> .</a></span>
                  </div>
               </div>
               <div class="form-group">
                  <button class="theme-btn btn-style-one" type="submit" >{{ __('Register') }}</button>
               </div>
            </form>
            <div class="bottom-box">
               <div class="text">Have an account? <a href="{{ url('login-page') }}">Signin</a></div>
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