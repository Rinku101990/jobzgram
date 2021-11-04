@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Batch Information</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Batches</li>
                <li class="breadcrumb-item active">Batch Information</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Batch Information</h6>
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-2">
                            <div class="w-100">
                                <div class="row mb-2">
                                    <div class="col-4"><b>Start Date</b></div>
                                    <div class="col-8">{{date('d M, Y',strtotime($batch->start_date))}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4"><b>End Date</b></div>
                                    <div class="col-8">{{date('d M, Y',strtotime($batch->end_date))}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4"><b>No. of sessions per week</b></div>
                                    <div class="col-8">{{$batch->session}} Session</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-12"><b>Days of week</b></div>
                                    
                                    <div class="col-8">
                                        <div class="table-responsive mt-4">
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Day</th>
                                                        <th>Time</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($weekDays as $wkDy)
                                                    <tr>
                                                        <td>{{'Time on '.$wkDy->days}}</td>
                                                        <td>{{$wkDy->time}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4"><b>Students</b></div>
                                    <div class="col-8">{{$batch->students}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4"><b>Mentor</b></div>
                                    <div class="col-8">{{$mentor->prefixName.''.$mentor->name}}</div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-4"><b>Meeting Link</b></div>
                                    <div class="col-8">N/A</div>
                                </div>
                            </div>
                            <div class="demo-inline-spacing mt-3">
                            <button type="button" class="btn btn-round btn-info"><i class="feather icon-video"></i> Create Meeting Link</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection