@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Booking Appointment </h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Booking Appointment </li>
            <li class="breadcrumb-item active">Booking Appointment  List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Booking Appointment List
        </h6>

      
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Customer</th>
                      
                        <th>Child Counsellor</th>
                        <th>Week</th>
                        <th>Time</th>
                        <th>Transaction</th>
                         <th>Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointment as $key=>$row)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td>{{$row->getuser->name}}</td>
                        <td>{{$row->getcounsellor->name}}</td>
                        <td>{{$row->getslot->getweek->title}}</td>
                        <td>{{date('h:i A',strtotime($row->getslot->start_time))}} - {{date('h:i A',strtotime($row->getslot->end_time))}}</td>
                        <td>₹{{$row->transaction}}</td>
                        
                        <td>  @if($row->payment_status=='paid')
                        <span class="badge badge-success">Paid</span> 
                  
                        @else
                        <span class="badge badge-danger">Unpaid</span> 
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


