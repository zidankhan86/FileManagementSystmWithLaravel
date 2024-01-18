@extends('layouts.app')

@section('content')

<header class="main-header">
    <a href="{{ url('/admin/home') }}" class="logo">
        <span class="logo-mini">@lang('quickadmin.quickadmin_title')</span>
        <span class="logo-lg">@lang('quickadmin.quickadmin_title')</span>
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>  
    </nav>
</header>

@inject('request', 'Illuminate\Http\Request')

<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @can('user_access', 'folder_access', 'file_access')
                <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-wrench"></i>
                        <span class="title">@lang('quickadmin.qa_dashboard')</span>
                    </a>
                </li>

                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fa fa-user"></i>
                        <span class="title">@lang('quickadmin.users.title')</span>
                    </a>
                </li>

                @can('folder_access')
                    <li class="{{ $request->segment(2) == 'folders' ? 'active' : '' }}">
                        <a href="{{ route('admin.folders.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">@lang('quickadmin.folders.title')</span>
                        </a>
                    </li>
                @endcan

                @can('file_access')
                    <li class="{{ $request->segment(2) == 'files' ? 'active' : '' }}">
                        <a href="{{ route('admin.files.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">@lang('quickadmin.files.title')</span>
                        </a>
                    </li>
                @endcan

                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                    <a href="{{ route('auth.change_password') }}">
                        <i class="fa fa-key"></i>
                        <span class="title">@lang('quickadmin.qa_change_password')</span>
                    </a>
                </li>
            @endcan

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>

            <li>
                <a href="">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">test</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

<div class="row">
    @if (Auth::check() && Auth::user()->role_id == 1)
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>
                <div class="panel-body">
                    @lang('quickadmin.qa_dashboard_text')
                </div>
            </div>
        </div>
    @elseif (Auth::check() && Auth::user()->role_id == 2)
        <div class="col-md-12">
            <!-- Add content for users with role_id == 2 -->
        </div>
    @endif
</div>

@endsection
