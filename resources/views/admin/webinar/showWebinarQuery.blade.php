@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Parenting Webinar Query</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Parenting Webinar</li>
                <li class="breadcrumb-item active">Parenting Webinar Query</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Parenting Webinar Query</h6>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-2">
                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4"><b>Name</b></div>
                                    <div class="col-8">{{$webinar->name}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4"><b>Email Addree</b></div>
                                    <div class="col-8">{{$webinar->email}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4"><b>Phone number</b></div>
                                    <div class="col-8">{{$webinar->phone}}</div>
                                </div>
                                <div class="row mb-2">
                                <div class="col-4"><b>Organization name</b></div>
                                    <div class="col-8">{{$webinar->organization}}</div>
                                    
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4"><b>Query</b></div>
                                    <div class="col-8">{{$webinar->description}}</div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection