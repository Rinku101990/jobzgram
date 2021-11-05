@extends('include.layout')
@section('content')

<div class="page-wrapper dashboard " style="margin-top:10%;padding-left: 0px !important;">
    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">

            <div class="row">
                <div class="col-lg-12">
                    <!-- Chat Widget -->
                    <div class="chat-widget">
                        <div class="widget-content">
                            <div class="row">
                                <div class="contacts_column col-xl-2" id="chat_contacts"></div>
                                <div class=" col-xl-8 col-lg-7 col-md-12 col-sm-12 chat">
                                    <div class="card message-card">
                                        
                                        <div class="card-body msg_card_body">
                                        <div class="upper-title-box">
                                            <h3>{{ __('Verify Your Email Address') }}</h3>
                                            <div class="text">{{ __('Verification Process') }}</div>
                                        </div>
                                        @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                                {{ __('A fresh verification link has been sent to your email address.') }}
                                            </div>
                                        @endif

                                        {{ __('Before proceeding, please check your email for a verification link.') }}
                                        {{ __('If you did not receive the email') }},
                                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                             <div class="row">
                                                @csrf
                                               <!-- Input -->
                                                <div class="form-group col-lg-6 col-md-12">
                                                   <button class="theme-btn btn-style-one" type="submit">{{ __('Click here to resend mail') }}</button>
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
