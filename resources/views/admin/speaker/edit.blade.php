@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Edit Speaker</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Speakers</li>
                <li class="breadcrumb-item active">Edit Speaker</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update Speaker</h6>
            <div class="card-body">

                {{ Form::open(array('url' => route('speaker.update',$speaker->id),'enctype'=>'multipart/form-data','method'=>'put')) }}
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Name <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $speaker->name }}">
                            <div class="clearfix"></div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Email Id</label>
                            <input type="email" class="form-control" placeholder="Enter Email Id" name="email" value="{{ $speaker->email }}">
                            <div class="clearfix"></div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">Conatct No. <span class="error">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Conatct No." value="{{ $speaker->phone }}" name="phone">
                            <div class="clearfix"></div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Designation <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Designation" value="{{ $speaker->designation }}" name="designation">
                            <div class="clearfix"></div>
                            @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Upload Profile Img</label>
                            <input type="file" class="form-control" placeholder="Upload Banner" name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @php if(Storage::disk('public')->exists('/speaker/'.$speaker->img) && $speaker->img !=''){  @endphp
                                <div class="col-md-6" > 
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px">
                                    <img height="84"  width="165" src="<?=url('/storage/speaker/').'/'.$speaker->img ?>">
                                    </div>
                                </div>
                                </div>
                            @php } @endphp  

                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active" @if($speaker->status == 'active'){{"selected"}} @endif>Active</option>
                                <option value="inactive"@if($speaker->status == 'inactive'){{"selected"}}@endif>Inactive</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection