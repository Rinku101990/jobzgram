@extends('include.layout')


@section('content')

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
    padding: 65px 0px 65px;
}

</style>

      <!-- Start of breadcrumb section
         ============================================= -->
         <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" >
            <span class="breadcrumb-overlay position-absolute" ></span>
            <div class="container">
               <div class="yl-breadcrumb-content text-center yl-headline"> 
                  <h2>Transactions</h2>
                  <div class="yl-breadcrumb-item ul-li">
                     <ul class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Transactions</li>
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
                 	<div class="col-lg-3">
                  		<div class="yl-instructor-img-text text-center position-relative" style="background: #fff">
                           <div class="yl-instructor-img position-relative">
                              <img src="{{ asset('assets/img/teacher/inst-7.jpg') }}" alt="">
                           </div>
                           <div class="yl-instructor-text yl-headline position-relative">
                              <h3><a href="#">Manish Kumar</a></h3>
                              <span class="yl-ins-degi">Web Developer</span>
                              
                           </div>
                        </div>
                        <br>
                        <div class="course-details-widget">
                          
                           <div class="course-widget-wrap">
                              <div class="cd-course-table-widget">
                                 <div class="cd-course-table-list">
                                    <div class="course-table-item  clearfix">
                                    	<a href="{{ url('account') }}">
                                       <span class="cd-table-title"><i class="fas fa-home"></i> Dashboard </span>
                                       
                                   </a>
                                    </div>
                                     <div class="course-table-item clearfix">
                                    	<a href="{{ url('my-profile') }}">
                                       <span class="cd-table-title"><i class="fas fa-user"></i> My Profile </span>
                                       
                                   </a>
                                    </div>
                                     <div class="course-table-item clearfix">
                                    	<a href="{{ url('my-courses') }}">
                                       <span class="cd-table-title"><i class="fas fa-file-alt"></i> My Courses </span>
                                       
                                   </a>
                                    </div>
                                     <div class="course-table-item active clearfix">
                                      <a href="{{ url('transactions') }}">
                                       <span class="cd-table-title"><i class="fas fa-money-bill-alt"></i> Transactions </span>
                                       
                                   </a>
                                    </div>
                                      <div class="course-table-item  clearfix">
                                    	<a href="{{ url('change-password') }}">
                                       <span class="cd-table-title"><i class="fas fa-key"></i> Change Password </span>
                                       
                                   </a>
                                    </div>
                                     <div class="course-table-item clearfix">
                                    	<a href="#">
                                       <span class="cd-table-title"><i class="fas fa-lock"></i> Logout </span>
                                       
                                   </a>
                                    </div>
                                  
                                    
                                 </div>
                                
                              </div>
                           </div>
                           
                        </div>
                     </div>


                   
                     <div class="col-lg-9">
                        <div class="aiz-user-panel">
                    
    <!-- Basic Info-->
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0 h6">Transactions</h5>
        </div>
        <div class="card-body">
                               <div class="order-list-tabel-main table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="w-10p">S.No.</th>
                                        <th class="wd-15p">Order No.</th>  
                                          <th class="wd-15p">Mode Of Payment </th>
                                            <th class="wd-15p">Transaction No</th>
                                     <!--    <th class="wd-15p">Status</th> -->
                                         <th class="wd-15p">Transaction Date</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                                                      
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">1.</td>
                                        <td>#21033670</td>
                                                                               
                                        <td><span class="btn btn-primary">
                                         Online Payment</span> </td>
                                          <td>23FGGFG673</td>

                                     
                                        <td>31 MAy, 2021 01:01:30 </td>
                                       
                                       
                                    </tr>
                                                                 
                                </tbody>
                            </table>
                        </div>
    </div>


            </div>
        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </section>





@endsection




