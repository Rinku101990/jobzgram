@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Edit Page</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Page</li>
                <li class="breadcrumb-item active">Edit Page</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update Page</h6>
            <div class="card-body">

                {{ Form::open(array('url' => route('page.update',$page->id),'enctype'=>'multipart/form-data','method'=>'put')) }}
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $page->title }}">
                            <div class="clearfix"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">Upload Banner</label>
                            <input type="file" class="form-control" placeholder="Upload Banner" name="banner" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @php if(Storage::disk('public')->exists('/page/'.$page->banner) && $page->banner !=''){  @endphp
                                <div class="col-md-6" > 
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px">
                                    <img height="84"  width="165" src="<?=url('/storage/page/').'/'.$page->banner ?>">
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
                        
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Description <span class="error">*</span></label>
                            
                            <textarea id="bs-markdown" class="form-control mt-4" name="description" rows="10">{{ $page->description}}</textarea>
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
                                <option value="active" @if($page->status == 'active'){{"selected"}} @endif>Active</option>
                                <option value="inactive"@if($page->status == 'inactive'){{"selected"}}@endif>Inactive</option>
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