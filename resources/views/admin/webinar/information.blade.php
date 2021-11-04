@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Parenting Webinar Query</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Parenting Webinar Query</li>
            <li class="breadcrumb-item active">Parenting Webinar Query List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Parenting Webinar Query List
        </h6>
           
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th
                        ><th>Email Address</th>
                        <th>Phone</th>
                        <th>Query Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($webinar as $key=>$row)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                       
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->phone}}</td>
                        <td>{{date('d M, Y h:i:s',strtotime($row->created_at))}}</td>
                        <td>
                            <a href="{{url('admin/parentingwebinar/'.$row->id)}}" class="btn btn-info btn-xs"><i class="feather icon-eye"></i> </a> 
                            <!-- <a href="javaScript:void(0)" class="btn btn-danger btn-xs delete" id="{{$row->id}}"><i class="feather icon-trash"></i> </a>  -->
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

