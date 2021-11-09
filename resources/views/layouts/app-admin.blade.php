<!DOCTYPE html>
<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="{{ config('app.name', 'Jobzgram') }}" />
    <meta name="keywords" content="{{ config('app.name', 'Jobzgram') }}">
    <meta name="author" content="rinku101990@gmail.com" />
    <link rel="shortcut icon" href="{{ url('assets/img/favicon.jpg') }}" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="{{url('admin/assets/fonts/fontawesome.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/fonts/ionicons.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/fonts/linearicons.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/fonts/open-iconic.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/fonts/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/fonts/feather.css')}}">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{url('admin/assets/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/css/uikit.css')}}">

    <!-- Libs -->
    <link rel="stylesheet" href="{{url('admin/assets/libs/select2/select2.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/libs/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/libs/datatables/datatables.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/libs/bootstrap-markdown/bootstrap-markdown.css')}}">
    <link rel="stylesheet" href="{{url('admin/assets/libs/quill/editor.css')}}">
    <style>
    .error {color: red;}
    .modal-body{
    /* border: 4px solid #62d493;*/   
    padding: 0.5rem;
    
    }
    .bootbox-confirm .modal-body{
        padding: 1.5625rem;

    }
    .alert-success {
   
   border:none;
    border-left: 5px solid #178344;
    border-radius: 5px;
}
      </style>
    
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
                <div class="app-brand demo">
                     <span class="app-brand-logo demo">
                     <img src="{{url('assets/images/favicon.png')}}" alt="Brand Logo" class="img-fluid" style="width: 40px;background: #fff;padding: 5px;">
                    </span>
                    
                    <a href="{{url('admin/dashboard')}}" class="app-brand-text demo sidenav-text font-weight-normal ml-2">{{ config('app.name', 'Laravel') }}</a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">

                    <!-- Dashboards -->
                    <li class="sidenav-item @if(\Request::route()->getName() == 'admin.dashboard') active @endif">
                        <a href="{{route('admin.dashboard')}}" class="sidenav-link">
                            <i class="sidenav-icon feather icon-home"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>

                     
                    <li class="sidenav-item @if((\Request::route()->getName() == 'admin.user.index') || (\Request::route()->getName() == 'admin.user.view') || (\Request::route()->getName() == 'admin.user.edit')  || (\Request::route()->getName() == 'admin.user.teacher')  || (\Request::route()->getName() == 'admin.user.teacher.view') || (\Request::route()->getName() == 'admin.user.counsellors') || (\Request::route()->getName() == 'admin.user.counsellors.view') || (\Request::route()->getName() == 'batch.index') || (\Request::route()->getName() == 'batch.edit') || (\Request::route()->getName() == 'batch.create') || (\Request::route()->getName() == 'study-material.index') || (\Request::route()->getName() == 'study-material.create') || (\Request::route()->getName() == 'study-material.edit') || (\Request::route()->getName() == 'assign.index') || (\Request::route()->getName() == 'assign.create') || (\Request::route()->getName() == 'assign.edit')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-user"></i>
                            <div>User</div>
                        </a>
                        <ul class="sidenav-menu">
                          
                            <li class="sidenav-item @if((\Request::route()->getName() == 'admin.user.view') || (\Request::route()->getName() == 'admin.user.index')) active @endif">
                                <a href="{{url('admin/user')}}" class="sidenav-link">
                                    <div>Manage Users</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidenav-item @if((\Request::route()->getName() == 'category.index') || (\Request::route()->getName() == 'category.create') || (\Request::route()->getName() == 'category.edit') || (\Request::route()->getName() == 'session.index') || (\Request::route()->getName() == 'session.edit') || (\Request::route()->getName() == 'session.create')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-layers"></i>
                            <div>Country</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item @if(\Request::route()->getName() == 'category') active @endif">
                                <a href="{{url('admin/category')}}" class="sidenav-link">
                                    <div>Manage Country</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidenav-item @if((\Request::route()->getName() == 'program.index') || (\Request::route()->getName() == 'program.create') || (\Request::route()->getName() == 'program.edit') || (\Request::route()->getName() == 'session.index') || (\Request::route()->getName() == 'session.edit') || (\Request::route()->getName() == 'session.create')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-layers"></i>
                            <div>Jobs</div>
                        </a>
                        <ul class="sidenav-menu">
                            
                            <li class="sidenav-item @if((\Request::route()->getName() == 'program.edit') || (\Request::route()->getName() == 'program.index')) active @endif">
                                <a href="{{url('admin/program')}}" class="sidenav-link">
                                    <div>Manage Jobs</div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <!-- <li class="sidenav-item @if((\Request::route()->getName() == 'banner.index') || (\Request::route()->getName() == 'banner.create') || (\Request::route()->getName() == 'banner.edit')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-image"></i>
                            <div>Banners</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item @if(\Request::route()->getName() == 'banner.create') active @endif">
                                <a href="{{url('admin/banner/create')}}" class="sidenav-link">
                                    <div>Add Banner</div>
                                </a>
                            </li>
                            
                            <li class="sidenav-item @if((\Request::route()->getName() == 'banner.edit') || (\Request::route()->getName() == 'banner.index')) active @endif">
                                <a href="{{url('admin/banner')}}" class="sidenav-link">
                                    <div>Manage Banners</div>
                                </a>
                            </li>
                            
                        </ul>
                    </li> -->
                     
                    <li class="sidenav-item @if((\Request::route()->getName() == 'page.index') || (\Request::route()->getName() == 'page.create') || (\Request::route()->getName() == 'page.edit')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-file-text"></i>
                            <div>Page</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item @if(\Request::route()->getName() == 'page.create') active @endif">
                                <a href="{{url('admin/page/create')}}" class="sidenav-link">
                                    <div>Add Page</div>
                                </a>
                            </li>
                            
                            <li class="sidenav-item @if((\Request::route()->getName() == 'page.edit') || (\Request::route()->getName() == 'page.index')) active @endif">
                                <a href="{{url('admin/page')}}" class="sidenav-link">
                                    <div>Manage Page</div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                  
                    <li class="sidenav-item @if((\Request::route()->getName() == 'faq.index') || (\Request::route()->getName() == 'faq.create') || (\Request::route()->getName() == 'faq.edit')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-help-circle"></i>
                            <div>Faqs</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item @if(\Request::route()->getName() == 'faq.create') active @endif">
                                <a href="{{url('admin/faq/create')}}" class="sidenav-link">
                                    <div>Add Faqs</div>
                                </a>
                            </li>
                            
                            <li class="sidenav-item @if((\Request::route()->getName() == 'faq.edit') || (\Request::route()->getName() == 'faq.index')) active @endif">
                                <a href="{{url('admin/faq')}}" class="sidenav-link">
                                    <div>Manage Faqs</div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="sidenav-item @if((\Request::route()->getName() == 'blog.index') || (\Request::route()->getName() == 'blog.create') || (\Request::route()->getName() == 'blog.edit') || (\Request::route()->getName() == 'blogcategory.index') || (\Request::route()->getName() == 'blogcategory.create') || (\Request::route()->getName() == 'blogcategory.edit')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-file-text"></i>
                            <div>Blog</div>
                        </a>
                        <ul class="sidenav-menu">
                        <li class="sidenav-item @if((\Request::route()->getName() == 'blogcategory.index') || (\Request::route()->getName() == 'blogcategory.create') || (\Request::route()->getName() == 'blogcategory.edit')) active open @endif" style="">
                                <a href="javascript:" class="sidenav-link sidenav-toggle">
                                    <div>Blog Category</div>
                                </a>
                                <ul class="sidenav-menu @if((\Request::route()->getName() == 'blogcategory.index') || (\Request::route()->getName() == 'blogcategory.create') || (\Request::route()->getName() == 'blogcategory.edit')) active open @endif">
                                    <li class="sidenav-item @if(\Request::route()->getName() == 'blogcategory.create') active @endif">
                                        <a href="{{url('admin/blogcategory/create')}}" class="sidenav-link ">
                                            <div>Add Blog Category</div>
                                        </a>
                                    </li>
                                    <li class="sidenav-item @if((\Request::route()->getName() == 'blogcategory.edit') || (\Request::route()->getName() == 'blogcategory.index')) active @endif">
                                        <a href="{{url('admin/blogcategory')}}" class="sidenav-link">
                                            <div>Blog Category</div>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>
                            <li class="sidenav-item @if(\Request::route()->getName() == 'blog.create') active @endif">
                                <a href="{{url('admin/blog/create')}}" class="sidenav-link">
                                    <div>Add Blog</div>
                                </a>
                            </li>
                            
                            <li class="sidenav-item @if((\Request::route()->getName() == 'blog.edit') || (\Request::route()->getName() == 'blog.index')) active @endif">
                                <a href="{{url('admin/blog')}}" class="sidenav-link">
                                    <div>Manage Blog</div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="sidenav-item @if((\Request::route()->getName() == 'testimonial.index') || (\Request::route()->getName() == 'testimonial.create') || (\Request::route()->getName() == 'testimonial.edit')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-zap"></i>
                            <div>Testimonial</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item @if(\Request::route()->getName() == 'testimonial.create') active @endif">
                                <a href="{{url('admin/testimonial/create')}}" class="sidenav-link">
                                    <div>Add Testimonial</div>
                                </a>
                            </li>
                            
                            <li class="sidenav-item @if((\Request::route()->getName() == 'testimonial.edit') || (\Request::route()->getName() == 'testimonial.index')) active @endif">
                                <a href="{{url('admin/testimonial')}}" class="sidenav-link">
                                    <div>Manage Testimonial</div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="sidenav-item @if((\Request::route()->getName() == 'admin.profile')) active open @endif">
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon ion ion-ios-cog"></i>
                            <div>Settings</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item @if(\Request::route()->getName() == 'admin.profile') active @endif">
                                <a href="{{url('admin/profile')}}" class="sidenav-link">
                                    <div>My Profile</div>
                                </a>
                            </li>                            
                        </ul>
                    </li>                    
                </ul>
            </div>
            
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x" id="layout-navbar">

                    <a href="{{url('admin/dashboard')}}" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                        <span class="app-brand-logo demo">
                            <img src="{{ url('assets/images/Kids-Fable-logo.png') }}" alt="Brand Logo" class="img-fluid">
                        </span>
                        <span class="app-brand-text demo font-weight-normal ml-2">{{ config('app.name', 'Laravel') }}</span>
                    </a>

                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
                        <!-- Divider -->
                        <hr class="d-lg-none w-100 my-2">

                        <div class="navbar-nav align-items-lg-center ml-auto">
                            <div class="demo-navbar-notifications nav-item dropdown mr-lg-3">
                                <a class="nav-link dropdown-toggle hide-arrow" href="#" data-toggle="dropdown">
                                    <i class="feather icon-bell navbar-icon align-middle"></i>
                                    <span class="badge badge-danger badge-dot indicator"></span>
                                    <span class="d-lg-none align-middle">&nbsp; Notifications</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="bg-primary text-center text-white font-weight-bold p-3">
                                        1 New Notifications
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <a href="javascript:" class="list-group-item list-group-item-action media d-flex align-items-center">
                                            <div class="ui-icon ui-icon-sm feather icon-home bg-secondary border-0 text-white"></div>
                                            <div class="media-body line-height-condenced ml-3">
                                                <div class="text-dark">Login from 192.168.1.1</div>
                                                <div class="text-light small mt-1">
                                                    Aliquam ex eros, imperdiet vulputate hendrerit et.
                                                </div>
                                                <div class="text-light small mt-1">12h ago</div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:" class="d-block text-center text-light small p-2 my-1">Show all notifications</a>
                                </div>
                            </div>

                            <!-- Divider -->
                            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
                            <div class="demo-navbar-user nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                        <img src="{{url('admin/assets/img/avatars/1.png')}}" alt class="d-block ui-w-30 rounded-circle">
                                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0">{{auth()->guard('admin')->user()->name}}</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{url('admin/profile')}}" class="dropdown-item">
                                        <i class="feather icon-user text-muted"></i> &nbsp; My profile</a>
                                                               
                                    <div class="dropdown-divider"></div>
                                    <a href="{{ route('admin.logout') }}" class="dropdown-item">
                                       <i class="feather icon-power text-danger"></i> &nbsp; Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- [ Layout navbar ( Header ) ] End -->
            @yield('content')

            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    <!-- Core scripts -->
    <script src="{{url('admin/assets/js/pace.js')}}"></script>
    <script src="{{url('admin/assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{url('admin/assets/libs/popper/popper.js')}}"></script>
    <script src="{{url('admin/assets/js/bootstrap.js')}}"></script>
    <script src="{{url('admin/assets/js/sidenav.js')}}"></script>
    <script src="{{url('admin/assets/js/layout-helpers.js')}}"></script>
    <script src="{{url('admin/assets/js/material-ripple.js')}}"></script>

    <!-- Libs -->
    <script src="{{url('admin/assets/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{url('admin/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{url('admin/assets/libs/markdown/markdown.js')}}"></script>
    <script src="{{url('admin/assets/libs/bootstrap-markdown/bootstrap-markdown.js')}}"></script>
    <!-- Demo -->
    <script src="{{url('admin/assets/libs/bootstrap-select/bootstrap-select.js')}}"></script>
    <script src="{{url('admin/assets/libs/select2/select2.js')}}"></script>
    <script src="{{url('admin/assets/js/demo.js')}}"></script>
    <script src="{{url('admin/assets/js/pages/forms_selects.js')}}"></script>
    <script src="{{url('admin/assets/libs/datatables/datatables.js')}}"></script>
    <script src="{{url('admin/assets/js/pages/tables_datatables.js')}}"></script>
    <script src="{{url('admin/assets/js/bootbox.min.js') }}"></script>  
    <script src="{{url('admin/assets/js/pages/forms_editors.js') }}"></script>  
    

    @yield('script')
    <script>
        $(document).ready(function() {
            $("body").on("click",".add-more",function(){ 
                var html = $(".after-add-more").first().clone();
                $(html).find(".change").html("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove' style='color:#fff'>- Remove</a>");
                $(".after-add-more").last().after(html);
            });
            $("body").on("click",".remove",function(){ 
                $(this).parents(".after-add-more").remove();
            });
        });
    </script>

    <script>

        function deletePopupMessageAjax(title, message, record_id, url){
                bootbox.confirm({
                    size: "small",
                    title: title,
                    message: "<i class=\"fa fa-exclamation-triangle\" style=\"color:red\"></i> " + message,
                    buttons: {
                        confirm: {
                            label: 'Confirm',
                            className: 'btn-danger',
                        },
                        cancel: {
                            label: 'No',
                        }
                    },
                    callback: function (result) {
                        if (result) {
                            $.ajax({
                                url: url,
                                type: 'delete',
                                data: {id: record_id,_token:"{{ csrf_token() }}"},
                                dataType: 'json',
                                beforeSend: function () {
                                    $(".overlay").show();
                                },
                                success: function (res) {
                                  
                                    if (res.status == true)
                                    {
                                        $(".overlay").hide();
                                        showAlert(res.message,'reload');
                                        
                                    } else {
                                        $(".overlay").hide();
                                        showAlert(res.messagem,'reload');
                                    }
                                }
                            });
                        }
                    }
                });
            }
         
       
            function showAlert(msg,reload) {
              
                var dialog = bootbox.dialog({
                message: ' <div class="alert alert-success alert-dismissible fade show" style="margin-bottom: 0;"><button type="button" class="close" data-dismiss="alert">×</button>  '+msg+'      </div>  ',
                closeButton: false,
                size: 'small',
                });
                if(reload == 'reload'){
                    setTimeout(function() {
                    location.reload();
                    }, 1500);
                }else{

                    setTimeout(function() {
                        dialog.modal('hide');
                    }, 1500);
                    
                }
               
            }


            setTimeout(function () {
                $(".alert").fadeOut();
            }, 3000);
    </script>

    @if(session()->has('success'))
        <script>
            showAlert("{{ session()->get('success') }}",'notReload');
        </script>
    @endif
    @if(session()->has('error'))
        <script>
            showAlert("{{ session()->get('error') }}",'notReload');
        </script>
    @endif

  
</body>


</html>
