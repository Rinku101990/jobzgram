@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Edit Testimonial</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Testimonial</li>
                <li class="breadcrumb-item active">Edit Testimonial</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update Testimonial</h6>
            <div class="card-body">

                {{ Form::open(array('url' => route('testimonial.update',$testimonial->id),'enctype'=>'multipart/form-data','method'=>'put')) }}
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Name <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $testimonial->name }}">
                            <div class="clearfix"></div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Designation <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Designation" name="designation" value="{{ $testimonial->designation }}">
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
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $testimonial->title}}">
                            <div class="clearfix"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Description <span class="error">*</span></label>
                            
                            <textarea  class="form-control" name="description">{{ $testimonial->description}}</textarea>
                            <div class="clearfix"></div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      
                    </div>
                    <div class="form-row">
                    
                    <div class="form-group col-md-6">
                            <label class="form-label">Upload Profile Img </label>
                            <input type="file" class="form-control" placeholder="Upload Profile Img" name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @php if(Storage::disk('public')->exists('/testimonial/'.$testimonial->img) && $testimonial->img !=''){  @endphp
                              
                                    <img height="84"  width="45" src="<?=url('/storage/testimonial/').'/'.$testimonial->img ?>">
                                   
                            @php } @endphp  

                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active" @if($testimonial->status == 'active'){{"selected"}} @endif>Active</option>
                                <option value="inactive"@if($testimonial->status == 'inactive'){{"selected"}}@endif>Inactive</option>
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