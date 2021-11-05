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
                                          <form class="default-form" action="{{ url('profile_update') }}" method="post" enctype="multipart/form-data">
                                             <div class="row">
                                                <div class="uploading-outer">
                                                   <div class="uploadButton">
                                                      <input class="uploadButton-input" accept="image/*" type="file" name="img" />
                                                      <label class="uploadButton-button ripple-effect" for="upload">Browse Picture</label>
                                                      <span class="uploadButton-file-name"></span>
                                                   </div>
                                                   <div class="text">Max file size is 200KB, Minimum dimension: 150x150 And Suitable files are .jpg & .png</div>
                                                </div>
                                                {!! csrf_field() !!}
                                                <!-- Input -->
                                                <div class="form-group col-lg-3 col-md-12">
                                                   <label>Title</label>
                                                   <select class="chosen-select" name="title">
                                                      <option {{ (Auth::user()->prefixName) == 'Mr.'  ? 'selected' : ''}} value="Mr." >Mr</option>
                                                      <option {{ (Auth::user()->prefixName) == 'Miss.'  ? 'selected' : ''}} value="Miss.">Miss</option>
                                                      <option {{ (Auth::user()->prefixName) == 'Mrs.' ? 'selected' : ''}} value="Mrs.">Mrs</option>
                                                      <option {{ (Auth::user()->prefixName) == 'Dr.'  ? 'selected' : ''}} value="Dr.">Dr</option>
                                                   </select>
                                                </div>
                                                <!-- Input -->
                                                <div class="form-group col-lg-9 col-md-12">
                                                   <label>Full Name</label>
                                                   <input type="text" placeholder=" Full Name" name="name" value="{{ Auth::user()->name }}">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                   <label>Email address</label>
                                                   <input type="email" placeholder=" Email Address" name="email"  value="{{ Auth::user()->email }}"  disabled>
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                   <label>Phone</label>
                                                   <input type="text" placeholder=" Mobile Number"  name="mobile" value="{{ Auth::user()->mobile }}">
                                                </div>


                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                   <label class="col-form-label">Gender <span class="error">*</span></label>
                                                   <br>
                                                   <input type="radio" name="gender" value="1"  @if(Auth::user()->gender=='1')checked @endif style="width: 16px;vertical-align: text-top; height: 20px;" >&nbsp; Male &nbsp;&nbsp;
                                                   <input type="radio" name="gender" value="2"  @if(Auth::user()->gender=='2')checked @endif style="width: 16px;vertical-align: text-top; height: 20px;">&nbsp; Female &nbsp;&nbsp;
                                                   <input type="radio" name="gender" value="3"  @if(Auth::user()->gender=='3')checked @endif style="width: 16px;vertical-align: text-top; height: 20px;">&nbsp; Other
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                   <label class=" col-form-label">Date of Birth</label>
                                                   <input type="date" class="form-control" name="dob" value="{{Auth::user()->dob}}" placeholder="Date of Birth">
                                                </div>

                                                <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                   <button class="theme-btn btn-style-one" type="submit">Save</button>
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