@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Users</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Users</li>
            <li class="breadcrumb-item active">User List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">User List</h6>
      
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                    <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email Id</th
                        ><th>Mobile No.</th>
                     
                        <th>Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $key=>$row)
                    @if($row->registerAs=='student')
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                     
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->mobile}}</td>
                        
                        <td>  @if($row->status=='active')
                        <span class="badge badge-success">Active</span> 
                        @else
                        <span class="badge badge-danger">Disabled</span> 
                        @endif
                        </td>
                        <td> @if(empty($row->created_at)) @else {{date('d M, Y h:i:s', strtotime($row->created_at))}} @endif</td>
                        <td>
                            <a href="{{url('admin/user/'.$row->id)}}" class="btn btn-primary btn-xs "><i class="feather icon-eye"></i> </a> 
                            <!-- <a href="javaScript:void(0)" class="btn btn-danger btn-xs delete" id="{{$row->id}}"><i class="feather icon-trash"></i> </a>  -->
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- [ content ] End -->
@endsection


@section('script')

<script>

 $(document).on("click", ".delete", function () {
    var record_id = this.id;
    deletePopupMessageAjax(
            "Deleting Blog",
            "Are you sure want to delete this Blog?",
            record_id,
            "{{url('admin/blog')}}/"+record_id
            );
    });


</script>
@endsection