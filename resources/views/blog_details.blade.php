@extends('include.layout')
@section('content')
<style type="text/css">
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
            <h2 style="color:#fff">Blog Detail</h2>
         </div>
         <div class="col-md-6 col-sm-6 hidden">
            <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
               <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="{{ url('blog')}}" style="color:#fff">Blog</a></li>
               <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
               <li class="active"><a href="#" style="color:#fff">Blog Detail</a></li>
            </ul>
         </div>
      </div>
   </div>
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of blog details content section
   ============================================= -->
<section id="yl-blog-details" class="yl-blog-details-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-9">
            <div class="yl-blog-details-content">
               <div class="yl-blog-details-wrap">
                  <div class="yl-blog-details-thumb" align="center">
                     <img src="{{ url('/storage/blog/').'/'.$blog->img}}" alt="{{$blog->title}}">
                  </div>
                  <div class="yl-blog-details-text yl-headline">
                     <h3 style="color:000">{{$blog->title}}</h3>
                     <div class="yl-blog-meta-2 text-uppercase">
                        <a href="javascript:void(0)"><i class="fa fa-user"></i> {{$blog->author}}</a>
                        <a href="javascript:void(0)"><i class="fa fa-clock"></i> {{ date('F d, Y',strtotime($blog->updated_at))}}</a>
                        <a href="javascript:void(0)"><i class="fa fa-eye"></i> {{$blogviewcount}}</a>
                        <a href="javascript:void(0)"><i class="fa fa-comment"></i> {{$blog->getblogcomment()}}</a>
                        @if($blog->user!=@Auth::user()->id)
                        @if(empty(Auth::user()->id))
                              <a href="{{url('login-register')}}"><i class="fas fa-thumbs-up" ></i> {{$blogLikeCount}}</a>
                              <a href="{{url('login-register')}}" alt="Favourite Blog" title="Favourite Blog" style="color:#0000fe"><i class="fas fa-bookmark" ></i> Favourite</a>
                              <a href="{{url('login-register')}}">Follow Me</a>
                           @else
                              <a href="javascript:void(0)">
                                 @if(empty($blike))
                                 <form action="{{url('blike-save')}}" method="post" style="display: inline-block;"> 
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}" />
                                    <input type="hidden" name="user_id" value="{{@Auth::user()->id}}" />
                                    <button type="submit" class="like" style="color:#0000fe;font-weight: 700;border:none;background:none"><i class="far fa-thumbs-up"></i> {{$blogLikeCount}}</button> 
                                 </form>
                                 @else
                                 <form action="{{url('blike-delete')}}" method="post" style="display: inline-block;"> 
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}" />
                                    <input type="hidden" name="blike_id" value="{{$blike->id}}" />
                                    <button type="submit" class="like" style="color:#0000fe;font-weight: 700;border:none;background:none"><i class="fas fa-thumbs-up"></i> {{$blogLikeCount}}</button> 
                                 </form>
                                 @endif
                              </a>
                              <a href="javascript:void(0)">
                                 @if(empty($favblog))
                                 <form action="{{url('favourite-save')}}" method="post" style="display: inline-block;"> 
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="blog" value="{{$blog->id}}" />
                                    <input type="hidden" name="user" value="{{@Auth::user()->id}}" />
                                    <button type="submit"   class="fav" style="color:#0000fe;font-weight: 700;border:none;background:none"><i class="far fa-bookmark" ></i> Favourite</button> 
                                 </form>
                                 @else
                                 <form action="{{url('favourite-delete')}}" method="post" style="display: inline-block;"> 
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="blog" value="{{$blog->id}}" />
                                    <input type="hidden" name="fav_blog" value="{{$favblog->id}}" />
                                    <button type="submit"   class="fav" style="color:#0000fe;font-weight: 700;border:none;background:none"><i class="fas fa-bookmark" ></i> Favourite</button> 
                                 </form>
                                 @endif
                              </a>
                              <a href="javascript:void(0)">
                                 @if(empty($follow))
                                 <form action="{{url('follow-save')}}" method="post" style="display: inline-block;"> 
                                    {!! csrf_field() !!}                           
                                    <input type="hidden" name="following_user" value="{{$blog->user}}" />
                                    <input type="hidden" name="blog" value="{{$blog->id}}" />
                                    <input type="hidden" name="user" value="{{@Auth::user()->id}}" />
                                    <button type="submit"   class="fav" style="color:#0000fe;font-weight: 700;border:none;background:none"> Follow Me</button> 
                                 </form>
                                 @else
                                 <form action="{{url('follow-delete')}}" method="post" style="display: inline-block;"> 
                                    {!! csrf_field() !!}                           
                                    <input type="hidden" name="following_id" value="{{$follow->id}}" />
                                    <input type="hidden" name="blog" value="{{$blog->id}}" />
                                    <button type="submit"   class="fav" style="color:#0000fe;font-weight: 700;border:none;background:none"> Unfollow Me</button> 
                                 </form>
                                 @endif
                              </a>
                           @endif
                        @endif
                     </div>
                     <article>
                        {{$blog->description}} 
                     </article>
                     <div class="social-btn-sp">
                        {!! $shareButtons !!}
                     </div>
                  </div>
               </div>
            </div>
            <div class="yl-blog-details-comment-area yl-headline pera-content">
               <h3> {{$blog->getblogcomment()}} Comments</h3>
               <div class="yl-comment-discuss">
                  @foreach($blogcomment as $blc)
                  <div class="yl-comment-innerbox clearfix">
                     <div class="yl-comment-img float-left">
                        <img src="{{asset('assets/images/medium_thumbnail.png')}}" alt="">
                     </div>
                     <div class="yl-comment-text position-relative">
                        <h4><a href="#">{{ $blc->getuser->name}}</a></h4>
                        <span>{{ date('F d, Y h:i A',strtotime($blc->updated_at))}}</span>
                        <p>{{$blc->comment}}</p>
                     </div>
                  </div>
                  @endforeach
               </div>
               @if(!empty(Auth::user()->id))
               <div class="cd-review-form">
                  <h3 class="c-overview-title">Add a Comment</h3>
                  <form action="{{url('blog_comment')}}" method="post">
                     @csrf
                     <input type="hidden" name="user" value="{{Auth::user()->id}}" />
                     <input type="hidden" name="blog" value="{{$blog->id}}" />
                     <div class="cd-comment-input d-flex">
                        <div class="cd-comment-input-field">
                           <input type="text" name="name" placeholder="Your name *" value="{{Auth::user()->name}}" disabled>
                        </div>
                        <div class="cd-comment-input-field">
                           <input type="email" name="email" placeholder="Your Email *" value="{{Auth::user()->email}}" disabled>
                        </div>
                        <div class="cd-comment-input-field">
                           <input type="text" name="phone" placeholder="Your Phone *" value="{{Auth::user()->mobile}}" disabled>
                        </div>
                     </div>
                     <textarea  name="comment" placeholder="Your Review..." required></textarea>
                     <button type="submit">Submit <i class="fas fa-arrow-right"></i></button>
                  </form>
               </div>
               @endif
            </div>
         </div>
         <div class="col-lg-3">
            <div class="yl-blog-sidebar">
               <div class="yl-blog-widget-wrap">
                  <div class="yl-search-widget position-relative">
                     <form action="#" method="post">
                        <input type="text" placeholder="Search">
                        <button type="submit"><i class="fas fa-search"></i></button>
                     </form>
                  </div>
               </div>
               <!-- <div class="yl-blog-widget-wrap">
                  <div class="yl-category-widget yl-headline ul-li-block position-relative">
                     <h3 class="widget-title">Category</h3>
                     <ul>
                        @foreach($blogcategory as $bc_val)
                        <li><a href="#">{{$bc_val->name}}</a></li>
                        @endforeach
                       
                     </ul>
                  </div>
                  </div> -->
               <div class="yl-blog-widget-wrap">
                  <div class="yl-recent-blog-widget clearfix">
                     <h3 class="widget-title">Recent Posts</h3>
                     @foreach($multiblog as $mltb)
                     @if($mltb->id!=$blog->id)
                     <div class="yl-recent-blog-img-text">
                        <div class="yl-recent-blog-img float-left">
                           <a href="{{url('blog/'.$mltb->id)}}">
                           <img src="{{ url('/storage/blog/').'/'.$mltb->img}}" alt="{{$mltb->title}}" style="width:65px;height:65px;object-fit:contain">
                           </a>
                        </div>
                        <div class="yl-recent-blog-text">
                           <span>{{ date('M d, Y',strtotime($mltb->updated_at))}}</span>
                           <h3><a href="{{url('blog/'.$mltb->id)}}">{{$mltb->title}}
                              </a>
                           </h3>
                        </div>
                     </div>
                     @endif
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End of blog details content section
   ============================================= -->   
@endsection