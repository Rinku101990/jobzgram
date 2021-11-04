@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Assign Student</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Assign Students</li>
                <li class="breadcrumb-item active">Add Assign Student</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Add Assign Student</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/assign') }}" method="post" >
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Batch <span class="error">*</span></label>
                            <select class="form-control batch" name="batch">
                            <option value="">Select</option>
                            @foreach($batch as $bval)
                            <option value="{{$bval->id}}">{{$bval->name}}</option>
                            @endforeach
                            </select>
                            <div class="clearfix"></div>
                            @error('batch')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                        <label class="form-label">Teacher <span class="error">*</span></label>
                            <select class="form-control teacher" name="teacher">
                            <option value="">Select</option>                           
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
                            <label class="form-label">Student <span class="error">*</span></label>
                            <select class="form-control " name="student">
                            <option value="">Select</option>
                            @foreach($student as $sval)
                            <option value="{{$sval->id}}">{{$sval->name}}</option>
                            @endforeach
                            </select>
                            <div class="clearfix"></div>
                            @error('student')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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




@section('script')

<script>

$(document).ready(function(){
    $(".batch").change(function()
	{
        var BID = $(this).val();          	
        //alert(url);
		$.ajax(
		{
			type: "GET",
            url: "{{url('admin/assign/teacher')}}/"+BID,

			beforeSend: function ()
			{ 
				//console.log(BID+url);
			},
			
			success: function(data)
			{
				
                $('.teacher').find('option').remove();
				//var option = $('<option>').attr('value', '').html('Select Teacher');
				$('.teacher').append(option);
                var option = $('<option>').attr('value', data.data.teacher_id).html(data.data['getteacher']['name']);
				$('.teacher').append(option);
			}
		});
	});

    });


</script>
@endsection
