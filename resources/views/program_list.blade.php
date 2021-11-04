@extends('include.layout')
@section('content')
<!-- Start of breadcrumb section
   ============================================= -->
<!-- <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="padding: 0">
   <img src="{{url('storage/category/'.$category->img)}}" title=" {!! $category->title !!}" style="width: 100%">
</section> -->
   
<section id="course-details" class="course-details-section" style="padding: 20px 0px;">
   <div class="container">
      <div class="course-details-content">
         <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sort-by-bar row no-gutters mt-3">

                            <div class="col-lg-6 col-md-6">
                                <div class="sort-by-box">
                                    <form id="search-form" action="{{url('program/'.$category->url_slug)}}" method="GET">
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
                                    <form id="search-form" action="{{url('program/'.$category->url_slug)}}" method="GET">
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

                    @forelse($Program as $crsValue)
                    <div class="col-lg-3 col-md-6">
                        <div class="yl-popular-course-img-text" style="padding: 16px !important;">
                        <div class="yl-popular-course-img text-center">
                            @if($crsValue->img !='')
                                <img src="{{ url('/storage/course/').'/'.$crsValue->img}}" alt="">
                            @else
                                <img src="{{ asset('assets/img/course/no_course_available.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="yl-popular-course-text">
                            <br>
                            <div class="popular-course-title yl-headline">
                                <h3><a href="#">{{$crsValue->title}}</a></h3>
                                <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Small description </b> :  {{ mb_strimwidth($crsValue->short_description, 0, 55, "...")}}</p>
                                <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Course Fee</b> :  ₹{{$crsValue->fees}}</p>
                                <p style="color: #111;font-size: 14px;"><b>Age Group </b> :  {{$crsValue->age_group}}</p>
                                <a href="{{url('program-detail/'.$crsValue->title_slug)}}" style="color:#007bff;">Read more..</a>
                            </div>
                            <div class="popular-course-rate clearfix ul-li">
                                @if($crsValue->status=='active')
                                    <div class="float-left">
                                        <a href="{{url('program-book-for-demo/'.$crsValue->title_slug)}}" class="btn btn-primary" style="color:#fff;background-color: #007bff;border-color: #007bff;padding: 7px;border-radius: 5px;"><span>Book For demo</span></a>
                                    </div>
                                    <div class="float-right">
                                        <a href="{{url('enroll-for-program/'.$crsValue->title_slug)}}" class="btn btn-primary" style="color:#fff;background-color: #007bff;border-color: #007bff;padding: 7px;border-radius: 5px;"><span>Enroll for program</span></a>
                                    </div>
                                @else
                                    <center><div class="btn btn-warning" style="color:#fff;padding: 7px;border-radius: 5px;">Coming Soon</div></center>
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-lg-3 col-md-6">
                        no record found!
                    </div>
                    @endforelse
                </div>
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
<!-- End of about us  section
   ============================================= -->
@endsection