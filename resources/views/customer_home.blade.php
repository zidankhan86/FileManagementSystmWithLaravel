{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <title>--}}
{{--        login--}}
{{--    </title>--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta content="width=device-width, initial-scale=1.0" name="viewport" />--}}
{{--    <meta http-equiv="Content-type" content="text/html; charset=utf-8">--}}

{{--    <!-- Tell the browser to be responsive to screen width -->--}}
{{--    <meta content="width=device-width, initial-scale=1, maximum-scale=20, user-scalable=yes" name="viewport">--}}
{{--    <!-- Font Awesome -->--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">--}}
{{--    <!-- Ionicons -->--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
{{--    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->--}}
{{--    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->--}}
{{--    <!--[if lt IE 9]>--}}
{{--    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
{{--    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
{{--    <![endif]-->--}}

{{--    <link href="{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}

{{--    <link rel="stylesheet" href="{{ url('quickadmin/css') }}/select2.min.css" />--}}
{{--    <link href="{{ url('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ url('adminlte/css/custom.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ url('adminlte/css/skins/skin-blue.min.css') }}" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">--}}
{{--    <link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css" />--}}
{{--    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />--}}
{{--    <link rel="stylesheet"--}}
{{--        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.css" />--}}
{{--    <link rel="stylesheet"--}}
{{--        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.min.css" />--}}
{{--</head>--}}

{{--<body class="hold-transition skin-blue ">--}}

{{--    <div id="wrapper" class="container">--}}

{{--        <header class="main-header">--}}
{{--        <header class="main-header">--}}
{{--            <!-- Logo -->--}}
{{--            --}}{{-- <a href="{{ url('/admin/home') }}" class="logo" style="font-size: 16px;">--}}
{{--                <span class="logo-mini" style="color: black;">--}}
{{--                    @lang('quickadmin.quickadmin_title')</span>--}}
{{--                <span class="logo-lg">--}}
{{--                    @lang('quickadmin.quickadmin_title')</span>--}}
{{--            </a> --}}
{{--            <!-- Header Navbar: style can be found in header.less -->--}}

{{--            <nav class="navbar navbar-left-top">--}}
{{--                <!-- Sidebar toggle button-->--}}
{{--                <a href="#" class="sidebar-toggle bg-blue " data-toggle="offcanvas" role="button"> </a>--}}
{{--                    <span class="sr-only ">Toggle navigation</span>--}}
{{--                --}}
{{--                    <span class="icon-bar">--}}

{{--            </nav>--}}

{{--        </header>--}}

{{--        @inject('request', 'Illuminate\Http\Request')--}}
{{--        <!-- Left side column. contains the sidebar -->--}}
{{--        <aside class="main-sidebar">--}}
{{--            <!-- sidebar: style can be found in sidebar.less -->--}}
{{--            <section class="sidebar">--}}

{{--                <ul class="navbar-custom-menu">--}}

{{--                    @if (Auth::check() && Auth::user()->role_id == 2)--}}
{{--                        <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">--}}
{{--                            <a href="{{ url('/') }}" style="color: black;">--}}
{{--                                <i class="fa fa-home"></i>--}}
{{--                                <span class="title" style="color: black;">Home</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @foreach ($folders as $folder)--}}
{{--                            <li class="treeview">--}}
{{--                                <a href="#" style="color: black;">--}}
{{--                                    <i class="fa fa-folder"></i>--}}
{{--                                    <span class="title"> {{ $folder->name }}</span>--}}
{{--                                    <span class="pull-right-container">--}}
{{--                                        <i class="fa fa-angle-left pull-right"></i>--}}
{{--                                    </span>--}}
{{--                                </a>--}}
{{--                                <ul class="treeview-menu">--}}
{{--                                    @php--}}
{{--                                        $files = App\File::where('folder_id', $folder->id)->get();--}}
{{--                                    @endphp--}}
{{--                                    @if ($files->isEmpty())--}}
{{--                                        <li class="">--}}
{{--                                            <a href="#" style="color: black;">--}}
{{--                                                <i class="fa fa-folder"></i>--}}
{{--                                                <span class="title"> No Data</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    @else--}}
{{--                                    @foreach ($files as $file)--}}
{{--                                    <li class="">--}}
{{--                                        <a href="#" style="color: black;">--}}
{{--                                            <span class="title">--}}
{{--                                                @foreach ($file->getMedia('filename') as $media)--}}
{{--                                                    @php--}}
{{--                                                        $urlToFile = asset('storage/' . $file->id . '/' . $media->file_name);--}}
{{--                                                    @endphp--}}
{{--                                                    --}}{{-- <a href="{{ $urlToFile }}" class="btn btn-xs btn-success">View</a> --}}
{{--                                                    <a href="{{ $urlToFile }}"  class="view-file-btn" data-src="{{ $urlToFile }}" style="color: black;">--}}

{{--                                                        {{ substr($media->name, 0, 20) }}--}}
{{--                                                    </a>--}}
{{--                                                @endforeach--}}
{{--                                            </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}

{{--                                    @endif--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                    <li>--}}
{{--                        <a href="#logout" onclick="$('#logout').submit();" style="color: black;">--}}
{{--                            <i class="fa fa-arrow-left"></i>--}}
{{--                            <span class="title">@lang('quickadmin.qa_logout')</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </section>--}}
{{--        </aside>--}}
{{--        <!-- Content Wrapper. Contains page content -->--}}
{{--        <div class="content-wrapper">--}}
{{--            <!-- Main content -->--}}
{{--            <section class="content">--}}
{{--                @if (isset($siteTitle))--}}
{{--                    <h3 class="page-title">--}}
{{--                        {{ $siteTitle }}--}}
{{--                    </h3>--}}
{{--                @endif--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-12">--}}
{{--                        <div class="row justify-content-center"> <!-- Center the content within the row -->--}}
{{--                                <div class="panel panel-default" style="user-select: none; pointer-events: none;">--}}
{{--                                    <div class="panel-body text-center"> <!-- Center the content within the panel -->--}}
{{--                                        <img src="{{ Auth::check() && Auth::user()->image ? url('storage/' . Auth::user()->image) : url('images/no_img.png') }}" alt="Preview Image" style="max-width: 100%; max-height: 100%; margin: auto; user-select: none; pointer-events: none;" id="file-preview-img">--}}

{{--                                        <embed src="" type="" width="100%" height="100%" id="file-preview-embed"></embed>--}}
{{--                                        <p id="preview-message" style="display: none;">Nothing to preview</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}
{{--            </section>--}}
{{--        </div>--}}

{{--        {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}--}}
{{--        <button type="submit">Logout</button>--}}
{{--        {!! Form::close() !!}--}}

{{--        @include('partials.javascripts')--}}
{{--</body>--}}

{{--</html>--}}

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('.view-file-btn').on('click', function (e) {--}}
{{--            e.preventDefault();--}}

{{--            var fileUrl = $(this).data('src');--}}
{{--            if (fileUrl) {--}}
{{--                var fileExtension = getFileExtension(fileUrl);--}}

{{--                if (isImage(fileExtension)) {--}}
{{--                    // It's an image, use <img>--}}
{{--                    $('#file-preview-img').attr('src', fileUrl).show(); // Show the image--}}
{{--                    $('#file-preview-embed').attr('src', ''); // Reset the src attribute for embed--}}
{{--                } else {--}}
{{--                    // It's not an image, use <embed>--}}
{{--                    $('#file-preview-embed').attr('src', fileUrl);--}}
{{--                    $('#file-preview-img').hide(); // Hide the image--}}
{{--                }--}}

{{--                $('#preview-message').hide();--}}
{{--            } else {--}}
{{--                // No file selected, show the message--}}
{{--                $('#file-preview-img').attr('src', '').hide(); // Reset the src attribute and hide the image--}}
{{--                $('#file-preview-embed').attr('src', ''); // Reset the src attribute for embed--}}
{{--                $('#preview-message').show();--}}
{{--            }--}}
{{--        });--}}

{{--        // Helper function to get file extension--}}
{{--        function getFileExtension(filename) {--}}
{{--            return filename.split('.').pop().toLowerCase();--}}
{{--        }--}}

{{--        // Helper function to check if the file is an image--}}
{{--        function isImage(extension) {--}}
{{--            return ['jpg', 'jpeg', 'png', 'gif'].includes(extension);--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url ('adminlte/css/customer.css')}}">
    <title>Sidebar</title>
</head>

<body>
<div class="wrapper">
    <!-- Sidebar -->
    <aside id="sidebar">
        <div class="h-100">
            <div class="sidebar-logo">
                <!--                <a href="#">Side Bar</a>-->
            </div>
            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    <!--                    <hr class="border border-danger border-3 opacity-200">-->
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class=" fa fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="fa fa-sign-out pe-2"></i>
                        Logout
                    </a>
                </li>
            </ul>
{{--            dropdown system--}}
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#auth"
                   aria-expanded="false" aria-controls="auth">
                    <i class="fa-regular fa-user pe-2"></i>
                    Auth
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                      <li class="sidebar-item">
                          <a href="#" class="sidebar-link">Login</a>
                      </li>
                      <li class="sidebar-item">
                          <a href="#" class="sidebar-link">Register</a>
                      </li>
                      <li class="sidebar-item">
                          <a href="#" class="sidebar-link">Others</a>
                      </li>
                </ul>
            </li>
{{--            end dropdown system--}}
        </div>
    </aside>
    <!-- Main Component -->
    <div class="main">
        <nav class="navbar navbar-expand px-3 border-bottom border-3">
            <!-- Button for sidebar toggle -->
            <button class="btn btn-white" type="button" data-bs-theme="light">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img style="height: 40px; width:1900px" src="{{asset('/images/login.jpg')}}" alt="">
        </nav>
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h3> Hello </h3>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
<script src={{url ('adminlte/js/customer.js')}}></script>
</body>
</html>