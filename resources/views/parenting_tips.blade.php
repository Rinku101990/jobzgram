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
   a.yl-comment-reply-btn.text-center{
   top: 0;
   right: 0;
   color: #fff;
   height: 42px;
   width: 100px;
   font-weight: 700;
   position: absolute;
   line-height: 42px;
   border-radius: 30px;
   background-color: #ff5520;
   }
   .yl-comment-img.float-left img {
   width: 100px;
   height: 100px;
   overflow: hidden;
   margin-right: 20px;
   border-radius: 100%;
   }
   .yl-comment-text.position-relative h4 {
   color: #000;
   }
   .yl-comment-innerbox.yl-reply-comment.clearfix {
   margin-top: 20px;
   margin-left: 120px;
   margin-bottom: 20px;
   }
</style>
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
   <span class="breadcrumb-overlay position-absolute"></span>
   <div class="container">
      <div class="row" >
         <div class="col-md-6 col-sm-6">
            <h2 style="color:#fff">Parenting Tips</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="{{ url('parenting-forum')}}" style="color:#fff">Parenting Forum</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Parenting Tips</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of about us  section
   ============================================= -->   
<section id="yl-course" class="yl-course-section" style="background: #fff">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal" data-target="#modals-default" style="width:200px;background: #0051DE;    height: 40px;color: #fff">Ask your query</a>
                <br>&nbsp;               
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" >
               <div class="sort-by-bar row bg-white no-gutters">
                     <div class="col-lg-6 col-md-6">
                        <div class="sort-by-box">
                           <form class="" id="search-form" action="{{ url('parenting-tips')}}" method="GET" style="background: #f4f5f6;">
                              <div class="form-group">
                                    <div class="search-widget">
                                       <div class="yl-blog-widget-wrap" style=" border:1px solid #ced4da;margin-bottom: 25px;">
                                          <div class="yl-search-widget position-relative">
                                                <input type="text" name="search" placeholder="Search ..." value="{{@$_GET['search']}}" required>
                                                <button type="submit"><i class="fas fa-search"></i></button>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-lg-6 col-md-6">
                        <div class="sort-by-box px-1">
                           <form class="" id="search-form" action="{{ url('parenting-tips')}}" method="GET" style="background: #f4f5f6;">
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
        <hr>
        <div class="row  mt-2">
            <div class="col-md-12">
                <div class="yl-section-title text-left  yl-headline yl-title-style-two position-relative" style="max-width:100%">
                  <p class="title-watermark text-left">&nbsp;</p>
                  <span>Parenting Tips</span>
                  <br> &nbsp;
                </div>
                <br>
                <div class="yl-blog-details-comment-area yl-headline pera-content">
                <div class="yl-comment-discuss">
                  @forelse($Parentingquery as $vpq_value)
                     <div class="yl-comment-innerbox clearfix">
                           <div class="yl-comment-img float-left">
                              <img src="{{asset('assets/images/medium_thumbnail.png')}}" alt="">
                           </div>
                           <div class="yl-comment-text position-relative">
                              <h4>{{$vpq_value->getuser->name}}</h4>
                              <span>{{date('F d ,Y h:i:s',strtotime($vpq_value->created_at))}}</span>
                              <p style="margin-top: 10px;">{{$vpq_value->query}} </p>
                              @if(@Auth::user()->id!=$vpq_value->student)
                              <a class="yl-comment-reply-btn text-center reply" alt="{{$vpq_value->id}}" href="#" data-toggle="modal" data-target="#modals-reply">Reply</a>
                              @endif                                
                           </div>
                     </div>
                     @foreach($vpq_value->getChildQuery as $child)
                     <div class="yl-comment-innerbox yl-reply-comment clearfix">
                           <div class="yl-comment-img float-left">
                              <img src="{{asset('assets/images/medium_thumbnail.png')}}" alt="">
                           </div>
                           <div class="yl-comment-text position-relative">
                              <h4><a href="#">{{ $child->getuser->name}}</a></h4>
                              <span>{{date('F d ,Y h:i:s',strtotime($child->created_at))}}</span>
                              <p style="margin-top: 10px;">{{$child->query}}</p>
                           </div>
                     </div>
                     @endforeach
                    <br/>
                  @empty
                  No tips found!
                  @endforelse
                </div>
                </div>
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
               Ask Your Query
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
         </div>
         <form action="{{ url('parenting_tip_save')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="student" value="{{@Auth::user()->id}}"/>
            <div class="modal-body">
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
                  <div class="form-group col mb-0">
                     <label class="form-label">Query <span class="error">*</span></label>
                     <textarea class="form-control" name="desc" placeholder="Enter Query..." required></textarea>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Submit Query</button>
            </div>
         </form>
         @else
         <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>                                      
            <h5 class="modal-title">                                                 
               <a href="{{url('login-register')}}?type=student" style="color:#0051DE;text-decoration:underline"> Ask your query after login                                                  </a>
            </h5>
         </div>
         @endif
      </div>
   </div>
</div>
<div class="modal fade" id="modals-reply" style="display: none;" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         @if(!empty(@Auth::user()->id))
         <div class="modal-header">
            <h5 class="modal-title">                                                  
               Reply Query
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
         </div>
         <form action="{{ url('parenting_tip_reply')}}" method="post">
            {!! csrf_field() !!}
            <input type="hidden" name="user" value="{{@Auth::user()->id}}"/>
            <input type="hidden" name="query_id" id="query_id"/>
            <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col mb-0">
                     <label class="form-label">Reply <span class="error">*</span></label>
                     <textarea class="form-control" name="desc" placeholder="Enter Reply..." required></textarea>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Submit Reply</button>
            </div>
         </form>
         @else
         <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>                                      
            <h5 class="modal-title">                                                 
               <a href="{{url('login-register')}}" style="color:#0051DE;text-decoration:underline"> Ask your reply after please your login                                                  </a>
            </h5>
         </div>
         @endif
      </div>
   </div>
</div>
@endsection