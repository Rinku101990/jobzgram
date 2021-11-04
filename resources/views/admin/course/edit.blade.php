@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Edit Course</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Courses</li>
                <li class="breadcrumb-item active">Edit Course</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update Course</h6>
            <div class="card-body">

                {{ Form::open(array('url' => route('course.update',$course->id),'enctype'=>'multipart/form-data','method'=>'put')) }}
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $course->title }}">
                            <div class="clearfix"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Amount (&#8377;) <span class="error">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Amount (&#8377;)" name="amount" value="{{ $course->amount }}">
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
                            <input type="number" class="form-control" placeholder="Enter Duration" name="duration" value="{{ $course->duration }}" >
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
                                <option value="day" @if($course->type == 'day'){{"selected"}} @endif>Day</option>
                                <option value="week" @if($course->type == 'week'){{"selected"}} @endif>Week</option>
                                <option value="year" @if($course->type == 'year'){{"selected"}} @endif>Year</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div> -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Upload Img</label>
                            <input type="file" class="form-control" placeholder="Upload Img" name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>                         

                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @php if(Storage::disk('public')->exists('/course/'.$course->img) && $course->img !=''){  @endphp
                        <div class="col-md-6" > 
                            <div class="form-group">
                                <div class="form-line" style="border-bottom: 0px">
                                <img height="84"  width="165" src="<?=url('/storage/course/').'/'.$course->img ?>">
                                </div>
                            </div>
                        </div>
                        @php } @endphp  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Age Group <span class="error">*</span></label>
                            <select class="form-control" name="age_group">
                                <option value="">- Select -</option>
                                <option value="5 to 8 years" @if($course->age_group == '5 to 8 years'){{"selected"}} @endif>5 to 8 years</option>
                                <option value="5 to 13 years" @if($course->age_group == '5 to 13 years'){{"selected"}} @endif>5 to 13 years</option>
                                <option value="8 to 13 years" @if($course->age_group == '8 to 13 years'){{"selected"}} @endif>8 to 13 years</option>
                                <option value="9 to 13 years" @if($course->age_group == '9 to 13 years'){{"selected"}} @endif>9 to 13 years</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Small Description <span class="error">*</span></label>                            
                            <textarea id="bs-markdown" class="form-control mt-4" name="description" rows="5">{{$course->description}}</textarea>
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
                                <option value="active" @if($course->status == 'active'){{"selected"}} @endif>Active</option>
                                <option value="inactive"@if($course->status == 'inactive'){{"selected"}}@endif>Inactive</option>
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