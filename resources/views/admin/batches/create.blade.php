@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Batches</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Batches</li>
                <li class="breadcrumb-item active">Add Batches</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Add Batches</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/batches') }}" method="post" >
                    {!! csrf_field() !!}
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Start Date <span class="error">*</span></label>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">End Date <span class="error">*</span></label>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">No. of sessions/Week <span class="error">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Title" name="session" required>
                            <div class="clearfix"></div>
                            @error('session')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row after-add-more">
                        <div class="form-group col-md-5">
                            <label class="form-label">Days of week <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Week Day like:Monday" name="week_day[]" required>
                            <div class="clearfix"></div>
                            @error('week_day')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label class="form-label">Time <span class="error">*</span></label>
                            <input type="text" placeholder="Ex:12:00PM" class="form-control" name="week_time[]" required>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group change">
                                <label for="">&nbsp;</label><br/>
                                <a class="btn btn-success add-more" style="color:#fff">+ Add More</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row demo-vertical-spacing">
                        <div class="col-md-6 select2-warning">
                            <label class="form-label">Students <span class="error">*</span></label>
                            <select class="select2-demo form-control" name="students[]" multiple style="width: 100%" required>
                                @foreach($student as $stdlist)
                                    <option value="{{$stdlist->child_name}}">{{$stdlist->child_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Mentor <span class="error">*</span></label>
                            <select class="form-control" name="mentor">
                                @foreach($mentor as $mntlist)
                                <option value="{{$mntlist->id}}">{{$mntlist->prefixName.''.$mntlist->name}}</option>
                                @endforeach
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create Batch</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection