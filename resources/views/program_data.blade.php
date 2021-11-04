@extends('include.layout')
@section('content')
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="padding: 0">
   <img src="{{url('storage/program/'.$Program->banner)}}" title=" {!! $Program->title !!}" style="width: 100%">
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of about us  section
   ============================================= -->   
<section id="about-page-about" class="about-page-about-section">
   <div class="container">
      <div class="about-page-about-content">
         <div class="row">
            <div class="col-lg-12">
               <div class="about-page-about-text">
                  <div class="yl-course-more-btn text-center " style="margin: 0;width: 230px;">
                     <a href="{{ url('live-demo')}}?program={{$Program->title}}">Book For demo     <i class="fas fa-arrow-right"></i></a>
                  </div>
                  <br/>      <br/>
                  <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="    max-width: 100%;">
                     <p class="title-watermark">Program</p>
                     <span>{!! $Program->title !!} </span>
                  </div>
                  <br>
                  {!! $Program->description !!}
                  <!-- <br/>
                  <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="    max-width: 100%;">
                     <span>{{$Program->totalsession()}} SESSION </span>
                  </div> -->
                  <br/>
                  <div class="accordion" id="accordionExample">
                     @foreach($Program->getsession as $key=>$srow)
                     <div class="yl-cd-cur-accordion yl-headline pera-content ul-li">
                        <div class="yl-cd-cur-accordion-header" id="headingOne">
                           <button class="@if($key == 0)  @else collapsed @endif" data-toggle="collapse" data-target="#collapse{{$key}}" aria-controls="collapse{{$key}}">
                              <h3>{{$srow->title}}  </h3>
                           </button>
                        </div>
                        <div id="collapse{{$key}}" class="collapse @if($key == 0)show @endif" data-parent="#accordionExample">
                           <div class="yl-cd-cur-accordion-body">
                              <p>{{$srow->description}}
                              </p>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <br>
                  <div class="yl-course-more-btn text-center " style="margin: 0;width: 230px;">
                     <a href="{{ url('live-for-program') }}?amount={!! $Program->fees !!}&program={{$Program->title}}"> Enroll for program<i class="fas fa-arrow-right"></i></a>
                  </div>
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