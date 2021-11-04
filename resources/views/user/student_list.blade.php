@extends('include.layout')


@section('content')

<style type="text/css">
   .fc-content {
    background: #00296f;
    color: #fff;
    overflow: hidden;
    /* text-overflow: ellipsis; */
    white-space: break-spaces !important;
    /* border: 1px solid #fff; */
    padding: 2px;
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
   input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 0px 12px;
    cursor: pointer;
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
         <section id="yl-breadcrumb" class="yl-breadcrumb-section position-relative" style="">
            <span class="breadcrumb-overlay position-absolute"></span>
            <div class="container">
            <div class="row" >
               <div class="col-md-6 col-sm-6">
               <h2 style="color:#fff">Students</h2>
                </div>
                <div class="col-md-6 col-sm-6 hidden">
                    <ul class="breadcrumb pull-right" style="background:transparent;    float: right;margin-bottom: 0px;">
                        <li><a href="{{ url('/') }}" style="color:#fff">Home</a></li>
                        <li style="color:#fff;font-size:12px;"> <i class="fas fa-angle-double-right" style="vertical-align: -webkit-baseline-middle;   padding: 0 5px;"></i> </li>                     
                         
                       <li class="active"><a href="#" style="color:#fff">Students</a></li>
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
            <h5 class="mb-0 h6">Student List</h5>
        </div>
        <div class="card-body">
                               <div class="order-list-tabel-main table-responsive">
                            <table id="example" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="example_info">
                                <thead>
                                    <tr role="row">
                                        <th class="w-10p">S.No.</th>
                                        <th class="wd-15p">Student Name</th>  
                                        <th class="wd-15p">Batch</th>
                                        <th class="wd-15p">Document</th>  
                                     
                                        <th class="wd-15p">Teacher's Observation</th>
                                         <th class="wd-15p">Created Date</th>
                                       
                                         <th class="wd-15p">View Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                          @foreach($student as $key=>$st_value)  
                                          @if(@$_GET['batch']==@$st_value->getprogram->getbatch->id)     
                                                           
                                     <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}.</td>
                                        <td><a href="<?=url('student-details').'/'.$st_value->getstudent->id ?>" style="color:#2d3ad6">{{@$st_value->getstudent->name}}</a></td>

                                        <td>{{@$st_value->getprogram->getbatch->name}}</td>
                                                                               
                                      <td>  @if(Storage::disk('public')->exists('/program/'.$st_value->document) && $st_value->document !='')
                            
                            <center> <a href="<?=url('/storage/program/').'/'.$st_value->document ?>" target="_blank" style="color:#2d3ad6"> <i class="fa fa-download"></i> </a></center>
                         
                    @endif</td>
                    <td>
                                  @if(Storage::disk('public')->exists('/program/'.@$st_value->teacher_observation) && @$st_value->teacher_observation !='')
                            
                           <center> <a href="<?=url('/storage/program/').'/'.@$st_value->teacher_observation ?>" target="_blank" style="color:#2d3ad6"> <i class="fa fa-download"></i> </a></center>
                        
                   @endif
                                     <form action="{{url('teacher-observation')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="program" value="{{$st_value->id}}"/>

                                        <label class="custom-file-upload yl-course-more-btn text-center" >
    <input type="file" name="teacher_observation" accept=".doc, .docx, .pdf" onchange="this.form.submit()"/>
    <i class="fa fa-cloud-upload"></i> Upload Sheet
</label>

                                      
</form>


                                       </td>

                                     
                                        <td>{{date('d M, Y',strtotime(@$st_value->updated_at	))}} </td>
                                       <td><center> <a href="<?=url('student-details').'/'.$st_value->getstudent->id ?>" style="color:#2d3ad6"> <i class="fa fa-eye"></i> </a></center></td>
                                       
                                    </tr> 
                                    @endif
                                    @if(!isset($_GET['batch']))     

                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$key+1}}.</td>
                                        <td><a href="<?=url('student-details').'/'.$st_value->getstudent->id ?>" style="color:#2d3ad6">{{@$st_value->getstudent->name}}</a></td>

                                        <td>{{@$st_value->getprogram->getbatch->name}}</td>
                                                                               
                                      <td>  @if(Storage::disk('public')->exists('/program/'.$st_value->document) && $st_value->document !='')
                            
                            <center> <a href="<?=url('/storage/program/').'/'.$st_value->document ?>" target="_blank" style="color:#2d3ad6"> <i class="fa fa-download"></i> </a></center>
                         
                    @endif</td>
                    <td>
                                  @if(Storage::disk('public')->exists('/program/'.@$st_value->teacher_observation) && @$st_value->teacher_observation !='')
                            
                           <center> <a href="<?=url('/storage/program/').'/'.@$st_value->teacher_observation ?>" target="_blank" style="color:#2d3ad6"> <i class="fa fa-download"></i> </a></center>
                        
                   @endif
                                     <form action="{{url('teacher-observation')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="program" value="{{$st_value->id}}"/>

                                        <label class="custom-file-upload yl-course-more-btn text-center" >
    <input type="file" name="teacher_observation" accept=".doc, .docx, .pdf" onchange="this.form.submit()"/>
    <i class="fa fa-cloud-upload"></i> Upload Sheet
</label>

                                      
</form>


                                       </td>
                                
                                     
                                        <td>{{date('d M, Y',strtotime(@$st_value->updated_at	))}} </td>
                                       <td><center> <a href="<?=url('student-details').'/'.$st_value->getstudent->id ?>" style="color:#2d3ad6"> <i class="fa fa-eye"></i> </a></center></td>
                                       
                                    </tr> 
                                    @endif
                                   
                                    @endforeach
                                                                 
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




