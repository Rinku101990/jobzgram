@extends('include.layout')
@section('content')
<style type="text/css">
  	.pera-content p {
    margin-bottom: 1rem;
}

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
            
            <img src="{{ asset('assets/images/page/parenting-forum.jpg')}}" title="Parenting forum " style="width: 100%">
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
                           <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="    max-width: 100%;">
                              <p class="title-watermark">Parenting Forum </p>
                              <span>About the Parenting Forum  </span>
                           </div>
                           <br>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p>There’s no denying of the role parents play in the lives of kids. The child’s early years are marked by a great deal of parental involvement. And that is why life coaching is important in the formative years. However, times are tough and parents have it hard too.</p>
                              <p>In the mad quest to provide a good life to the child, parents manage a lot of things together. And none of the things that worked for them before work anymore. That is why, we are here to provide you with the required unlearning and relearning that’s needed in these tough times. </p>
                              <p>A holistic development is not possible without life skills that increase your kids’ Emotional Quotient that enable them to deal with challenges of life and progress better. And that begins with your willingness to take a non-academic approach. </p>
                           </div>
                           <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width: 100%;"> 
                              <h4 class="wow fadeInRight animated animated" data-wow-delay="0.9s" >Life Coaching in COVID Times</h4>
                           </div>
                           <br>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p>The importance of Life Coaching is more apparent in the present context when kids are cooped up in homes and are bereft of real-world knowledge and experience. </p>
                              <p>With parents working from home while taking care of their kids and ensuring they keep up with their academics, life skills and the ability to deal with the changing world has taken a backseat. </p>
                              <p>It is here that Kids Fable plays a key role in enabling parents to ensure their kids are provided with life coaching which has become even more necessary in this changing environment. Kids Fable believes in bridging that gap where parents will be able to connect with the problems their kids are facing in such challenging times. </p>
                              <p>Our dynamic platform provides for an effective approach for parents to find strategies to instill life skills in kids. We understand how far kids have been impacted by prolonged lockdowns and closure of schools. Their lives already had intrusion of smartphones and TV. They are not able to spend more time with their parents because of the latter’s busy schedule. Parents are unable to give time to their kids even while role modeling. Understandably, providing life coaching to kids becomes next to impossible amidst such a tricky situation. </p>
                           </div>
                           <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style=" max-width: 100%;"> 
                              <h3 class="wow fadeInRight animated animated" data-wow-delay="0.9s" >Kids Fable helps you with strategies that you can implement while guiding you to bond better with your kids using simple yet effective techniques.</h3>
                           </div>
                           <br>
                           <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width: 100%;"> 
                              <h4 class="wow fadeInRight animated animated" data-wow-delay="0.9s" >There’s a Life beyond Academics</h4>
                           </div>
                           <br>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p>Our methodologies go beyond traditional academic achievements. Our team makes effective use of child psychology, cognitive development and other such tools that provide a more personalised solution to the kids’ problems.</p>
                              <p>These techniques have been tried and tested by experts from the mental health domain who can counsel you to effectively be with your kids while we collectively work on their life skills.</p>
                           </div>
                           <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style=" max-width: 100%;"> 
                              <h3 class="wow fadeInRight animated animated" data-wow-delay="0.9s" >Blogs</h3>
                           </div>
                           <br>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p>Kids Fable enables parents to share their experiences and personal tips on what worked on their favour that other parents can use. These tips and tricks from fellow parents help other parents know about the tools that they learn from our experts and use them in daily lives.</p>
                              <p>Our experts too will be sharing their ideas, strategies & experiences via our blogs that you can refer to. The goal is to keep everyone in the family involved in the kid’s creative progress. We encourage parents to work with the kids in ensuring their holistic development. Because parents know best.</p>
                              <p>Kids Fable is all about family approaches towards inculcating life skills in kids. That is why, everyone is involved, including you.</p>
                           </div>
                           <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width: 100%;"> 
                              <h4 class="wow fadeInRight animated animated" data-wow-delay="0.9s" >Do you have an experience to share?</h4>
                           </div>
                           <br>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p style="text-decoration:underline">Click Here to Submit your Blog</p>
                              <a href="{{ url('blog')}}" class="btn btn-primary" style="color:#fff"><span>Read Blogs</span></a>
                              <a href="{{ url('blog')}}" class="btn btn-primary" style="color:#fff"><span>Write Blogs</span></a>
                           </div>
                           <br>
                           <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style=" max-width: 100%;"> 
                              <h3 class="wow fadeInRight animated animated" data-wow-delay="0.9s" >Parenting Tips</h3>
                           </div>
                           <br>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p>Your experiences with kids will change from time to time. Growing kids need a lot of adjustments in parenting and this phase can be crucial. We, at Kids Fable, 
                                 encourage parents to share their tips and tricks that might have helped them in dealing with the tantrums & troubles of kids & inspire them to develop proper behaviour patterns through the 
                                 right influence.Our experts share parenting tips & tricks through their years of Life Coaching with parents and kids.</p>
                              <p>You too, as parents, can share your experiences with Life Coaching that Kids Fable will be providing you and your kids.</p>
                              <p>Parents can share their tips & experiences through Blogs, Videos or Testimonials.</p>
                           </div>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p style="text-decoration:underline">Click Here to Share Parenting Tips</p>
                              <a href="{{ url('parenting-tips')}}" class="btn btn-primary" style="color:#fff"><span>Ask Your Query</span></a>
                           </div>
                           <br>
                           <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style=" max-width: 100%;"> 
                              <h3 class="wow fadeInRight animated animated" data-wow-delay="0.9s" >Webinars</h3>
                           </div>
                           <br>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p>Kids Fable connects with you virtually as well. Kids Fable conducts webinars with experts from time to time that can provide the much-needed Digital Parenting techniques to you. We collaborate with renowned child psychologists, child development professionals & more such experts who guide you on the many facets of your kids’ development.</p>
                              <p>We conduct webinars with experts that address issues like Child Management during the Pandemic, dealing with toddler tantrums, finding ways to deal with the pressures kids are facing with online classes, emotional well-being as well as behavioural issues like bullying through Parenting Coaches who will give you tips on all of these & more.</p>
                           </div>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p style="text-decoration:underline">Register for our upcoming webinar</p>
                              <p>Kids Fable stays connected with parents through social media as well. Join our Live Stream where experts can connect and answer your questions in real time.</p>
                              <p>Stay connected with us to join our Live Stream <a href="{{ url('parenting-webinars')}}" style="text-decoration:underline;color:#0051DE;">Here</a></p>
                              <p>Our constant endeavour is to give your kids enough space and opportunity for growth and development that suits them. And we are committed to giving your kids exactly the same!</p>
                           </div>
                           <!-- <div class="yl-section-title  yl-headline yl-title-style-two position-relative" style="max-width: 100%;"> 
                              <h4 class="wow fadeInRight animated animated" data-wow-delay="0.9s" style="text-decoration:underline">Our Programs Our Counseling and Coaching Services </h4>
                           </div>
                           <br>
                           <div class="yl-feature-text yl-headline pera-content" align="justify">
                              <p style="text-decoration:underline">Intrigued? Book your session now.</p>
                           </div> -->
                        </div>
                     </div>
                  </div>  
               </div>
            </div>
         </div>
      </section>
      <!-- End of about us  section-->
@endsection




