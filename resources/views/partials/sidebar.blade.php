@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

            @if (Auth::check() && Auth::user()->role_id == 1)


                <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}" style="color: black;">
                    <a href="{{ url('/') }}" style="color: black;">
                        <i class="fa fa-wrench" style="color: black;"></i>
                        <span class="title">@lang('quickadmin.qa_dashboard')</span>
                    </a>
                </li>


                <!-- @can('user_management_access')
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">

                @can('role_access')
                        <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                        </span>
                    </a>
                </li>
@endcan

                    </ul>
                </li>
@endcan -->
                @can('user_access')
                    <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}" style="color: black;">
                        <a href="{{ route('admin.users.index') }}" style="color: black;">
                            <i class="fa fa-user"></i>
                            <span class="title" style="color: black;">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('folder_access')
                    <li class="{{ $request->segment(2) == 'folders' ? 'active' : '' }}" style="color: black;">
                        <a href="{{ route('admin.folders.index') }}">
                            <i class="fa fa-gears" class="title" style="color: black;"></i>
                            <span class="title"style="color: black;">@lang('quickadmin.folders.title')</span>
                        </a>
                    </li>
                @endcan

                @can('file_access')
                    <li class="{{ $request->segment(2) == 'files' ? 'active' : '' }}" style="color: black;">
                        <a href="{{ route('admin.files.index') }}" style="color: black;">
                            <i class="fa fa-gears" class="title" ></i>
                            <span class="title" style="color: black;">@lang('quickadmin.files.title')</span>
                        </a>
                    </li>
                @endcan
                {{-- @can('plan_access')
                <li class="{{ $request->segment(2) == 'subscriptions' ? 'active' : '' }}" style="color: black;">
                    <a href="{{ route('admin.subscriptions.index') }}" style="color: black;">
                        <i class="fa fa-credit-card"></i>
                        <span class="title" class="title" style="color: black;">My Plan</span>
                    </a>
                </li>
                @endcan --}}


                <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}" style="color: black;">
                    <a href="{{ route('auth.change_password') }}" style="color: black;">
                        <i class="fa fa-key"></i>
                        <span class="title" class="title" style="color: black;">@lang('quickadmin.qa_change_password')</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="#logout" onclick="$('#logout').submit();" style="color: black;">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title" class="title" style="color: black;">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>