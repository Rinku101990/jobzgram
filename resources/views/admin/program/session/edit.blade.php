@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Edit Program Session</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Program Session</li>
                <li class="breadcrumb-item active">Edit Program Session</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Update Program</h6>
            <div class="card-body">

                {{ Form::open(array('url' => route('session.update',$session->id),'enctype'=>'multipart/form-data','method'=>'put')) }}
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $session->title }}">
                            <div class="clearfix"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                     
                        <div class="form-group col-md-6">
                            <label class="form-label">Progrma <span class="error">*</span></label>
                            <select class="form-control"  name="program">
                                <option value="">Select Program</option>
                                @foreach($program as $p_val)
                                <option value="{{$p_val->id}}" @if($session->program==$p_val->id) {{__('selected')}} @endif>{{$p_val->title}}</option>
                                @endforeach
                           </select>
                            <div class="clearfix"></div>
                            @error('program')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                     
                        
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Description <span class="error">*</span></label>
                            
                            <textarea id="bs-markdown" class="form-control mt-4" name="description" rows="10">{{ $session->description}}</textarea>
                            <div class="clearfix"></div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      
                    </div>

                    <div class="form-row">
                       
                       <div class="form-group col-md-6">
                           <label class="form-label">Document Upload<span class="error"></span></label>
                           <input type="file" class="form-control" placeholder="Document Upload" name="document" accept=".doc, .docx, .pdf">
                           <div class="clearfix"></div>
                           @php if(Storage::disk('public')->exists('/program/'.$session->document) && $session->document !=''){  @endphp
                                <div class="col-md-6" > 
                                <div class="form-group">
                                    <div class="form-line" style="border-bottom: 0px; margin-top:10px">
                                    <a href="<?=url('/storage/program/').'/'.$session->document ?>" target="_blank"style="color:#2d3ad6">Click Download Training Material</a>
                                    </div>
                                </div>
                                </div>
                            @php } @endphp  
                           @error('document')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                               </span>
                           @enderror
                       </div>
                     
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active" @if($session->status == 'active'){{"selected"}} @endif>Active</option>
                                <option value="inactive"@if($session->status == 'inactive'){{"selected"}}@endif>Inactive</option>
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