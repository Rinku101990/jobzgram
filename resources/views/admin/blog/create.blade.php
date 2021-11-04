@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Blog</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Blogs</li>
                <li class="breadcrumb-item active">Add Blog</li>
            </ol>
        </div>
        

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Blog</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/blog') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" onkeyup="countChars(this);">
                            <div class="clearfix" id="blogTitleLength"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Category <span class="error">*</span></label>
                            <select class="form-control" name="category">
                            <option value="">Select Cateory</option>
                            @foreach($category as $cate_val)
                            <option value="{{$cate_val->id}}">{{$cate_val->name}}</option>
                            @endforeach
                            </select>
                            <div class="clearfix"></div>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-6">
                            <label class="form-label">Author <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Author" name="author">
                            <div class="clearfix"></div>
                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Upload Banner <span class="error">*</span></label>
                            <input type="file" class="form-control" placeholder="Upload Banner" name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @error('img')
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
                    <div class="form-row demo-vertical-spacing">
                        <br>
                        <div class="form-group col-md-6 select2-warning">
                            <label class="form-label">Search Tag <span class="error">*</span></label>
                            <select class="select2-demo form-control" name="tags[]" multiple style="width: 100%" required>
                                @foreach($tags as $taglist)
                                    <option value="{{$taglist->title}}">{{$taglist->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection
<script>
function countChars(obj){
    var maxLength = 78;
    var strLength = obj.value.length;
    
    if(strLength > maxLength){
        document.getElementById("blogTitleLength").innerHTML = '<span style="color: red;">'+strLength+' out of '+maxLength+' characters</span>';
        $('input[type="submit"]').attr('disabled','disabled');
    }else{
        document.getElementById("blogTitleLength").innerHTML = strLength+' out of '+maxLength+' characters';
        $('input[type="submit"]').removeAttr('disabled');
    }
}
</script>