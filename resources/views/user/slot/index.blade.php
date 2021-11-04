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
               <h2 style="color:#fff">Slot List</h2>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
                        <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
                        <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>                     
                         
                       <li class="active"><a href="#" style="color:#fff">Slot List</a></li>
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
            <h5 class="mb-0 h6">Slot List</h5>
            <span class="pull-right" style="background: #ffa300;float: right;  margin-top: -25px;  padding: 2px 10px;  border-radius: 7px;"><a href="{{url('slot/create')}}">Create Slot</a></slot> 
        </div>
        <div class="card-body">
                               <div class="order-list-tabel-main table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="w-10p">S.No.</th>
                                        <th class="w-15p">Slot Date</th>
                                        <th class="wd-15p">Start Time</th>  
                                          <th class="wd-15p">End Time</th>
                                            <th class="wd-15p">Status</th>
                                            <th class="wd-15p">Action</th>
                                     
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                      @foreach($slot as $key=>$val)                                
                                     <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}</td>
                                       
                                        <td>{{date('d M, Y',strtotime($val->slot_date))}}</td>
                                        <td>{{date('g:i A',strtotime($val->start_time))}}</td>
                        <td>{{date('g:i A',strtotime($val->end_time))}}</td>
                                                                               
                                        <td>@if($val->status=='active')
                                        <span class="badge badge-success">Active</span>
                                        @elseif($val->status=='inactive')
                                        <span class="badge badge-warning">Inactive</span>
                                        @else
                                        <span class="badge badge-danger">Not Available</span>
                                        @endif
                                        </td>
                                         
                                          <td><a href="{{url('slot/'.$val->id.'/edit')}}" class="btn btn-primary btn-xs "><i class="fas fa-edit" style="color:#fff;font-size:13px"></i> </a>
                                          <!-- <a href="javaScript:void(0)" class="btn btn-danger btn-xs delete" id="{{$val->id}}"><i class="fas fa-trash"></i> </a>  -->
 </td>

                                     
                                      @endforeach
                                       
                                       
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




