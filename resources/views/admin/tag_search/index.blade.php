@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Search Tag</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Search Tag</li>
            <li class="breadcrumb-item active">Search Tag List</li>
        </ol>
    </div>

       <div class="card">
        <h6 class="card-header bg-dark text-white">Search Tag List
        <a href="{{url('admin/search_tag/create')}}" class="btn btn-success btn-sm  btn-round float-right" ><i class="feather icon-plus"></i> Add Search Tag</a>
        </h6>
             
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($searchTag as $key=>$row)
                    <tr class="odd gradeX">
                        <td>{{$key+1}}</td>
                        <td>{{$row->title}}</td>
                        @foreach($tagCategory as $tagCatList)
                            @if($tagCatList->id==$row->tag_cate_id)
                                <td>{{$tagCatList->title}}</td>
                            @endif
                        @endforeach
                        <td>  @if($row->status=='active')
                        <span class="badge badge-success">Active</span> 
                        @else
                        <span class="badge badge-danger">In-Active</span> 
                        @endif
                        </td>
                        <td>
                            <a href="{{url('admin/search_tag/'.$row->id.'/edit')}}" class="btn btn-info btn-xs"><i class="feather icon-edit"></i> </a> 
                        </td>
                    </tr>
                    @empty
                    <tr class="odd gradeX"><td colspan="4"><center>No search tag found!<center></td></tr>
                    @endforelse
                    
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
            "Deleting Program",
            "Are you sure want to delete this program?",
            record_id,
            "{{url('admin/program')}}/"+record_id
            );
    });


</script>
@endsection