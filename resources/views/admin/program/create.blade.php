@extends('layouts.app-admin')
@section('content')

<!-- [ content ] Start -->
<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Add Course</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Course</li>
                <li class="breadcrumb-item active">Add Course</li>
            </ol>
        </div>

        <div class="card mb-4">
            <h6 class="card-header bg-dark text-white">Course</h6>
            <div class="card-body">

                <form class="form-horizontal form-label-left" action="{{ url('admin/program') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title <span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Enter Title" name="title" onkeyup="slug_url_program(this.value,'title_slug')">
                            <input type="hidden" class="form-control" name="title_slug" id="title_slug"> 
                            <div class="clearfix" id="programTitleLength"></div>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Category <span class="error">*</span></label>
                            <select class="form-control"  name="category">
                                <option value="">Select Category</option>
                                @foreach($category as $cateValue)
                                <option value="{{$cateValue->id}}">{{$cateValue->title}}</option>
                                @endforeach
                           </select>
                            <div class="clearfix"></div>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Program Fees <span class="error">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Program Fees" name="fees">
                            <div class="clearfix"></div>
                            @error('fees')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Age Group <span class="error">*</span></label>
                            <select class="form-control" name="age_group">
                                <option value="">- Select -</option>
                                <option value="5 to 8 years">5 to 8 years</option>
                                <option value="5 to 13 years">5 to 13 years</option>
                                <option value="8 to 13 years">8 to 13 years</option>
                                <option value="9 to 13 years">9 to 13 years</option>
                            </select>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Batch <span class="error">*</span></label>
                            <select class="form-control"  name="batch">
                                <option value="">Select Batch</option>
                                @foreach($batch as $batch_val)
                                <option value="{{$batch_val->id}}">{{$batch_val->name}}</option>
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
                            <label class="form-label">Rate per session <span class="error">*</span></label>
                            <input type="number" class="form-control" placeholder="Enter Rate per session (Amount 400) " name="rate_per_session">
                            <div class="clearfix"></div>
                            @error('rate_per_session')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">About the course</label>
                            <input type="text" class="form-control" placeholder="Enter About the Course" name="about_course">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Why to join this course?</label>
                            <input type="text" class="form-control" placeholder="Enter Why to join this course" name="why_joinus">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">What you will gain after completing the course?</label>
                            <input type="text" class="form-control" placeholder="Type here" name="gain_after">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Curriculum Details</label>
                            <input type="text" class="form-control" placeholder="Type here" name="curriculum">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Batch strength</label>
                            <input type="text" class="form-control" placeholder="Type here like: 10 students" name="batch_strength">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Classes per week</label>
                            <input type="text" class="form-control" placeholder="Type here like: 2 classes" name="class_per_week">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">About the mentor </label>
                            <input type="text" class="form-control" placeholder="Type here about the mentor " name="about_mentor">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Short Description <span class="error">*</span></label>
                            <textarea class="form-control mt-4" name="short_description" rows="3"></textarea>
                            <div class="clearfix"></div>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                   
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Description <span class="error">*</span></label>
                            
                            <textarea id="bs-markdown" class="form-control mt-4" name="description" rows="10"></textarea>
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
                            <label class="form-label">Training Material<span class="error">*</span></label>
                            <input type="file" class="form-control" placeholder="Training Material" name="training_material" accept=".doc, .docx, .pdf">
                            <div class="clearfix"></div>
                            @error('training_material')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Program Presentations<span class="error"></span></label>
                            <input type="file" class="form-control" placeholder="Program Presentations" name="program_presentations" accept=".doc, .docx, .pdf">
                            <div class="clearfix"></div>
                            @error('program_presentations')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Upload Banner <span class="error">*</span></label>
                            <input type="file" class="form-control" placeholder="Upload Banner" name="banner" accept="image/x-png,image/jpeg">
                            <div class="clearfix"></div>
                            @error('banner')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label class="form-label">Status <span class="error">*</span></label>
                           <select class="form-control" name="status">
                               <option value="active">Active</option>
                               <option value="coming">Coming Soon</option>
                               <option value="inactive">Inactive</option>
                           </select>
                           <div class="clearfix"></div>
                       </div>
                   </div>
                   <div class="form-row demo-vertical-spacing">
                        <div class="form-group col-md-6 select2-warning">
                            <label class="form-label">Search Tag <span class="error">*</span></label>
                            <select class="select2-demo form-control" name="tags[]" multiple style="width: 100%" required>
                                @foreach($tags as $taglist)
                                    <option value="{{$taglist->title}}">{{$taglist->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <input type="submit" class="btn btn-primary" value="Create">
                </form>
            </div>
        </div>
    </div>
    <!-- [ content ] End -->
<!-- [ content ] End -->
@endsection

<script>
    function slug_url_program(get,id){
        var  data=$.trim(get); // For String Lsug
        var maxLength = 27; // String length Limit
        var strLength = get.length; // String Length Auto
        var string = data.replace(/[^A-Z0-9]/ig, '-')
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes;
        var finalvalue=string.toLowerCase();
        document.getElementById(id).value=finalvalue;

        // String Length Counter //
        if(strLength > maxLength){
            document.getElementById("programTitleLength").innerHTML = '<span style="color: red;">'+strLength+' out of '+maxLength+' characters</span>';
            $('input[type="submit"]').attr('disabled','disabled');
        }else{
            document.getElementById("programTitleLength").innerHTML = strLength+' out of '+maxLength+' characters';
            $('input[type="submit"]').removeAttr('disabled');
        }
    }
</script>