@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Edit Study Material</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Study Materials</li>
                <li class="breadcrumb-item active">Edit Study Material</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update Study Material</h6>
            <div class="card-body">

                {{ Form::open(array('url' => route('study-material.update',$study->id),'enctype'=>'multipart/form-data','method'=>'put')) }}
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $study->title }}">
                            <div class="clearfix"></div>
                            @error('title')
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
                                <option value="{{$tid=$tval->id}}" @if($study->teacher_id==$tid) selected @endif>{{$tval->name}}</option>
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
                        <div class="form-group col-md-4">
                            <label class="form-label">Upload Image </label>
                            <input type="file" class="form-control" placeholder="Upload Image " name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @php if(Storage::disk('public')->exists('/studymaterial/'.$study->img) && $study->img !=''){  @endphp                                
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px">
                                    <img height="84"  width="165" src="<?=url('/storage/studymaterial/').'/'.$study->img ?>">
                                    </div>
                                </div>                              
                            @php } @endphp  
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
                            @php if(Storage::disk('public')->exists('/studymaterial/'.$study->video) && $study->video !=''){  @endphp                                
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px">
                                    <iframe height="84"  width="165" src="<?=url('/storage/studymaterial/').'/'.$study->video ?>"></iframe>
                                   
                                    </div>
                                </div>                              
                            @php } @endphp  
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
                            <!-- @php if(Storage::disk('public')->exists('/studymaterial/'.$study->document) && $study->document !=''){  @endphp                                
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px">
                                    <iframe type="application/pdf, application/doc, application/docx" height="84"  width="165" src="<?=url('/storage/studymaterial/').'/'.$study->document ?>"></iframe>
                                   
                                    </div>
                                </div>                              
                            @php } @endphp   -->
                            @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Description <span class="error">*</span></label>
                            
                            <textarea id="bs-markdown" class="form-control mt-4" name="description" rows="10">{{$study->description}}</textarea>
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
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" placeholder="Enter Link" value="{{$study->link}}" name="link">
                            <div class="clearfix"></div>
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active" @if($study->status == 'active'){{"selected"}} @endif>Active</option>
                                <option value="inactive"@if($study->status == 'inactive'){{"selected"}}@endif>Inactive</option>
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