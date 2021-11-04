@extends('layouts.app-admin')
@section('content')
<!-- [ Layout content ] Start -->
<div class="layout-content">
   <!-- [ content ] Start -->
   <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">School Dashboard</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">School</a></li>
                                <li class="breadcrumb-item active"><a href="#!">Dashboard</a></li>
                            </ol>
                        </div>
                        <div class="row">
                            <!-- customar project  start -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center m-l-0">
                                            <div class="col-auto">
                                                <i class="fas fa-user-graduate f-36 text-primary"></i>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="text-muted m-b-10">Student</h6>
                                                <h2 class="m-b-0">45</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center m-l-0">
                                            <div class="col-auto">
                                                <i class="fas fa-users f-36 text-danger"></i>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="text-muted m-b-10">Parents</h6>
                                                <h2 class="m-b-0">9</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center m-l-0">
                                            <div class="col-auto">
                                                <i class="fas fa-user-tie f-36 text-success"></i>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="text-muted m-b-10">Teacher</h6>
                                                <h2 class="m-b-0">5</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center m-l-0">
                                            <div class="col-auto">
                                                <i class="fas fa-book-open f-36 text-warning"></i>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="text-muted m-b-10">Subject</h6>
                                                <h2 class="m-b-0">25</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- customar project  end -->
                            <!-- subscribe start -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account summary</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="summary-chart"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- subscribe end -->
                            <!-- Tasks start -->
                            <div class="col-xl-5 col-md-12">
                                <div class="card ui-task mb-4">
                                    <h5 class="card-header">Notice</h5>
                                    <div class="card-body">
                                        <ul class="list-unstyled task-list">
                                            <li>
                                                <i class="feather icon-check f-w-600 task-icon bg-success"></i>
                                                <p class="m-b-5">8:50</p>
                                                <h6 class="text-muted">Your first semester Exam will held on <span class="text-c-blue">19-04-2018</span>.</h6>
                                            </li>
                                            <li>
                                                <i class="task-icon bg-primary"></i>
                                                <p class="m-b-5">Sat, 5 Mar</p>
                                                <h6 class="text-muted">In your school campus on <span class="text-c-blue">1-03-2018</span> will held a program of <span class="text-c-blue">annual sports day</span>.You are all invited.</h6>
                                            </li>
                                            <li>
                                                <i class="task-icon bg-danger"></i>
                                                <p class="m-b-5">Sun, 17 Feb</p>
                                                <h6 class="text-muted">Your second semester exam will held on 30-08-2018.Please be prepare for your exam</h6>
                                            </li>
                                            <li>
                                                <i class="task-icon bg-warning"></i>
                                                <p class="m-b-5">Sat, 18 Mar</p>
                                                <h6 class="text-muted">On <span class="text-c-blue">20-11-2018</span> will held a programming contest in school campus.Registration start from today. </h6>
                                            </li>
                                            <li class="pb-2 mb-0">
                                                <i class="task-icon bg-success"></i>
                                                <p class="m-b-5">Sat, 22 Mar</p>
                                                <h6 class="text-muted">Prize giving ceremony will held on <span class="text-c-blue">03-01-2019</span>.Best Student List published In your Website.</h6>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-md-12">
                                <div class="card overflow-hidden">
                                    <div class="card-body bg-primary">
                                        <div id="absent-chart"></div>
                                    </div>
                                    <div class="card-footer">
                                        <h6 class="text-muted m-b-30 m-t-15">Students Today's Attendance</h6>
                                        <div class="row text-center">
                                            <div class="col-6 border-right">
                                                <h6 class="text-muted m-b-10">Total present student</h6>
                                                <h3 class="">175</h3>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="text-muted m-b-10">Total absent student</h6>
                                                <h3 class="">76</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tasks end -->
                            <!-- subscribe start -->
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Event List </h5>
                                    </div>
                                    <div class="card-body">
                                        <div id='Eventcalendar' class='calendar'></div>
                                    </div>
                                </div>
                            </div>
                            <!-- subscribe end -->
                        </div>
                    </div>
   <!-- [ content ] End -->
   <!-- [ Layout footer ] Start -->
   <nav class="layout-footer footer footer-light">
      <div class="container-fluid d-flex flex-wrap justify-content-between text-center container-p-x pb-3">
         <div class="pt-3">
            <span class="float-md-right d-none d-lg-block">&copy; {{ config('app.name', 'Laravel') }} &amp; Made with <i class="fas fa-heart text-danger mr-2"></i></span>
         </div>
      </div>
   </nav>
   <!-- [ Layout footer ] End -->
</div>
<!-- [ Layout content ] Start -->
@endsection