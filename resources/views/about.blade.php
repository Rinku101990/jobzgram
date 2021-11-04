@extends('include.layout')
@section('content')
<!-- Start of breadcrumb section
   ============================================= -->
<section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="padding: 0">
   <img src="{{url('storage/page/'.$page->banner)}}" title=" {!! $page->title !!}" style="width: 100%">
</section>
<!-- End of breadcrumb section
   ============================================= -->
<!-- Start of about us  section
   ============================================= -->   
<section id="about-page-about" class="about-page-about-section">
   <div class="container">
      {!! $page->description !!}
   </div>
</section>
<!-- End of about us  section
   ============================================= -->
@endsection