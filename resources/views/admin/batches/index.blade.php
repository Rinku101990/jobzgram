@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Batches</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Batches</li>
            <li class="breadcrumb-item active">Batch List</li>
        </ol>
    </div>

       <div class="card">
            <h6 class="card-header bg-dark text-white">
                Batch List
                <a href="{{url('admin/batches/create')}}" class="btn btn-success btn-sm  btn-round float-right" ><i class="feather icon-plus"></i> Add Batch</a>
            </h6>
                
            <div class="card-datatable table-responsive">
            
                <table class="datatables-demo table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Session/Week</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Mentor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($batches as $key=>$row)
                        <tr class="odd gradeX">
                            <td>{{$key+1}}</td>
                            <td>{{$row->session}} Session</td>
                            <td>{{date('d M, Y',strtotime($row->start_date))}}</td>
                            <td>{{date('d M, Y',strtotime($row->end_date))}}</td>
                            @foreach($mentorList as $mntrList)
                                @if($row->mentor==$mntrList->id)
                                <td>{{$mntrList->prefixName.''.$mntrList->name}}</td>
                                @else
                                <td>Not Available</td>
                                @endif
                            @endforeach
                            <td>
                                <!-- <a href="{{url('admin/batches/'.$row->id.'/edit')}}" class="btn btn-info btn-xs"><i class="feather icon-edit"></i> </a>  -->
                                <a href="{{url('admin/batches/'.$row->id)}}" class="btn btn-info btn-xs"><i class="feather icon-video"></i> </a> 
                                <a href="javascript:void(0)" class="btn btn-info btn-xs"><i class="feather icon-edit"></i> </a> 
                                <a href="javaScript:void(0)" class="btn btn-danger btn-xs delete"><i class="feather icon-trash"></i> </a> 
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
            "Deleting Batch",
            "Are you sure want to delete this Batch?",
            record_id,
            "{{url('admin/batches')}}/"+record_id
            );
    });
</script>
@endsection