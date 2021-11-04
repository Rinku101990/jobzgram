@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Assign Students</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Assign Students</li>
            <li class="breadcrumb-item active">Assign Student List</li>
        </ol>
    </div>

       <div class="card">
            <h6 class="card-header bg-dark text-white">
            Assign Student List
                <a href="{{url('admin/assign/create')}}" class="btn btn-success btn-sm  btn-round float-right" ><i class="feather icon-plus"></i> Add Assign Student</a>
            </h6>
                
            <div class="card-datatable table-responsive">
            
                <table class="datatables-demo table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>Sr. No.</th>
                            <th>Batch</th>
                            <th>Teacher</th>
                            <th>Student</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assign as $key=>$row)
                        <tr class="odd gradeX">
                            <td>{{$key+1}}</td>                          
                            <td>{{$row->getbatch->name}}</td>
                            <td>{{$row->getteacher->name}}</td>
                            <td>{{$row->getstudent->name}}</td>
                            <td>  @if($row->status=='active')
                            <span class="badge badge-success">Active</span> 
                            @else
                            <span class="badge badge-danger">In-Active</span> 
                            @endif
                            </td>
                            <td>
                                <a href="{{url('admin/assign/'.$row->id.'/edit')}}" class="btn btn-info btn-xs"><i class="feather icon-edit"></i> </a> 
                                <a href="javaScript:void(0)" class="btn btn-danger btn-xs delete" id="{{$row->id}}"><i class="feather icon-trash"></i> </a> 
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


@section('script')

<script>

 $(document).on("click", ".delete", function () {
    var record_id = this.id;
    deletePopupMessageAjax(
            "Deleting Assign Student",
            "Are you sure want to delete this Assign Student?",
            record_id,
            "{{url('admin/assign')}}/"+record_id
            );
    });


</script>
@endsection