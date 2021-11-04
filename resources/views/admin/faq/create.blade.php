@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Faq</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Faqs</li>
                <li class="breadcrumb-item active">Add Faq</li>
            </ol>
        </div>
        

        

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Faq</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/faq') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Question <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Question" name="question">
                            <div class="clearfix"></div>
                            @error('question')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-12">
                            <label class="form-label">Answer <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Answer" name="answer">
                            <div class="clearfix"></div>
                            @error('answer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                       
                        
                    </div>
                   
                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label class="form-label">Status <span class="error">*</span></label>
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection