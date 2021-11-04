@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Page</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Page</li>
            <li class="breadcrumb-item active">Page List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Page List
            <a href="{{url('admin/page/create')}}" class="btn btn-success btn-sm  btn-round float-right" ><i class="feather icon-plus"></i> Add Page</a>
        </h6>

      
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Banner</th>
                        <th>Title</th>
                       
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($page as $key=>$row)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td><img src="{{url('storage/page/'.$row->banner)}}" style="width:250px;"></td>
                        <td>{{$row->title}}</td>
                        
                        <td>  @if($row->status=='active')
                        <span class="badge badge-success">Active</span> 
                        @else
                        <span class="badge badge-danger">In-Active</span> 
                        @endif
                        </td>
                        <td>
                            <a href="{{url('admin/page/'.$row->id.'/edit')}}" class="btn btn-info btn-xs"><i class="feather icon-edit"></i> </a> 
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
            "Deleting Page",
            "Are you sure want to delete this page?",
            record_id,
            "{{url('admin/page')}}/"+record_id
            );
    });


</script>
@endsection