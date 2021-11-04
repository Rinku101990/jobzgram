@extends('include.layout')
@section('content')



<!-- Start of breadcrumb section
   ============================================= -->       
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

</style>
<!-- Start of breadcrumb section
   ============================================= -->

   <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="padding: 0">
            
            <img src="assets/images/page/our-program2.jfif" title="Who We Are" style="width: 100%">
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