<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        @lang('quickadmin.quickadmin_title')
    </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('quickadmin/css') }}/select2.min.css" />
    <link href="{{ url('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ url('adminlte/css/custom.css') }}" rel="stylesheet">
    <link href="{{ url('adminlte/css/skins/skin-blue.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.min.css" />
</head>


<body class="hold-transition skin-blue sidebar-mini">

    <div id="wrapper">

        <header class="main-header">
            <!-- Logo -->
            {{-- <a href="{{ url('/admin/home') }}" class="logo" style="font-size: 16px;">
                <span class="logo-mini">
                    @lang('quickadmin.quickadmin_title')</span>
                <span class="logo-lg">
                    @lang('quickadmin.quickadmin_title')</span>
            </a> --}}
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>





            </nav>
        </header>



        @inject('request', 'Illuminate\Http\Request')
        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <ul class="sidebar-menu">

                    @if (Auth::check() && Auth::user()->role_id == 2)
                        <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                            <a href="{{ url('/') }}">
                                <i class="fa fa-home"></i>
                                <span class="title">Home</span>
                            </a>
                        </li>
                        @foreach ($folders as $folder)
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-folder"></i>
                                    <span class="title"> {{ $folder->name }}</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    @php
                                        $files = App\File::where('folder_id', $folder->id)->get();
                                    @endphp
                                    @if ($files->isEmpty())
                                        <li class="">
                                            <a href="#">
                                                <i class="fa fa-folder"></i>
                                                <span class="title"> Empty Folder</span>
                                            </a>
                                        </li>
                                    @else
                                    @foreach ($files as $file)
                                    <li class="">
                                        <a href="#">
                                            <span class="title">
                                                @foreach ($file->getMedia('filename') as $media)
                                                    @php
                                                        $urlToFile = asset('storage/' . $file->id . '/' . $media->file_name);
                                                    @endphp
                                                    {{-- <a href="{{ $urlToFile }}" class="btn btn-xs btn-success">View</a> --}}
                                                    <a href="{{ $urlToFile }}"  class="view-file-btn" data-src="{{ $urlToFile }}"> 

                                                        {{ substr($media->name, 0, 20) }}
                                                    </a>
                                                @endforeach
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                                
                                    @endif
                                </ul>
                            </li>
                        @endforeach



                    @endif


                    <li>
                        <a href="#logout" onclick="$('#logout').submit();">
                            <i class="fa fa-arrow-left"></i>
                            <span class="title">@lang('quickadmin.qa_logout')</span>
                        </a>
                    </li>
                </ul>
            </section>
        </aside>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                @if (isset($siteTitle))
                    <h3 class="page-title">
                        {{ $siteTitle }}
                    </h3>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="row justify-content-center"> <!-- Center the content within the row -->
                                <div class="panel panel-default">
                                    <div class="panel-body text-center"> <!-- Center the content within the panel -->
                                        <img src="" alt="Preview Image" style="max-width: 100%; max-height: 1080px; display: none; margin: auto;" id="file-preview-img">
                                        <embed src="" type="" width="100%" height="1080px" id="file-preview-embed"></embed>
                                        <p id="preview-message" style="display: none;">Nothing to preview</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                
            </section>
        </div>

        {!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
        <button type="submit">Logout</button>
        {!! Form::close() !!}

        @include('partials.javascripts')
</body>

</html>

<script>
    $(document).ready(function () {
        $('.view-file-btn').on('click', function (e) {
            e.preventDefault();

            var fileUrl = $(this).data('src');
            if (fileUrl) {
                var fileExtension = getFileExtension(fileUrl);

                if (isImage(fileExtension)) {
                    // It's an image, use <img>
                    $('#file-preview-img').attr('src', fileUrl).show(); // Show the image
                    $('#file-preview-embed').attr('src', ''); // Reset the src attribute for embed
                } else {
                    // It's not an image, use <embed>
                    $('#file-preview-embed').attr('src', fileUrl);
                    $('#file-preview-img').hide(); // Hide the image
                }

                $('#preview-message').hide();
            } else {
                // No file selected, show the message
                $('#file-preview-img').attr('src', '').hide(); // Reset the src attribute and hide the image
                $('#file-preview-embed').attr('src', ''); // Reset the src attribute for embed
                $('#preview-message').show();
            }
        });

        // Helper function to get file extension
        function getFileExtension(filename) {
            return filename.split('.').pop().toLowerCase();
        }

        // Helper function to check if the file is an image
        function isImage(extension) {
            return ['jpg', 'jpeg', 'png', 'gif'].includes(extension);
        }
    });
</script>
