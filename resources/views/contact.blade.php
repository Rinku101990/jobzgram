@extends('include.layout')


@section('content')



<!-- Start of breadcrumb section
   ============================================= -->
   <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="padding: 0">
            
            <img src="{{asset('assets/images/page/contact-us.jpg')}}" title="Contact Us" style="width: 100%">
          </section>
        <!-- End of breadcrumb section
           ============================================= -->
  
        <!-- Start of contact content section
           ============================================= -->       
           <section id="contact-content" class="contact-content-section">
              <div class="container">
                
                 <div class="yl-contact-content-wrap">
                    <div class="row justify-content-center">
                       <div class="col-lg-4 col-md-6">
                          <div class="yl-contact-content-inner text-center">
                             <div class="yl-contact-content-icon">
                                <img src="{{ asset('assets/img/cct-icon1.png') }}" alt="">
                             </div>
                             <div class="yl-contact-content-text yl-headline">
                                <h3>Address</h3>
                                <span>
                                  C-71 sector -19 Noida UP India 201301
                                </span>
                             </div>
                          </div>
                       </div>
                       <div class="col-lg-4 col-md-6">
                          <div class="yl-contact-content-inner text-center">
                             <div class="yl-contact-content-icon">
                                <img src="{{ asset('assets/img/cct-icon2.png') }}" alt="">
                             </div>
                             <div class="yl-contact-content-text yl-headline">
                                <h3>Email Us</h3>
                                 <span>info@kidsfabel.com</span>
                                <span>support@kidsfabel.com</span>
                             </div>
                          </div>
                       </div>
                       <div class="col-lg-4 col-md-6">
                          <div class="yl-contact-content-inner text-center">
                             <div class="yl-contact-content-icon">
                                <img src="{{ asset('assets/img/cct-icon3.png') }}" alt="">
                             </div>
                             <div class="yl-contact-content-text yl-headline">
                                <h3>Phone No</h3>
                                <span>+966 504 949140</span>
                                <span>+966 504 949140</span>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="yl-contact-form-wrap yl-headline">
                    <h3>Write us a message</h3>
                    <form class="yl-contact-form-area" action="{{url('send_contact')}}" method="post">
                       <div class="yl-contact-form-input d-flex">
                           {!! csrf_field() !!}
                           <input type="text" name="name" placeholder="Your Name*">
                           <input type="email"  name="email" placeholder="Your email*">
                           <input type="text" name="phone" placeholder="Phone">
                       </div>
                       <textarea name="message" placeholder="Write your message here*"></textarea>
                       <button type="submit">Submit Now <i class="fas fa-arrow-right"></i></button>
                    </form>
                 </div>
              </div>
           </section>
        <!-- End of contact content section
           ============================================= -->    



@endsection




