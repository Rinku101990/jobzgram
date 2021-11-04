@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Batch</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Batches</li>
                <li class="breadcrumb-item active">Add Batch</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Add Batch</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/batch') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Name <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name">
                            <div class="clearfix"></div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Teacher <span class="error">*</span></label>
                            <select class="form-control" name="teacher">
                                <option value="">Select</option>
                                @foreach($teacher as $tval)
                                <option value="{{$tval->id}}">{{$tval->name}}</option>
                                @endforeach
                            </select>
                            <div class="clearfix"></div>
                            @error('teacher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Start Date <span class="error">*</span></label>
                            <input type="date" class="form-control" id="b-m-dtp-date" placeholder="Enter Start Date" name="start_date">
                            <div class="clearfix"></div>
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">End Date <span class="error">*</span></label>
                            <input type="date" class="form-control" id="b-m-dtp-date" placeholder="Enter End Date" name="end_date">
                            <div class="clearfix"></div>
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">My Schedule<span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Mon & Wed" name="schedule">
                            <div class="clearfix"></div>
                            @error('schedule')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Batch Time<span class="error">*</span></label>
                            <input type="time" class="form-control" id="b-m-dtp-date" placeholder="Enter Time (08:00 AM)" name="time">
                            <div class="clearfix"></div>
                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Upload Image </label>
                            <input type="file" class="form-control" placeholder="Upload Image " name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Upload Video</label>
                            <input type="file" class="form-control"  name="video" accept="video/*">
                            <div class="clearfix"></div>
                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Upload Document</label>
                            <input type="file" class="form-control"  name="document" accept=".doc, .docx, .pdf">
                            <div class="clearfix"></div>
                            @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->
                    <div class="form-row">
                    <!-- <div class="form-group col-md-6">
                            <label class="form-label">Batch Link</label>
                            <input type="text" class="form-control" placeholder="Enter Batch Link"  name="batch_link">
                            <div class="clearfix"></div>
                            @error('batch_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                     
                        <div class="form-group col-md-6">
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