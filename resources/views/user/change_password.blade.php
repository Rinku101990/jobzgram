@extends('include.layout')
@section('content')

<div class="page-wrapper dashboard " style="padding-left: 0px !important;">
    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Messages</h3>
                <div class="text">Ready to jump back in?</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Chat Widget -->
                    <div class="chat-widget">
                        <div class="widget-content">
                            <div class="row">
                                <div class="contacts_column col-xl-4 col-lg-5 col-md-12 col-sm-12 chat" id="chat_contacts">
                                    <div class="card contacts_card">
                                        <div class="card-body contacts_body">
                                            @include('user.user_sidebar')
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-xl-8 col-lg-7 col-md-12 col-sm-12 chat">
                                    <div class="card message-card">
                                        <div class="card-header msg_head">
                                            <div class="d-flex bd-highlight">
                                                <div class="img_cont">
                                                   @if(Storage::disk('public')->exists('/profile/'.Auth::user()->profileImage) && Auth::user()->profileImage !='')
                                                      <img id="profile-photo" src="{{ url('/storage/profile/').'/'.Auth::user()->profileImage}}" class="rounded-circle user_img">
                                                   @else
                                                      <img id="profile-photo" src="{{ asset('assets/images/resource/company-6.png') }}" class="rounded-circle user_img">
                                                   @endif
                                                </div>
                                                <div class="user_info">
                                                    <span>{{ Auth::user()->name }}</span>
                                                    <p>Active</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body msg_card_body">
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
                                          <form class="default-form" action="{{url('update-password')}}" method="post" >
                                             <div class="row">
                                                
                                                {!! csrf_field() !!}
                                                <!-- Input -->
                                                <div class="form-group col-lg-12 col-md-12">
                                                  <label class="col-form-label">Old Password <span class="error">*</span></label>
                                                  <input type="password" class="form-control" name="oldpassword" placeholder="******">
                                                </div>
                                                <!-- Input -->
                                                <div class="form-group col-lg-12 col-md-12">
                                                  <label class=" col-form-label">New Password <span class="error">*</span></label>
                                                  <input type="password"  class="form-control @error('password') is-invalid @enderror" name="password" placeholder="******">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-12 col-md-12">
                                                  <label class="col-form-label">Confirm Password <span class="error">*</span></label>
                    	                            <input type="password" class="form-control"  name="password_confirmation" placeholder="******">
                                                </div>

                                               <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                   <button class="theme-btn btn-style-one" type="submit">Change Password</button>
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
            </div>
        </div>
    </section>

</div><!-- End Page Wrapper -->

@endsection