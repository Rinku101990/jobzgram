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
               <h2 style="color:#fff">Batch Detail</h2>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
                        <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
                        <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>                     
                         
                       <li class="active"><a href="#" style="color:#fff">Batch Detail</a></li>
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
            <h5 class="mb-0 h6">Batch Detail</h5>
        </div>
        <div class="card-body">
        <div class="yl-blog-details-content">
                        <div class="yl-blog-details-wrap">
                            @if(!empty($batch->img))
                           <div class="yl-blog-details-thumb">
                              <img src="{{ url('/storage/batch/').'/'.$batch->img}}" alt="{{$batch->name}}">
                           </div>
                           @endif
                           <div class="yl-blog-details-text yl-headline">
                               <br>
                               <h3 style="    color: #000;">{{$batch->name}}</h3>
                              <div class="yl-blog-meta-2 text-uppercase">                               
                                 <a href="javascript:void(0)">Date : {{date('d F Y',strtotime($batch->date))}}</a>
                                 <a href="javascript:void(0)">Time : {{$batch->duration}}</a>
                                 @if(!empty($batch->document))
                                <a href="{{ url('/storage/batch/').'/'.$batch->document}}" target="_blank">Download Document</a>
                                @endif
                              </div>
                              @if(!empty($batch->video))
                              <br/>
                              <video controls >
                                <source src="{{ url('/storage/batch/').'/'.$batch->video}}" type="video/mp4">
                                <source src="{{ url('/storage/batch/').'/'.$batch->video}}" type="video/ogg">                                
                                </video>
                                @endif
                                <br>
                               

                           
                              
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





@endsection




