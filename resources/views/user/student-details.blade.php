@extends('include.layout')


@section('content')

<style type="text/css">
label.col-lg-4 {
    font-weight: 600;
}
	.card-header {
		    background: #0051DE;
    color: #fff;
}
.cd-review-form:before{
    background:transparent;
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
         <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
            <span class="breadcrumb-overlay position-absolute"></span>
            <div class="container">
            <div class="row" >
               <div class="col-md-6 col-sm-6">
               <h2 style="color:#fff">Student Detail</h2>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
                        <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
                        <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>                     
                         
                       <li class="active"><a href="#" style="color:#fff">Student Detail</a></li>
                                                                                            </ul>
                </div>
            </div>
               
           </div>
        </section>
        
      <!-- End of breadcrumb section
         ============================================= -->

    <section id="course-details" class="course-details-section">
            <div class="container">
               <div class="course-details-content">
                  <div class="row">
                  @include('user.user_sidebar')
                   
                     <div class="col-lg-9">
                        <div class="aiz-user-panel">
                    
    <!-- Basic Info-->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Student Detail</h5>
        </div>
        <div class="card-body">
            <div class="row">
            <div class="col-lg-6">
                       <div class="yl-blog-sidebar">
                          <div class="yl-blog-widget-wrap">
                          <div class="yl-blog-details-comment-area yl-headline pera-content" style="    margin-top: 0;">
                          
                          <h3 class="c-overview-title mb-2">Personal Details</h3>
                              <hr>

                         
                           <div class="cd-review-form" style="padding-top: 0;">
                            
                                 <div class="cd-comment-input d-flex1 mt-2">
                                 <div class="cd-comment-input-field row">
                                        <label for="Name" class="col-lg-4">Profile Img <span class="red">*</span> &nbsp;</label>
                                    <div class="col-lg-7">
                                    @if(!empty($student->profileImage))
                           <div class="yl-blog-details-thumb">
                              <img src="{{ url('/storage/profile/').'/'.$student->profileImage}}" alt="{{$student->name}}" style="width:100px;height: 100px;">
                           </div>
                           @endif
                                    </div>
                                    </div>
                                    <br>
                                    <div class="cd-comment-input-field row">
                                        <label for="Name" class="col-lg-4">Name </label>
                                        <div class="col-lg-7">
                                       <p> {{$student->name}}</p>
                                        
                                  </div>
                                    </div>
                                    <div class="cd-comment-input-field row mt-3" >
                                    <label for="Name" class="col-lg-4">Email Address </label>
                                    <div class="col-lg-7">
                                       <p> {{$student->email}}</p>
                                        
                                  </div>
                                    </div>
                                    <div class="cd-comment-input-field row mt-3">
                                    <label for="Name" class="col-lg-4">Contact No. </label>
                                    <div class="col-lg-7">
                                       <p> +91-{{$student->mobile}}</p>
                                        
                                  </div>                                    </div>
                                    <div class="cd-comment-input-field row mt-3">
                                    <label for="Name" class="col-lg-4">Gender</label>
                                    <div class="col-lg-7">
                                       <p> @if($student->gender=='1')
                                           Male
                                           @elseif($student->gender=='2')
                                           Female
                                           @else
                                           Other
                                           @endif
                                       </p>
                                        
                                  </div>
                                    </div>

                                    <div class="cd-comment-input-field row mt-3">
                                    <label for="Name" class="col-lg-4">Date Of Birth </label>
                                    <div class="col-lg-7">
                                       <p> {{$student->dob}}</p>
                                        
                                  </div>
                                    </div>
                                    <div class="cd-comment-input-field row mt-3">
                                        <label for="Name" class="col-lg-4">Hobbies / Interest </label>
                                        <div class="col-lg-7">
                                       <p> {{$student->hobbies}}</p>
                                        
                                  </div>                                    </div>
                                  <div class="cd-comment-input-field row mt-3">
                                        <label for="Name" class="col-lg-4">About Your Self </label>
                                        <div class="col-lg-7">
                                       <p> {{$student->about_your_self}}</p>
                                        
                                  </div>                                    </div>
                                 </div>
                               
                                                         </div>
                          
                        </div>
                             
                          </div>
                         


                         
                             
                            
                           </div>
                        </div>
                        <div class="col-lg-6">
                       <div class="yl-blog-sidebar">
                          <div class="yl-blog-widget-wrap">
                          <div class="yl-blog-details-comment-area yl-headline pera-content" style="    margin-top: 0;">
                          
                           

                         
                           <div class="cd-review-form" style="padding-top: 0;">
                                                         <h3 class="c-overview-title mb-2">Address Details</h3>
                              <hr>
                            
                                 <div class="cd-comment-input d-flex1 mt-2">
                                    <div class="cd-comment-input-field row">
                                        <label for="Name" class="col-lg-4">House No./ Street Name/ Area</label>
                                        <div class="col-lg-7">
                                       <p> {{$student->house_no}}</p>
                                        
                                  </div>                                        </div>
                                    <div class="cd-comment-input-field row">
                                    <label for="Name" class="col-lg-4">Colony / Street / Locality </label>
                                    <div class="col-lg-7">
                                       <p> {{$student->colony}}</p>
                                        
                                  </div>                                              </div>
                                    <div class="cd-comment-input-field row">
                                    <label for="Name" class="col-lg-4">City</label>
                                    <div class="col-lg-7">
                                       <p> {{$student->city}}</p>
                                        
                                  </div>                                       </div>
                                    <div class="cd-comment-input-field row">
                                    <label for="Name" class="col-lg-4">State</label>
                                    <div class="col-lg-7">
                                       <p> {{$student->state}}</p>
                                        
                                  </div>                                       </div>

                                    <div class="cd-comment-input-field row">
                                    <label for="Name" class="col-lg-4">Country</label>
                                    <div class="col-lg-7">
                                       <p> India</p>
                                        
                                  </div>   
                                    </div>
                                    <div class="cd-comment-input-field row mt-3">
                                        <label for="Name" class="col-lg-4">Pincode</label>
                                        <div class="col-lg-7">
                                       <p> {{$student->zipCode}}</p>
                                        
                                  </div>                                       </div>
                                 </div>
                                
                               
                                                         </div>
                          
                        </div>
                             
                          </div>
                         


                         
                             
                            
                           </div>
                        </div></div>
    


            </div>
        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </section>





@endsection




