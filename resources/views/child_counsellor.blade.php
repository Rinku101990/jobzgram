@extends('include.layout')


@section('content')
<style type="text/css">
  	.yl-login-content input, .yl-sign-up-content input {
    width: 100%;
    height: 45px;
    border: none;
    padding-left: 20px;
    margin-bottom: 20px;
     border-radius: 0px; 
    background-color: #efeff0;
}
.yl-popular-course-img-text .popular-course-fee .course-fee-amount {
    margin-top: 11px;
    float: right;
}
.yl-popular-course-img-text .popular-course-fee strong {
    color: #000;
    font-size: 19px;
    font-weight: 700;
}
.yl-blog-widget-wrap .yl-category-widget li a {
    color: #000;
    font-weight: 400;
    padding-left: 15px;
    position: relative;
    transition: 0.4s all ease-in-out;
}
  </style>
           <style type="text/css">

ul.list-inline.checkbox-color.checkbox-color-circle.mb-0 li label {
    display: inline-block;
    margin-bottom: .5rem;
    width: 30px;
    border: 2px solid #eee;
}
ul.list-inline.checkbox-color.checkbox-color-circle.mb-0 li{
        display: inline-block;
    float: left;
    padding-right: 10px;
        width: 33%;
}
.checkbox label {
  
    padding-left: 5px;
}
.box-content.overflow-auto.size_list .checkbox {
    width: 32%;
    display: inline-block;
}
input[type=checkbox] {
    box-sizing: border-box;
    padding: 0;
    height: 25px;
    width: 25px;
    padding-right: 20px;
    vertical-align: middle;
   
}

.ca_search_filters input {
    padding-left: 2px;
    background: none;
    border: none;
    height: inherit;
    color: #666;
    font-size: 14px;
    width: 120px;
}
.ca_search_filters #slider-range {
    margin-bottom: 22px;
    background: #e5e5e5;
    border-radius: 0;
    border: none;
    height: 8px;
    margin-top: 12px;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-right, .ui-corner-br {
    border-bottom-right-radius: 5px;
}
.ui-corner-all, .ui-corner-bottom, .ui-corner-left, .ui-corner-bl {
    border-bottom-left-radius: 5px;
}
.ui-corner-all, .ui-corner-top, .ui-corner-right, .ui-corner-tr {
    border-top-right-radius: 5px;
}
.ui-corner-all, .ui-corner-top, .ui-corner-left, .ui-corner-tl {
    border-top-left-radius: 5px;
}
.ui-widget-content {
    border: 1px solid #a6c9e2;
    color: #222222;
}
.ui-widget {
    font-family: Lucida Grande,Lucida Sans,Arial,sans-serif;
    font-size: 1.1em;
}
.ui-slider-horizontal {
    height: .8em;
}
.ui-slider {
    position: relative;
    text-align: left;
}
.ui-slider-horizontal .ui-slider-range {
    background: #0051DE;
}
.ui-slider-horizontal .ui-slider-range {
    top: 0;
    height: 100%;
}
.ui-slider .ui-slider-range {
    position: absolute;
    z-index: 1;
    font-size: .7em;
    display: block;
    border: 0;
    background-position: 0 0;
}
.ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 1.2em;
    height: 1.2em;
    cursor: default;
    -ms-touch-action: none;
    touch-action: none;
}

.ui-slider-horizontal .ui-slider-handle {
    top: -.3em;
    margin-left: -.6em;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    border: 1px solid #c5dbec;
    /* background: #dfeffc url(images/ui-bg_glass_85_dfeffc_1x400.png) 50% 50% repeat-x; */
    font-weight: bold;
    color: #2e6e9e;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    border: 1px solid #0051DE;
    background: #0051DE;
    font-weight: bold;
    color: #0051DE;
    width: 16px;
    height: 16px;
    border-radius: 0;
    cursor: ew-resize;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
    border: 1px solid #0051DE;
    background: #0051DE;
    font-weight: bold;
    color: #0051DE;
    width: 16px;
    height: 16px;
    border-radius: 0;
    cursor: ew-resize;
}
.form-group.search-select select {
    display: block !important;
}
.search-select  .nice-select.form-control{
    display: none;
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
}</style>
      <!-- Start of header section
         ============================================= -->

      <!-- Start of breadcrumb section
         ============================================= -->
         <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
            <span class="breadcrumb-overlay position-absolute"></span>
            <div class="container">
            <div class="row" >
               <div class="col-md-6 col-sm-6">
               <h2 style="color:#fff">Child Counsellor</h2>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
                        <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
                        <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>
                       
                       
                       <li class="active"><a href="#" style="color:#fff">Child Counsellor</a></li>
                                                                                            </ul>
                </div>
            </div>
               
           </div>
        </section>
       
      <!-- End of breadcrumb section
         ============================================= -->

     <!-- Start of course details section
         ============================================= -->   
         <section id="course-details" class="course-details-section">
            <div class="container">
               <div class="course-details-content">
                  <div class="row">
                    <!-- <div class="col-lg-3">
                        <div class="yl-blog-sidebar"> -->

                          
                           <!-- <div class="yl-blog-widget-wrap">
                              <div class="yl-category-widget yl-headline ul-li-block position-relative">
                                 <h3 class="widget-title" style="    border-bottom: 1px solid #eee;margin-bottom: 20px;    font-weight: 400;"><i class="fa fa-folder-open"></i> CATEGORIES </h3>
                                
                                 <ul>
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Creative Design</a></li>
                                    <li><a href="#">Development</a></li>
                                    <li><a href="#"> Sports</a></li>
                                    <li><a href="#"> Musics</a></li>
                                    <li><a href="#"> Creative Skills</a></li>
                                    <li><a href="#"> Sales &amp; Marketing</a></li>
                                 </ul>
                              </div>
                           </div> -->
                  
<!-- 
                             <div class="yl-blog-widget-wrap">
                              <div class="yl-category-widget yl-headline ul-li-block position-relative">
                                 <h3 class="widget-title" style="    border-bottom: 1px solid #eee;margin-bottom: 20px;    font-weight: 400;"><i class="fa fa-tag"></i>  PRICE RANGES  </h3>
                                  <div class="box-content overflow-auto">
                                    <div class="categorie_filter">
                                   
                                    
                             <div class="categorie_filter">
                                    <div class="ca_search_filters">
                                       <label for="amount"> Range:</label>
                                       &nbsp; <span class="new_price">₹</span>
                                       <input type="text" name="text" id="amount" />  
                                        <div id="slider-range"></div>   
                                    </div>
                                </div>

                                </div>
                                 
                                    
                                        <!-- Filter by others -->
                                      
                                    <!--</div>
                                
                                
                              </div>
                           </div>
                           
                           
                        </div>
                     </div> -->
                      <div class="col-lg-12">
                        <div class="row">
                       
                           <div class="col-lg-12">
                          <form class="" id="search-form" action="" method="GET">
                                                         
                            <div class="sort-by-bar row no-gutters bg-white mb-3 px-3">
                                  

                                <div class="col-lg-5 col-md-5">
                                    <div class="sort-by-box">
                                        <div class="form-group">
                                           <!--  <label class="">Search</label> -->
                                            <div class="search-widget">
                                              <br>
                                            <div class="yl-blog-widget-wrap" style=" border:1px solid #ced4da;">
                              <div class="yl-search-widget position-relative">
                                
                                    <input type="text" placeholder="Search ...">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                 
                              </div>
                           </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5 offset-lg-1">
                                   
                                          <br>
                                            <div class="sort-by-box px-1">
                                                <div class="form-group search-select">
                                                   <!--  <label>Sort by</label> -->
                                                    <select class="form-control "  name="sort_by" onchange="filter()"  style="height:48px;display: block !important;    font-size: 15px;">
                                                      <option value="">Sort by</option>
                                                        <option value="3" selected="">Newest</option>
                                                        <option value="4">Oldest</option>
                                                        <option value="1">Price low to high</option>
                                                        <option value="2">Price high to low</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                  
                            </div>
                            
                        </form>
                      </div>
                      @foreach($counsellor as $clr_val)
                        <div class="col-lg-3 col-md-6">
                           <div class="yl-popular-course-img-text">
                              <div class="yl-popular-course-img text-center">
                              @if(Storage::disk('public')->exists('/profile/'.$clr_val->profileImage) && $clr_val->profileImage !='')
                                 <img src="{{ url('/storage/profile/').'/'.$clr_val->profileImage}}" alt="">
                                 @else
                                 <img src="{{ asset('assets/img/teacher/inst-7.jpg') }}" alt="">
                                 @endif
                              </div>
                              <div class="yl-popular-course-text">
                                 <div class="popular-course-fee clearfix">
                                    <span>Consultation Fee:  </span>
                                    <div class="course-fee-amount">
                                       <!-- <del>₹59</del> -->
                                       <strong>₹{{$clr_val->consultation_fee}}</strong>
                                    </div>
                                  
                                   
                                 </div>
                                 <div class="popular-course-title yl-headline">
                                    <h3><a href="#">{{$clr_val->name}}</a>
                                    </h3>
                                    <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Specialization</b> :  {{$clr_val->specialization}}</p>
                                    <p style="color: #111;font-size: 14px;margin-bottom: 0px;"><b>Qualification</b> :  {{$clr_val->qualification}}</p>
                                    <p style="color: #111;font-size: 14px;"><b>Experience</b> :  {{$clr_val->experience}}</p>
                                   
                                 </div>
                                 <div class="popular-course-rate clearfix ul-li">
                                    <div class="p-rate-vote float-left">
                                       <ul>
                                          <li><i class="fas fa-star"></i></li>
                                          <li><i class="fas fa-star"></i></li>
                                          <li><i class="fas fa-star"></i></li>
                                          <li><i class="fas fa-star"></i></li>
                                          <li><i class="fas fa-star"></i></li>
                                       </ul>
                                       <span>(0 Votes)</span>
                                    </div>
                                    <div class="p-course-btn float-right">
                                       <a href="{{url('counsellor-slot?counsellor='.$clr_val->id)}}"><i class="fas fa-chevron-right"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                       
                        
                        
                     </div>
                      </div>

                     
                    
                  </div>
               </div>
            </div>
         </section>
      <!-- End of course details section
         ============================================= -->  

@endsection




