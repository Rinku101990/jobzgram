@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Edit Search Tag</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Search Tag</li>
                <li class="breadcrumb-item active">Edit Search Tag</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update Search Tag</h6>
            <div class="card-body">

                {{ Form::open(array('url' => route('search_tag.update',$tagSearch->id),'method'=>'put')) }}
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Tag Category <span class="error">*</span></label>
                            <select class="form-control"  name="tag_cate_id">
                                <option value="">Select Tag Category</option>
                                @foreach($tagCategory as $tagCateValue)
                                <option value="{{$tagCateValue->id}}" @if($tagCateValue->id == $tagSearch->tag_cate_id){{"selected"}} @endif>{{$tagCateValue->title}}</option>
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
                            <label class="form-label">Tag Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $tagSearch->title }}"> 
                            <div class="clearfix"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active" @if($tagSearch->status == 'active'){{"selected"}} @endif>Active</option>
                                <option value="inactive"@if($tagSearch->status == 'inactive'){{"selected"}}@endif>Inactive</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection

<script>
    function slug_url_tag_category(get,id){
        var  data=$.trim(get);
        var string = data.replace(/[^A-Z0-9]/ig, '-')
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes;
        var finalvalue=string.toLowerCase();
        document.getElementById(id).value=finalvalue;
    }
</script>