@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Speakers</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Speakers</li>
            <li class="breadcrumb-item active">Speakers List</li>
        </ol>
    </div>

       <div class="card">
            <h6 class="card-header bg-dark text-white">
            Speakers List
                <a href="{{url('admin/speaker/create')}}" class="btn btn-success btn-sm  btn-round float-right" ><i class="feather icon-plus"></i> Add Speaker</a>
            </h6>
                
            <div class="card-datatable table-responsive">
            
                <table class="datatables-demo table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th>Sr. No.</th>
                            <th>Img</th>
                            <th>Name</th>
                            <th>Email Id</th>
                            <th>Contact No.</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($speaker as $key=>$row)
                        <tr class="odd gradeX">
                            <td>{{$key+1}}</td>
                            <td><img src="{{url('storage/speaker/'.$row->img)}}" style="width:80px;height:60px"></td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->designation}}</td>
                            <td>  @if($row->status=='active')
                            <span class="badge badge-success">Active</span> 
                            @else
                            <span class="badge badge-danger">In-Active</span> 
                            @endif
                            </td>
                            <td>
                                <a href="{{url('admin/speaker/'.$row->id.'/edit')}}" class="btn btn-info btn-xs"><i class="feather icon-edit"></i> </a> 
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
            "Deleting Speaker",
            "Are you sure want to delete this Speaker ?",
            record_id,
            "{{url('admin/speaker')}}/"+record_id
            );
    });


</script>
@endsection