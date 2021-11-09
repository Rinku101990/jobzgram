@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Country</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Country</li>
                <li class="breadcrumb-item active">Add Country</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Country</h6>
            <div class="card-body">
                <form class="form-horizontal form-label-left" action="{{ url('admin/category') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" onkeyup="slug_url(this.value,'url_slug')">
                            <input type="hidden" class="form-control" name="url_slug" id="url_slug"> 
                            <div class="clearfix"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Upload Banner <span class="error">*</span></label>
                            <input type="file" class="form-control" placeholder="Upload Banner" name="banner" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @error('banner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Description <span class="error">*</span></label>
                            <textarea id="bs-markdown" class="form-control mt-4" name="description" rows="10"></textarea>
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
                           <label class="form-label">Status <span class="error">*</span></label>
                           <select class="form-control" name="status">
                               <option value="active">Active</option>
                               <option value="inactive">Inactive</option>
                           </select>
                           <div class="clearfix"></div>
                       </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection

<script>
    function slug_url(get,id){
        var  data=$.trim(get);
        var string = data.replace(/[^A-Z0-9]/ig, '-')
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes;
        var finalvalue=string.toLowerCase();
        document.getElementById(id).value=finalvalue;
    }
</script>