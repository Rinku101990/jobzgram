@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Edit Batch</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Batches</li>
                <li class="breadcrumb-item active">Edit Batch</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update Batch</h6>
            <div class="card-body">

                {{ Form::open(array('url' => route('batch.update',$batch->id),'enctype'=>'multipart/form-data','method'=>'put')) }}
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Name <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ $batch->name }}">
                            <div class="clearfix"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Teacher <span class="error">*</span></label>
                            <select class="form-control" name="teacher">
                                <option value="">Select</option>
                                @foreach($teacher as $tval)
                                <option value="{{$tid=$tval->id}}" @if($batch->teacher_id==$tid) selected @endif>{{$tval->name}}</option>
                                @endforeach
                            </select>
                            <div class="clearfix"></div>
                            @error('teacher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Start Date <span class="error">*</span></label>
                            <input type="date" class="form-control" id="b-m-dtp-date" placeholder="Enter Start Date" name="start_date" value="{{$batch->start_date}}">
                            <div class="clearfix"></div>
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="form-label">End Date <span class="error">*</span></label>
                            <input type="date" class="form-control" id="b-m-dtp-date" placeholder="Enter End Date" name="end_date" value="{{$batch->end_date}}">
                            <div class="clearfix"></div>
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">My Schedule <span class="error">*</span></label>
                            <input type="text" class="form-control" id="b-m-dtp-date" placeholder="Enter Mon & Wed" name="schedule" value="{{$batch->schedule}}">
                            <div class="clearfix"></div>
                            @error('schedule')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Batch Time <span class="error">*</span></label>
                            <input type="time" class="form-control" id="b-m-dtp-date" placeholder="Enter Time (08:00 AM)" name="time" value="{{$batch->duration}}">
                            <div class="clearfix"></div>
                            @error('time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Upload Image </label>
                            <input type="file" class="form-control" placeholder="Upload Image " name="img" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @php if(Storage::disk('public')->exists('/batch/'.$batch->img) && $batch->img !=''){  @endphp                                
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px">
                                    <img height="84"  width="165" src="<=url('/storage/batch/').'/'.$batch->img ?>">
                                    </div>
                                </div>                              
                            @php } @endphp  
                            @error('img')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Upload Video</label>
                            <input type="file" class="form-control"  name="video" accept="video/*">
                            <div class="clearfix"></div>
                            @php if(Storage::disk('public')->exists('/batch/'.$batch->video) && $batch->video !=''){  @endphp                                
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px">
                                    <iframe height="84"  width="165" src="<=url('/storage/batch/').'/'.$batch->video ?>"></iframe>
                                   
                                    </div>
                                </div>                              
                            @php } @endphp  
                            @error('video')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Upload Document</label>
                            <input type="file" class="form-control"  name="document" accept=".doc, .docx, .pdf">
                            <div class="clearfix"></div>
                             @php if(Storage::disk('public')->exists('/batch/'.$batch->document) && $batch->document !=''){  @endphp                                
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px">
                                    <iframe type="application/pdf, application/doc, application/docx" height="84"  width="165" src="<?=url('/storage/batch/').'/'.$batch->document ?>"></iframe>
                                   
                                    </div>
                                </div>                              
                            @php } @endphp   
                            @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->
                    <div class="form-row">
                    <!-- <div class="form-group col-md-6">
                            <label class="form-label">Batch Link</label>
                            <input type="text" class="form-control" placeholder="Enter Batch Link" value="{{$batch->batch_link}}" name="batch_link">
                            <div class="clearfix"></div>
                            @error('batch_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active" @if($batch->status == 'active'){{"selected"}} @endif>Active</option>
                                <option value="inactive"@if($batch->status == 'inactive'){{"selected"}}@endif>Inactive</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection