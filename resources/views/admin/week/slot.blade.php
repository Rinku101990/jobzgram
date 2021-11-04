@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Slots</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Slots</li>
            <li class="breadcrumb-item active">Slot List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Slot List
        </h6>

      
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                      
                        <th>Child Counsellor</th>
                        <th>Slot Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>                       
                        <th>Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($slot as $key=>$row)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td>{{$row->getchildcounsellors->name}}</td>
                        <td>{{date('d M, Y',strtotime($row->slot_date))}}</td>
                        <td>{{date('g:i A',strtotime($row->start_time))}}</td>
                        <td>{{date('g:i A',strtotime($row->end_time))}}</td>
                        
                        <td>  @if($row->status=='active')
                        <span class="badge badge-success">Active</span> 
                        @elseif($row->status=='inactive')
                        <span class="badge badge-warning">In-Active</span> 
                        @else
                        <span class="badge badge-danger">Not Available</span> 
                        @endif
                        </td>
                       
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- [ content ] End -->
@endsection


