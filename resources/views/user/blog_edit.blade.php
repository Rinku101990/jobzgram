@extends('include.layout')
@section('content')
<style type="text/css">
   .badge-warning {
   color: #fff;
   }
   .card-header {
   background: #0051DE;
   color: #fff;
   }
   .yl-breadcrumb-section .breadcrumb-overlay {
   top: 0;
   left: 0;
   width: 100%;
   height: 100%;
   opacity: 1;
   background-color: #030014; 
   background-image: linear-gradient(to right, #0051de 0%, #ffa300 100%);
   }
   .yl-breadcrumb-section {
   padding: 10px 0px 10px;
   }
</style>
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Views on My Blogs</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Views on My Blogs</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<section id="course-details" class="course-details-section">
   <div class="container">
      <div class="course-details-content">
         <div class="row">
            @include('user.user_sidebar')
            <div class="col-lg-9">
               <div class="aiz-user-panel">
                  <!-- Basic Info-->
                  <div class="card">
                     <div class="card-header">
                        <h5 class="mb-0 h6">Edit Blog</h5>
                     </div>
                     <div class="card-body">
                         @if ($message = session()->has('errors_validation'))
                            <div class="alert alert-danger" role="alert" id="danger-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                @foreach(session()->get('errors_validation') as $err)
                                {{$err}}
                                <br>
                                @endforeach
                            </div>
                        @endif
                        @if ($message = session()->has('success_message'))
                            <div class="alert alert-success" role="alert" id="danger-alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                                {{session()->get('success_message')}}
                            </div>
                        @endif
                        <div class="order-list-tabel-main table-responsive">
                            <form action="{{ url('blog_update') }}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <input type="hidden" name="blogid" value="{{$blog->id}}">
                                <input type="hidden" name="user" value="{{@Auth::user()->id}}"/>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="form-label">Title <span class="error">*</span></label>
                                            <input type="text" class="form-control"  name="title" placeholder="Enter Title " value="{{$blog->title}}"  onkeyup="slug_url_blog(this.value,'title_slug')">
                                            <input type="hidden" class="form-control" name="title_slug" id="title_slug" value="{{$blog->title_slug}}">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="form-label">Category <span class="error">*</span></label>
                                            <select class="form-control"  name="category"   style="display: block !important;" required>
                                                <option value="">Select Category</option>
                                                @foreach($blogcategory as $bc_val)
                                                <option value="{{$bc_val->id}}" {{ $bc_val->id == $blog->category  ? 'selected' : ''}}>{{$bc_val->name}}</option>
                                                @endforeach
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="form-label">Author <span class="error">*</span></label>
                                            <input type="text" class="form-control" value="{{@Auth::user()->name}}" name="author" placeholder="Enter Author " readonly required>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="form-label">Upload Image <span class="error">*</span></label>
                                            <input type="file" class="form-control"  name="img" accept="image/x-png,image/jpeg">
                                            <div class="clearfix"></div>
                                            <input type="hidden" name="hiddenimg" value="{{url('storage/blog/'.$blog->img)}}">
                                        </div>
                                        <img src="{{url('storage/blog/'.$blog->img)}}" style="width:100px;">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col mb-0">
                                            <label class="form-label">Description <span class="error">*</span></label>
                                            <textarea class="form-control" name="description" style="height:100px" placeholder="Enter description..." required>{{$blog->description}}</textarea>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

<script>
    function slug_url_blog(get,id){
        var  data=$.trim(get);
        var string = data.replace(/[^A-Z0-9]/ig, '-')
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes;
        var finalvalue=string.toLowerCase();
        document.getElementById(id).value=finalvalue;
    }
</script>