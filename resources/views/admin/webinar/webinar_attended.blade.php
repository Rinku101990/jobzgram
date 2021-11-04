@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Parenting Webinar Attended By User</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Parenting Webinar Attended By User</li>
            <li class="breadcrumb-item active">Parenting Webinar Attended By User List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Parenting Webinar Attended By User List
        </h6>
           
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>Sr. No.</th>
                       
                        <th>Webinar Name</th
                        ><th>Webinar Date</th>
                        <th>Name</th>
                      
                        <th>Email Id</th>
                        <th>Contact No.</th>
                        <th>Payment</th>
                      
                         <th>Speaker</th>
                         <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($webinarattend as $key=>$row)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                       
                        <td>{{@$row->getwebinar->title}}</td>
                        <td>{{date('d, M Y',strtotime(@$row->getwebinar->expire_date))}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{$row->payment}}</td>
                        <td>{{$row->speaker}}</td>
                        <td>{{$row->description}}</td>
                        
                       
                       
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- [ content ] End -->
@endsection

