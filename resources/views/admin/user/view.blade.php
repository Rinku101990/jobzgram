@extends('layouts.app-admin')
@section('content')
<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
<h4 class="font-weight-bold py-3 mb-0">Users Profile</h4>
<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
   <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
      <li class="breadcrumb-item">Users Profile</li>
      <li class="breadcrumb-item active">Users Profile</li>
   </ol>
</div>
<div class="card mb-4">
   <div class="card-body">
      <div class="row">
         <div class="col-md-auto col-sm-12">
            <img src="{{ url('assets/img/teacher/inst-7.jpg')}}" alt="" class="d-block ui-w-100 rounded-circle mb-3">
         </div>
         <div class="col">
            <h4 class="font-weight-bold mb-2">{{$user->name }}</h4>
            <h6 class=" mb-2" style="font-weight: 400;"><i class="fas fa-envelope"></i> {{$user->email }}</h6>
            <h6 class=" mb-2"  style="font-weight: 400;"><i class="fas fa-phone"></i> +91-{{$user->mobile }}</h6>
            <h6 class=" mb-4"  style="font-weight: 400;"><i class="fas fa-check-circle"></i> Status:  @if($user->status=='active')
               <span class="badge badge-success">Active</span> 
               @else
               <span class="badge badge-danger">Disabled</span> 
               @endif
            </h6>
            @if($user->status=='active')
            <a href="{{url('admin/user/status/inactive/'.$user->id)}}" class="btn btn-danger btn-round">Disabled</a>
            @else
            <a href="{{url('admin/user/status/active/'.$user->id)}}" class="btn btn-success btn-round">Active</a>
            @endif
            
            
         </div>
      </div>
   </div>
</div>
<div class="row">
   <div class="col">
      <!-- Info -->
      <div class="card mb-4">
         <div class="card-body">
            <div class="row mb-2">
               <div class="col-md-3 text-muted">Birthday:</div>
               <div class="col-md-9">
                  May 3, 1995
               </div>
            </div>
            <div class="row mb-2">
               <div class="col-md-3 text-muted">Country:</div>
               <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-dark">India</a>
               </div>
            </div>
            <div class="row mb-2">
               <div class="col-md-3 text-muted">State:</div>
               <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-dark">UP</a>
               </div>
            </div>
            <div class="row mb-2">
               <div class="col-md-3 text-muted">City:</div>
               <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-dark">Noida</a>
               </div>
            </div>
            <div class="row mb-2">
               <div class="col-md-3 text-muted">Languages:</div>
               <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-dark">English</a>
               </div>
            </div>
            <h6 class="my-3">Contacts</h6>
            <div class="row mb-2">
               <div class="col-md-3 text-muted">Phone:</div>
               <div class="col-md-9">
                  +91 {{$user->mobile }}
               </div>
            </div>
            <h6 class="my-3">Interests</h6>
            <div class="row mb-2">
               <div class="col-md-3 text-muted">Favorite music:</div>
               <div class="col-md-9">
                  <a href="javascript:void(0)" class="text-dark">Rock</a>,
                  <a href="javascript:void(0)" class="text-dark">Alternative</a>,
                  <a href="javascript:void(0)" class="text-dark">Electro</a>,
                  <a href="javascript:void(0)" class="text-dark">Drum &amp; Bass</a>,
                  <a href="javascript:void(0)" class="text-dark">Dance</a>
               </div>
            </div>
         </div>
         <div class="card-footer text-center p-0">
            <div class="row no-gutters row-bordered row-border-light">
               <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                  <div class="font-weight-bold">24</div>
                  <div class="text-muted small">posts</div>
               </a>
               <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                  <div class="font-weight-bold">51</div>
                  <div class="text-muted small">videos</div>
               </a>
               <a href="javascript:void(0)" class="d-flex col flex-column text-dark py-3">
                  <div class="font-weight-bold">215</div>
                  <div class="text-muted small">photos</div>
               </a>
            </div>
         </div>
      </div>
      <!-- / Info -->
      <!-- / Posts -->
   </div>
</div>
<!-- [ content ] End -->
<!-- [ content ] End -->
@endsection