@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Job</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Job</li>
                <li class="breadcrumb-item active">Add Job</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Job</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/program') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" onkeyup="slug_url_program(this.value,'title_slug')">
                            <input type="hidden" class="form-control" name="title_slug" id="title_slug"> 
                            <div class="clearfix" id="programTitleLength"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Country <span class="error">*</span></label>
                            <select class="form-control"  name="category">
                                <option value="">Select Country</option>
                                @foreach($category as $cateValue)
                                <option value="{{$cateValue->id}}">{{$cateValue->title}}</option>
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
                            <label class="form-label">Program Fees <span class="error">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Program Fees" name="fees">
                            <div class="clearfix"></div>
                            @error('fees')
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
                               <option value="coming">Coming Soon</option>
                               <option value="inactive">Inactive</option>
                           </select>
                           <div class="clearfix"></div>
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
    function slug_url_program(get,id){
        var  data=$.trim(get); // For String Lsug
        var maxLength = 27; // String length Limit
        var strLength = get.length; // String Length Auto
        var string = data.replace(/[^A-Z0-9]/ig, '-')
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes;
        var finalvalue=string.toLowerCase();
        document.getElementById(id).value=finalvalue;

        // String Length Counter //
        if(strLength > maxLength){
            document.getElementById("programTitleLength").innerHTML = '<span style="color: red;">'+strLength+' out of '+maxLength+' characters</span>';
            $('input[type="submit"]').attr('disabled','disabled');
        }else{
            document.getElementById("programTitleLength").innerHTML = strLength+' out of '+maxLength+' characters';
            $('input[type="submit"]').removeAttr('disabled');
        }
    }
</script>