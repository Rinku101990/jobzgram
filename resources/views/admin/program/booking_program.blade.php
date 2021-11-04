@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Booking Program</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Booking Program</li>
            <li class="breadcrumb-item active">Booking Program List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Booking Program List
        </h6>
             
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                <tr role="row" style="text-align: center;">
                                    <th class="w-10p">S.No.</th>
                                    <th class="w-10p">Program Name</th>
                                    <th class="wd-15p">My Batch</th>
                                    <th class="wd-15p">My Schedule</th>
                                    <th class="wd-15p">Start Date</th>
                                    <th class="wd-15p">End date</th>
                                    <th class="wd-15p">Student</th>
                                    <th class="wd-15p">Teacher</th>
                                    <th class="wd-15p">Documents</th>
                                    <th class="wd-15p">Teacher's Observation</th>
                                    <th  class="wd-15p">Whatsapp Group link</th>
                                    <th  class="wd-15p">Fabilian Family Link</th>
                                    <th class="wd-15p">Total Sessions</th>
                                    <th class="wd-15p">Rate per session</th>
                                   
                                    

                                  
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($program as $key=>$pval)
                                  <tr>
                                  <td>{{$key+1}}.</td>
                                  <td>{{@$pval->program_type}}</td>
                                  <td>{{@$pval->getprogram->getbatch->name}}</td>
                                  <td>{{@$pval->getprogram->getbatch->schedule}} – {{date('h:i A',strtotime(@$pval->getprogram->getbatch->duration))}}</td>
                                  <td>{{date('d M, Y',strtotime(@$pval->getprogram->getbatch->start_date))}}</td>
                                  <td>{{date('d M, Y',strtotime(@$pval->getprogram->getbatch->end_date))}}</td>
                                  <td>{{@$pval->getstudent->name}}</td>
                                  <td>{{@$pval->getprogram->getbatch->getteacher->name}}</td>
                                  <td>    @if(Storage::disk('public')->exists('/program/'.$pval->document) && $pval->document !='')
                            
                            <center> <a href="<?=url('/storage/program/').'/'.$pval->document ?>" target="_blank" style="color:#2d3ad6"> <i class="fa fa-download"></i> </a></center>
                         
                    @endif
                                     </td>
                                  <td>   @if(Storage::disk('public')->exists('/program/'.@$pval->getprogram->teacher_observation) && @$pval->getprogram->teacher_observation !='')
                            
                            <center> <a href="<?=url('/storage/program/').'/'.@$pval->getprogram->teacher_observation ?>" target="_blank" style="color:#2d3ad6"> <i class="fa fa-download"></i> </a></center>
                         
                    @endif </td>
                                  <td></td>
                                  <td></td>
                                  <td>{{@$pval->getprogram->totalsession()}}</td>
                                  <td>{{@$pval->getprogram->rate_per_session}}</td>
                                  
                                     @endforeach
                                
                              </tbody>
                           </table>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- [ content ] End -->
@endsection

