@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Courses</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Courses</li>
            <li class="breadcrumb-item active">Course List</li>
        </ol>
    </div>

       <div class="card">
            <h6 class="card-header bg-dark text-white">
            Course List
                <a href="{{url('admin/course/create')}}" class="btn btn-success btn-sm  btn-round float-right" ><i class="feather icon-plus"></i> Add Course</a>
            </h6>
                
            <div class="card-datatable table-responsive">
            
                <table class="datatables-demo table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>Sr. No.</th>
                            <th>Img</th>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Duration</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($course as $key=>$row)
                        <tr class="odd gradeX">
                            <td>{{$key+1}}</td>
                            <td><img src="{{url('storage/course/'.$row->img)}}" style="width:80px;"></td>
                            <td>{{$row->title}}</td>
                            <td>&#8377; {{$row->amount}}</td>
                            <td>{{$row->duration}} {{$row->type}}</td>
                            <td>  @if($row->status=='active')
                            <span class="badge badge-success">Active</span> 
                            @else
                            <span class="badge badge-danger">In-Active</span> 
                            @endif
                            </td>
                            <td>
                                <a href="{{url('admin/course/'.$row->id.'/edit')}}" class="btn btn-info btn-xs"><i class="feather icon-edit"></i> </a> 
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
            "Deleting Course",
            "Are you sure want to delete this Course?",
            record_id,
            "{{url('admin/course')}}/"+record_id
            );
    });


</script>
@endsection