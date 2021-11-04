@extends('include.layout')
@section('content')



<!-- Start of breadcrumb section
   ============================================= -->
   <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="padding: 0">
            
            <img src="{{asset('assets/images/page/faqs.jpg')}}" title="FAQs" style="width: 100%">
          </section>
<!-- End of breadcrumb section
   ============================================= -->
<section id="yl-course" class="yl-course-section" style="background: #fff">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="yl-section-title text-left  yl-headline yl-title-style-two position-relative" style="max-width:100%">
               <p class="title-watermark text-left">FAQs</p>
               <span>Frequently Asked Questions</span>
               <br> &nbsp;
            </div>
            <br>

            <div class="accordion" id="accordionExample">

               @forelse($faq as $key=>$row)
               <div class="yl-cd-cur-accordion yl-headline pera-content ul-li">
                  <div class="yl-cd-cur-accordion-header" id="headingOne">
                     <button class="@if($key == 0)  @else collapsed @endif" data-toggle="collapse" data-target="#collapse{{$key}}" aria-controls="collapse{{$key}}">
                        <h3>{{$row->question}}  </h3>
                     </button>
                  </div>
                  <div id="collapse{{$key}}" class="collapse @if($key == 0)show @endif" data-parent="#accordionExample">
                     <div class="yl-cd-cur-accordion-body">
                        <p>{{$row->answer}}  
                        </p>
                     </div>
                  </div>
               </div>
               @empty
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title text-success text-center">No Data Found</h5>
                  </div>
               </div>

               @endforelse
              
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End of Course section
   ============================================= --> 
@endsection