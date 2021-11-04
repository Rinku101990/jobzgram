@extends('layouts.app-admin')
@section('content')
<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
   <h4 class="font-weight-bold py-3 mb-0">Edit Blog</h4>
   <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
         <li class="breadcrumb-item">Blogs</li>
         <li class="breadcrumb-item active">Edit Blog</li>
      </ol>
   </div>
   <div class="card mb-4">
      <h6 class="card-header bg-dark text-white">Edit Blog</h6>
      <div class="card-body">
         {{ Form::open(array('url' => route('blog.update',$blog->id),'enctype'=>'multipart/form-data','method'=>'put')) }}
         {!! csrf_field() !!}
         <div class="form-row">
            <div class="form-group col-md-6">
               <label class="form-label">Title <span class="error">*</span></label>
               <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $blog->title}}" onkeyup="countChars(this);">
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
                  <option value="{{ $blid=$cate_val->id}}"  @if($blog->category==$blid) {{__('selected')}} @endif>{{$cate_val->name}}</option>
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
               <input type="text" class="form-control" placeholder="Enter Author" name="author"  value="{{ $blog->author}}">
               <div class="clearfix"></div>
               @error('author')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </div>
            <div class="form-group col-md-6">
               <label class="form-label">Upload Banner </label>
               <input type="file" class="form-control" placeholder="Upload Banner" name="img" accept="image/x-png,image/jpeg">
               <div class="clearfix"></div>
               @php if(Storage::disk('public')->exists('/blog/'.$blog->img) && $blog->img !=''){  @endphp
               <div class="col-md-6" >
                  <div class="form-group">
                     <div class="form-line" style="border-bottom: 0px">
                        <img height="84"  width="165" src="<?=url('/storage/blog/').'/'.$blog->img ;?>">
                     </div>
                  </div>
               </div>
               @php } @endphp  
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
               <textarea id="bs-markdown" class="form-control mt-4" name="description" rows="10">{{ $blog->description}}</textarea>
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
                    @php $tagExplode = explode(',',$blog->search_tag); @endphp
                    @foreach($tags as $taglist)
                        @foreach($tagExplode as $tagEx)
                        <option value="{{$taglist->title}}" @if($taglist->title == $tagEx){{"selected"}} @endif>{{$taglist->title}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
               <label class="form-label">Status <span class="error">*</span></label>
               <select class="form-control" name="status">
               <option value="active" @if($blog->status == 'active'){{"selected"}} @endif>Active</option>
               <option value="inactive"@if($blog->status == 'inactive'){{"selected"}}@endif>Inactive</option>
               <option value="reject"@if($blog->status == 'reject'){{"selected"}}@endif>Rejected</option>
               </select>
               <div class="clearfix"></div>
            </div>
         </div>
         <br>
         <button type="submit" class="btn btn-primary">Submit</button>
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