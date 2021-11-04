<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>{{ config('app.name', 'Laravel') }}</title>
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/kids-logo.png') }}" />
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('admin/assets/fonts/fontawesome.css') }}" rel="stylesheet">

<style>
.login-form {
    z-index: 2;
    /* width: 340px; */
    width: 100%;
    /* margin: 50px auto; */
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #fff;
    box-shadow:0px 8px 14px rgb(0 0 0 / 45%);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
section{
    background-image: url('{{ asset('admin/assets/img/jan-sendereks.jpg') }}');
    background-size: cover;
    background-position: 50%;
  
    display: block;
  
         width: 100%; 
        min-height: 100vh;
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
  
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    padding: 15px;
    /* background: #0250c5;
    background: -webkit-linear-gradient(bottom,#0250c5,#FFA300);
    background: -o-linear-gradient(bottom,#0250c5,#d43f8d);
    background: -moz-linear-gradient(bottom,#0250c5,#d43f8d);
    background: linear-gradient(bottom,#0250c5,#d43f8d);
    position: relative; */
    z-index: 1;
}
section:after {
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    display: block;
    left: 0;
    top: 0;
    content: "";
    background-color: rgba(0,0,0,.7);
}
@media only screen and (max-width: 720px) {
  .hidden {
    display:none;
  }
  .col-md-4{
    padding-left: 15px !important;
  }
}
</style>
</head>
<body>
<section>
<div class="container" style="z-index:2;">
<div class="row"style=" margin-top:20px  " >
<div class="col-md-8 hidden" style=" padding-right: 0px;  ">
<!--   -->
</div>
<div class="col-md-4" style="padding-left: 0px;">
<div class="login-form">

    <form action="{{ route('adminLoginPost') }}" method="post">
    <center><img src="{{ asset('assets/images/Kids-Fable-logo.png') }}" alt="kids Fable" /></center>
    	{!! csrf_field() !!}
        <h2 class="text-center">Admin Login</h2>
        <hr>
        @if(\Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ \Session::get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        {{ \Session::forget('success') }}
        @if(\Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ \Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif       
        <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-user nc-single-02"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required="required">
                    @if ($errors->has('email'))
            <span class="help-block font-red-mint">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fas fa-key nc-single-02"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    @if ($errors->has('password'))
            <span class="help-block font-red-mint">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
                  </div>
        
      
        <div class="contact100-form-checkbox m-l-4">
<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" checked> 
<label class="label-checkbox100" for="ckb1">
Remember me
</label>
</div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>      
        <br>&nbsp;
    </form>
   
</div>
</div>
</div>
</div>
</section>
</body>
</html>