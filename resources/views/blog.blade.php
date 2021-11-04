@extends('include.layout')
@section('content')
<style type="text/css">
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
   #social-links ul{
          padding-left: 0;
     }
     #social-links ul li {
          display: inline-block;
     } 
     #social-links ul li a {
          padding: 0px 4px;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin: 1px;
          font-size: 25px;
     }
     #social-links .fa-facebook-square{
           color: #0d6efd;
     }
     #social-links .fa-twitter{
           color: deepskyblue;
     }
     #social-links .fa-linkedin{
           color: #0e76a8;
     }
     #social-links .fa-whatsapp{
          color: #25D366
     }
     #social-links .fa-reddit{
          color: #FF4500;;
     }
     #social-links .fa-telegram{
          color: #0088cc;
     }
</style>
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Our Blog</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="{{ url('parenting-forum')}}" style="color:#fff">Parenting Forum</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Our Blog</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of blog feed section
   ============================================= -->
<section id="course-details" class="course-details-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <a href="javascript:void(0);" data-toggle="modal" data-target="#modals-default" class="btn btn-info" style="width:200px;background: #0051DE;    height: 40px;color: #fff">Write your own fable</a>
            <br>&nbsp;               
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            
               <div class="sort-by-bar row no-gutters mt-3">
                  <div class="col-lg-6 col-md-6">
                     <div class="sort-by-box">
                        <form id="search-form" action="{{url('blog')}}" method="GET">
                           <div class="form-group">
                              <div class="search-widget">
                                 <div class="yl-blog-widget-wrap" style=" border:1px solid #ced4da;">
                                    <div class="yl-search-widget position-relative">
                                       <input type="text" name="search" value="{{@$_GET['search']}}" placeholder="Search ..." required>
                                       <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-6 col-md-6">
                     <div class="sort-by-box px-1">
                        <form id="search-form" action="{{url('blog')}}" method="GET">
                           <div class="form-group">
                              <div class="search-widget">
                                 <div class="yl-blog-widget-wrap" style=" border:1px solid #ced4da;">
                                    <div class="yl-search-widget position-relative">
                                       <select class="form-control" name="sort_by" style="height:48px;display: block !important;font-size: 15px;">
                                          <option value="">Sort by</option>
                                          @forelse($searchTag as $sTag)
                                          <option value="{{$sTag->title}}" >{{$sTag->title}}</option>
                                          @empty
                                          <option value="">no search tag</option>
                                          @endforelse
                                       </select>
                                       <button type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            
         </div>
         
      </div>
      <div class="yl-course-filter-wrap">
         <div class="filtr-container-area grid clearfix" data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 0 } }">
            <div class="grid-sizer"></div>
            @forelse($blog as $key=>$bval)
            <div class="grid-item grid-size-25 recent popular favourites" data-category="recent popular favourites">
               <div class="yl-blog-img-text-2 yl-headline pera-content">
                  <a href="{{url('blog/'.$bval->id)}}">
                     <div class="yl-blog-img-2 position-relative">
                        <div class="yl-blog-img-warap-2 position-relative">
                           <img src="{{ url('/storage/blog/').'/'.$bval->img}}" alt="{{$bval->title}}"  style=" width: 100%; height: 187px;  object-fit: fill;">
                        </div>
                        <div class="yl-blog-date-2 text-center">
                           <a href="{{url('blog/'.$bval->id)}}">{{ date('d',strtotime($bval->updated_at))}}<span>{{date('M',strtotime($bval->updated_at))}}/{{date('y',strtotime($bval->updated_at))}}</span></a>
                        </div>
                     </div>
                  </a>
                  <div class="yl-blog-text-2">
                     <div class="yl-blog-meta-2 text-uppercase">
                        <a href="javascript:void(0)" style="top: 4px;overflow: hidden;text-overflow: ellipsis; white-space: nowrap;   width: 90px;    float: left;"><i class="fa fa-user"></i> {{$bval->author}}</a><br>
                        <a href="javascript:void(0)"><i class="fa fa-eye"></i> {{$bval->getblogview()}}</a>
                        <a href="javascript:void(0)"><i class="fa fa-comment"></i> {{$bval->getblogcomment()}}</a>
                        <a href="javascript:void(0)"><i class="fa fa-thumbs-up"></i> {{$bval->getbloglike()}}</a>
                        
                     </div>
                     <div class="yl-blog-title-text-2">
                        <h3 style="font-size: 18px;height: 70px !important;padding: 0px 0px 15px !important;"><a href="{{url('blog/'.$bval->id)}}">{{ mb_strimwidth($bval->title, 0, 75, "..")}}</a>
                        </h3>
                        <!-- <p align="justify">{{ mb_strimwidth($bval->description, 0, 55, "...")}}</p> -->
                        <a class="yl-blog-more" href="{{url('blog/'.$bval->id)}}">Read more <span>+</span></a>
                        <div class="social-btn-sp">
                           {!! $shareButtons !!}
                        </div>
                     </div>
                  </div>
                  
               </div>
               
            </div>
            @empty
            <div class="grid-item grid-size-25">
               No Record Found!
            </div>
            @endforelse
         </div>
      </div>
   </div>
</section>
<!-- End of Course section
   ============================================= --> 
<div class="modal fade" id="modals-default" style="display: none;" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         @if(@Auth::user()->registerAs=='student')
         <div class="modal-header">
            <h5 class="modal-title">                                                  
               Write your own fable
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
         </div>
         <form action="{{ url('blog_save')}}" method="post" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <input type="hidden" name="user" value="{{@Auth::user()->id}}"/>
            <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col">
                     <label class="form-label">Title <span class="error">*</span></label>
                     <input type="text" class="form-control"  name="title" placeholder="Enter Title" onkeyup="slug_url_blog_model(this.value,'title_slug')" required>
                     <input type="hidden" class="form-control" name="title_slug" id="title_slug">
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col">
                     <label class="form-label">Category <span class="error">*</span></label>
                     <select class="form-control"  name="category"   style="display: block !important;" required>
                        @foreach($blogcategory as $bc_val)
                        <option value="{{$bc_val->id}}">{{$bc_val->name}}</option>
                        @endforeach
                     </select>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col">
                     <label class="form-label">Author <span class="error">*</span></label>
                     <input type="text" class="form-control" value="{{@Auth::user()->name}}"   name="author" placeholder="Enter Author " readonly required>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col">
                     <label class="form-label">Upload Image <span class="error">*</span></label>
                     <input type="file" class="form-control"  name="img" accept="image/x-png,image/jpeg" required>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col mb-0">
                     <label class="form-label">Description <span class="error">*</span></label>
                     <textarea class="form-control" name="description" style="height:100px" placeholder="Enter description..." required></textarea>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Submit Blog</button>
            </div>
         </form>
         @else
         <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>                                      
            <h5 class="modal-title">                                                 
               <a href="{{url('login-register')}}?type=student" style="color:#0051DE;text-decoration:underline">Write your own fable after login</a>
            </h5>
         </div>
         @endif
      </div>
   </div>
</div>
@endsection

<script>
    function slug_url_blog_model(get,id){
        var  data=$.trim(get);
        var string = data.replace(/[^A-Z0-9]/ig, '-')
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes;
        var finalvalue=string.toLowerCase();
        document.getElementById(id).value=finalvalue;
    }
</script>