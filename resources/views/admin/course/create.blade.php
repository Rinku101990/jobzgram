@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Course</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Courses</li>
                <li class="breadcrumb-item active">Add Course</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Add Course</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/course') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title">
                            <div class="clearfix"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Amount (&#8377;) <span class="error">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Amount (&#8377;)" name="amount">
                            <div class="clearfix"></div>
                            @error('amount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Duration <span class="error">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Duration" name="duration" >
                            <div class="clearfix"></div>
                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Type <span class="error">*</span></label>
                            <select class="form-control" name="type">
                                <option value="day">Day</option>
                                <option value="week">Week</option>
                                <option value="year">Year</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div> -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Upload Img <span class="error">*</span></label>
                            <input type="file" class="form-control" placeholder="Upload Banner" name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Age Group <span class="error">*</span></label>
                            <select class="form-control" name="age_group">
                                <option value="">- Select -</option>
                                <option value="5 to 8 years">5 to 8 years</option>
                                <option value="5 to 13 years">5 to 13 years</option>
                                <option value="8 to 13 years">8 to 13 years</option>
                                <option value="9 to 13 years">9 to 13 years</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Small Description <span class="error">*</span></label>
                            
                            <textarea id="bs-markdown" class="form-control mt-4" name="description" rows="3"></textarea>
                            <div class="clearfix"></div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection