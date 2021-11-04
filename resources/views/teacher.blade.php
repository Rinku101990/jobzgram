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
  </style>
     
      <!-- Start of header section
         ============================================= -->

      <!-- Start of breadcrumb section
         ============================================= -->
         <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="padding: 0">
            
          <img src="{{ asset('assets/images/page/faqs.jpg') }}" title="Teacher " style="width: 100%">
        </section>
      <!-- End of breadcrumb section
         ============================================= -->

    
         <!-- Start of course details section
         ============================================= -->   
         <section id="course-details" class="course-details-section">
            <div class="container">
               <div class="course-details-content">
                  <div class="row">

                     <div class="col-lg-12">
                        <div class="course-details-tab-area">
                          
                           <div class="course-details-tab-wrapper">
                           	  <div class="row">
                  	 <div class="col-lg-7">
                  	 <br>
                  	 	  <center>
                  	 	  		<img src="{{ asset('assets/images/teacher-login.jpg') }}" alt="Kids Fabel" >
                  	 	  		</center>
                  	 	  	
                  	 </div>
                  	 	 <div class="col-lg-5">
                  	 	 	
                              <div class="course-details-tab-btn clearfix ul-li" style="margin-bottom: 0;">
                                 <ul id="tabs" class="nav text-uppercase nav-tabs">
                                    <li class="nav-item"><a href="#" data-target="#Login" data-toggle="tab" class="nav-link text-capitalize active">Login </a></li>
                                    <li class="nav-item"><a href="#" data-target="#Register" data-toggle="tab" class="nav-link text-capitalize">Register  </a></li>
                                   
                                 </ul>
                              </div>
                              <div class="course-details-tab-content-wrap" style=" padding-top: 30px;padding-bottom: 30px;   border: 1px solid #f2f2f4;">
                              	<div id="tabsContent" class="tab-content">
                                    <div id="Login" class="tab-pane fade  active show">
                         
                              <div class="yl-login-content pera-content text-left">
                                 <form action="#" method="post">
                                 	<label> Mobile Number / Email ID</label>
                                    <input type="text" placeholder="Mobile Number / Email ID">
                                    	<label>Password</label>
                                    <input type="password" placeholder="Password">
                                    <div class="yl-login-label clearfix">
                                       <span><input type="checkbox">Remember me</span>
                                       <a href="#"><u>Forget Password?</u></a>
                                    </div>
                                    <button type="submit">Login</button>
                                 </form>
                                
                              </div>
                         
                                      
                                       
                                    </div>
                                    <div id="Register" class="tab-pane fade">
                                         <div class="yl-login-content pera-content text-left">
                                 <form action="#" method="post">
                                 	<label> Full Name</label>
                                    <input type="text" placeholder="Full Name">
                                    <label> Mobile Number</label>
                                    <input type="text" placeholder="Mobile Number">
                                 	<label> Email ID</label>
                                    <input type="text" placeholder=" Email ID">
                                    	<label>Password</label>
                                    <input type="password" placeholder="Password">
                                    <div class="yl-login-label clearfix">
                                       <span style="    font-size: 14px;"><input type="checkbox" name="term">By signing up I agree to all terms and conditions.</span>
                                      
                                    </div>
                                    <button type="submit">Register</button>
                                 </form>
                                
                              </div>
                         
                                     
                                    </div>
                                   
                                   
                                    
                                 </div>
                              </div>
                           </div>
                            </div>
                           </div>
                        </div>
                     </div>
                    
                  </div>
               </div>
            </div>
         </section>
      <!-- End of course details section
         ============================================= -->  




@endsection




