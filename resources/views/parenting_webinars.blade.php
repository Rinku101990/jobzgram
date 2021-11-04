@extends('include.layout')
@section('content')
<style type="text/css">
   .card-header {
   background: #0051DE;
   color: #fff;
   }
   .webinarfav {
   border: 1px solid #fff;
   top: 3px;
   left: 17px;
   position: absolute;
   border-radius: 4px;
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
            <h2 style="color:#fff">Webinars & Workshops</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="{{ url('parenting-forum')}}" style="color:#fff">Parenting Forum</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Webinars & Workshops</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of about us  section
   ============================================= -->   
<section id="yl-course" class="yl-course-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
            <a href="#" class="btn btn-info" href="javascript:void(0);" data-toggle="modal" data-target="#modalsContactUs" style="background: #0051DE;height: 40px;color: #fff">Conduct Webinars Through Us </a>
            <br/>&nbsp;
         </div>
         <div class="col-lg-12" >
            
            <div class="sort-by-bar row no-gutters mt-3">
               <div class="col-lg-6 col-md-6">
                  <div class="sort-by-box">
                     <form id="search-form" action="{{url('parenting-webinars')}}" method="GET">
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
                     <form id="search-form" action="{{url('parenting-webinars')}}" method="GET">
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
      
      <div class="row justify-left-center mt-5">
         <div class="col-lg-12">
            <div class="yl-section-title text-left  yl-headline yl-title-style-two position-relative" style="max-width:100%">
               <p class="title-watermark text-left">&nbsp;</p>
               <span>Webinars & Workshops</span>
               <br> &nbsp;
            </div>
            <br>
            <h3 class="mb-2" style="color: #111">Upcoming Webinar</h3>
            <br/>
         </div>
         @forelse($upcoming as $up_value)
         <div class="col-lg-4 col-md-6">
            <div class="yl-blog-img-text-2 yl-headline pera-content">
               <div class="yl-blog-img-2 position-relative">
                  <div class="yl-blog-img-warap-2 position-relative">
                     <a href="{{url('parenting-webinars/'.$up_value->title_slug)}}">
                     <img src="{{url('storage/webinar/'. $up_value->img)}}" alt="{{ $up_value->title}}">
                     </a>
                  </div>
               </div>
               <div class="yl-blog-text-2">
                  <div class="yl-blog-meta-2 text-uppercase">
                     <a href="{{url('parenting-webinars/'.$up_value->title_slug)}}" ><i class="fa fa-clock"></i> Event Date {{ date(' d, M Y',strtotime($up_value->expire_date))}}</a>
                  </div>
                  <div class="yl-blog-meta-2">
                     <i class="fa fa-user"></i> 
                     @foreach($speaker as $speak)
                        @if($speak->id==$up_value->speaker)
                           {{ $speak->name.', '.$speak->designation }}
                        @endif
                     @endforeach
                  </div>
                  <div class="yl-blog-meta-2" style="font-weight:600">
                     Fee:
                     @if($up_value->amount!=0)
                        {{ '₹'.$up_value->amount}}
                     @else
                        Free
                     @endif
                  </div>
                  <div class="yl-blog-title-text-2">
                     <h3><a href="{{url('parenting-webinars/'.$up_value->title_slug)}}">{{ $up_value->title}}.</a>
                     </h3>
                     <p>{{ mb_strimwidth($up_value->description, 0, 55, "...")}}
                     </p>
                     <a class="yl-blog-more text-uppercase" style="color: #0000fe;" href="{{url('parenting-webinars/'.$up_value->title_slug)}}">Register for webinar </a>
                  </div>
                  @if(empty(Auth::user()->id))
                  <a href="{{url('login-register')}}" class="webinarfav" alt="Favourite Webinar" title="Favourite Webinar" style="color:#fff"><i class="fas fa-bookmark" ></i></a>
                  @else
                  <a href="javascript:void(0)">
                     @if(@$up_value->getfav->user!=Auth::user()->id)
                     <form action="{{url('fav-webinar')}}" method="post" style="display: inline-block;"> 
                        {!! csrf_field() !!}
                        <input type="hidden" name="webinar" value="{{$up_value->id}}" />
                        <input type="hidden" name="user" value="{{@Auth::user()->id}}" />
                        <button type="submit"   class="webinarfav" style="color:#fff;font-weight: 700;background:none"><i class="fas fa-bookmark" ></i></button> 
                     </form>
                     @else
                     <form action="{{url('fav-webinar-delete')}}" method="post" style="display: inline-block;"> 
                        {!! csrf_field() !!}
                        <input type="hidden" name="webinar" value="{{$up_value->id}}" />
                        <input type="hidden" name="fav_webinar" value="{{$up_value->getfav->id}}" />
                        <button type="submit"   class="webinarfav" style="color:#0000fe;font-weight: 700; border-color:#0000fe;background:none"><i class="fas fa-bookmark" ></i> </button> 
                     </form>
                     @endif
                     @endif
                     <div class="social-btn-sp">
                        {!! $shareButtons !!}
                     </div>
               </div>
               
            </div>
         </div>
         @empty
         <div class="col-lg-4 col-md-6">
            No record found!.
         </div>
         @endforelse
      </div>
      <div class="row  mt-5">
         <div class="col-lg-12">
            <h3 class="mb-2" style="color: #111">Past Webinar</h3>
            <br/>
         </div>
      </div>
      <div class="row justify-content-left">
         @forelse($past_Webniar as $up_value1)
         <div class="col-lg-4 col-md-6">
            <div class="yl-blog-img-text-2 yl-headline pera-content">
               <div class="yl-blog-img-2 position-relative">
                  <div class="yl-blog-img-warap-2 position-relative">
                     <a href="{{url('parenting-webinars/'.$up_value1->title_slug)}}">
                        <img src="{{url('storage/webinar/'. $up_value1->img)}}" alt="{{ $up_value1->title}}" style="height:215px; width:100%;     object-fit: cover;">
                     </a>
                  </div>
               </div>
               <div class="yl-blog-text-2">
                  <div class="yl-blog-meta-2 text-uppercase">
                     <a href="{{url('parenting-webinars/'.$up_value1->title_slug)}}" ><i class="fa fa-clock"></i> Event Date {{ date(' d, M Y',strtotime($up_value1->expire_date))}}</a>
                  </div>
                  <div class="yl-blog-meta-2">
                     <i class="fa fa-user"></i> 
                     @foreach($speaker as $speak)
                        @if($speak->id==$up_value1->speaker)
                           {{ $speak->name.', '.$speak->designation }}
                        @endif
                     @endforeach
                  </div>
                  <div class="yl-blog-meta-2" style="font-weight:600">
                     Fee:
                     @if($up_value1->amount!=0)
                        {{ '₹'.$up_value1->amount}}
                     @else
                        Free
                     @endif
                  </div>
                  <div class="yl-blog-title-text-2">
                     <h3><a href="{{url('parenting-webinars/'.$up_value1->title_slug)}}">{{ $up_value1->title}}.</a>
                     </h3>
                     <p>{{ mb_strimwidth($up_value1->description, 0, 55, "...")}}
                     </p>
                     <a class="yl-blog-more text-uppercase" href="{{url('parenting-webinars/'.$up_value1->title_slug)}}">view recording </a>
                  </div>
                  @if(empty(Auth::user()->id))
                  <a href="{{url('login-register')}}" class="webinarfav" alt="Favourite Webinar" title="Favourite Webinar" style="color:#fff"><i class="fas fa-bookmark" ></i></a>
                  @else
                  <a href="javascript:void(0)">
                  @if(@$up_value1->getfav->user!=Auth::user()->id)
                  <form action="{{url('fav-webinar')}}" method="post" style="display: inline-block;"> 
                     {!! csrf_field() !!}
                     <input type="hidden" name="webinar" value="{{$up_value1->id}}" />
                     <input type="hidden" name="user" value="{{@Auth::user()->id}}" />
                     <button type="submit"   class="webinarfav" style="color:#fff;font-weight: 700;background:none"><i class="fas fa-bookmark" ></i></button> 
                  </form>
                  @else
                  <form action="{{url('fav-webinar-delete')}}" method="post" style="display: inline-block;"> 
                     {!! csrf_field() !!}
                     <input type="hidden" name="webinar" value="{{$up_value1->id}}" />
                     <input type="hidden" name="fav_webinar" value="{{$up_value1->getfav->id}}" />
                     <button type="submit"   class="webinarfav" style="color:#0000fe;font-weight: 700; border-color:#0000fe;background:none"><i class="fas fa-bookmark" ></i> </button> 
                  </form>
                  @endif
                  @endif
                  <div class="social-btn-sp">
                     {!! $shareButtons !!}
                  </div>
               </div>
               
            </div>
         </div>
         @empty
         <div class="col-lg-4 col-md-6">
            No record found!.
         </div>
         @endforelse
      </div>

   </div>
</section>
<!-- End of Course section
   ============================================= --> 
<div class="modal fade" id="modals-default" style="display: none;" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">                                                  
               Conduct Webinar Through Us 
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
         </div>
         <form action="{{ url('webinar_save')}}" method="post" >
            {!! csrf_field() !!}                                           
            <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col">
                     <label class="form-label">Title <span class="error">*</span></label>
                     <input type="text" class="form-control"  name="title" placeholder="Enter Title" required>
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
                     <label class="form-label">Date <span class="error">*</span></label>
                     <input type="date" class="form-control"  name="date" placeholder="Enter Date " required>
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
               <button type="submit" class="btn btn-primary">Submit Webinar</button>
            </div>
         </form>
      </div>
   </div>
</div>

<div class="modal fade" id="modalsContactUs" style="display: none;" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Conduct webinar through us </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
         </div>
         <form action="{{ url('webinar_save')}}" method="post">
            {!! csrf_field() !!}                                           
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-row">
                        <div class="form-group col">
                           <label class="form-label">Name <span class="error">*</span></label>
                           <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-row">
                        <div class="form-group col">
                           <label class="form-label">Email Address <span class="error">*</span></label>
                           <input type="email" class="form-control"  name="email" placeholder="Enter Email Address" required>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-6">
                     <div class="form-row">
                        <div class="form-group col">
                           <label class="form-label">Phone number <span class="error">*</span></label>
                           <input type="number" class="form-control" name="phone" placeholder="Enter Phone number" required>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-row">
                        <div class="form-group col">
                           <label class="form-label">Your organization name <span class="error">*</span></label>
                           <input type="text" class="form-control" name="organization" placeholder="Enter organization name" required>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
               </div>
               
               <div class="form-row">
                  <div class="form-group col mb-0">
                     <label class="form-label">Query <span class="error">*</span></label>
                     <textarea class="form-control" name="description" style="height:100px" placeholder="Enter Query..." required></textarea>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Submit Webinar</button>
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
