@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Parenting Webinar</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Parenting Webinar</li>
                <li class="breadcrumb-item active">Add Parenting Webinar</li>
            </ol>
        </div>
        

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Parenting Webinar</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/parentingwebinar') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" onkeyup="slug_url_webinar(this.value,'title_slug')">
                            <input type="hidden" name="title_slug" id="title_slug"> 
                            <div class="clearfix" id="webinarTitleLength"></div>
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
                            <label class="form-label">Upload Image <span class="error">*</span></label>
                            <input type="file" class="form-control" placeholder="Upload Banner" name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Expire Date <span class="error">*</span></label>
                            <input type="date" class="form-control" placeholder="Enter Expire Date " name="expire_date" >
                            <div class="clearfix"></div>
                            @error('expire_Date')
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
                            <label class="form-label">Video recording url <span class="error"></span></label>
                            <input type="text" class="form-control" placeholder="Enter Video recording url" name="video_url">
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">Speaker <span class="error">*</span></label>
                            <select class="form-control" name="speaker">
                                <option value="">Select Speaker</option>
                                @foreach($speaker as $speak_val)
                                    <option value="{{$speak_val->id}}">{{$speak_val->name}}</option>
                                @endforeach
                            </select>
                            <div class="clearfix"></div>
                            @error('speaker')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label class="form-label">Webinar Amount (For Free Webinar : 0 INR)<span class="error"></span></label>
                            <input type="number" class="form-control" placeholder="Enter Webinar Amount" name="amount">
                            <div class="clearfix"></div>
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

                    <div class="form-row  demo-vertical-spacing">
                        <div class="form-group col-md-6 select2-warning">
                            <label class="form-label">Search Tag <span class="error">*</span></label>
                            <select class="select2-demo form-control" name="tags[]" multiple style="width: 100%" required>
                                @foreach($tags as $taglist)
                                    <option value="{{$taglist->title}}">{{$taglist->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value="Create">
                </form>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection

<script>
    function slug_url_webinar(get,id){
        var  data=$.trim(get); // For String Lsug
        var maxLength = 62; // String length Limit
        var strLength = get.length; // String Length Auto
        var string = data.replace(/[^A-Z0-9]/ig, '-')
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes;
        var finalvalue=string.toLowerCase();
        document.getElementById(id).value=finalvalue;

        // String Length Counter //
        if(strLength > maxLength){
            document.getElementById("webinarTitleLength").innerHTML = '<span style="color: red;">'+strLength+' out of '+maxLength+' characters</span>';
            $('input[type="submit"]').attr('disabled','disabled');
        }else{
            document.getElementById("webinarTitleLength").innerHTML = strLength+' out of '+maxLength+' characters';
            $('input[type="submit"]').removeAttr('disabled');
        }
    }
</script>