<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <style>
        .h-100{
            height:calc(100%);
        }
        #login-box{
            width:100%;
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
        }
        .w-100{
            width:105% !important;
        }
    </style>
</head>
        <!-- <div class="col-md-5">
        <img src="{{ asset('/images/S.jpg') }}" alt="Image Description" style="width: 526px; height: 100px;">
        </div> -->
<body class="page-header-fixed">


    <div class="container-fluid h-100">
        @yield('content')
    </div>

    <div class="scroll-to-top"
         style="display: none;">
        <i class="fa fa-arrow-up"></i>
    </div>

    @include('partials.javascripts')

</body>
</html>
