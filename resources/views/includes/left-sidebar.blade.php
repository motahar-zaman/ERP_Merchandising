<!-- Brand Logo -->
<a href="{{ asset('/') }}" class="brand-link">
    <img src="{{ asset('favicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Ringer ERP 1.0</span>
</a>

<!-- Sidebar -->
<div class="sidebar nano">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ action('UserController@show') }}" class="d-block">DSL Group</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            {{--<li class="nav-item has-treeview {{ isActive(['/','dashboard*']) }}">--}}
            {{--<a href="#" class="nav-link {{ isActive(['dashboard*','/']) }}">--}}
            {{--<i class="nav-icon fas fa-tachometer-alt"></i>--}}
            {{--<p>--}}
            {{--Dashboard--}}
            {{--<i class="right fas fa-angle-left"></i>--}}
            {{--</p>--}}
            {{--</a>--}}
            {{--<ul class="nav nav-treeview">--}}
            {{--<li class="nav-item">--}}
            {{--<a href="{{ action('DashboardController@index') }}" class="nav-link {{ isActive('/') }}">--}}
            {{--<i class="far fa-circle nav-icon"></i>--}}
            {{--<p>Dashboard v1</p>--}}
            {{--</a>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--</li>--}}

            <li class="nav-item {{ isActive(['/','dashboard*']) }}">
                <a href="{{ action('DashboardController@index') }}" class="nav-link {{ isActive('/') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        {{--<span class="right badge badge-danger">New</span>--}}
                    </p>
                </a>
            </li>


            @can('merchandiser')
                @include('includes.sidebar.merchandiser')
            @endcan
            @can('planning')
                @include('includes.sidebar.planning')
            @endcan
            @can('production')
                @include('includes.sidebar.production')
            @endcan

            <!--@can('planning')-->
            <!--    @include('includes.sidebar.planning')-->
            <!--    <hr>-->
            <!--    @include('includes.sidebar.merchandiser')-->
            <!--    <hr>-->
            <!--    <li class="nav-item">-->
            <!--        <a href="#" class="nav-link">-->
            <!--            <i class="nav-icon fas fa-tools"></i>-->
            <!--            <p>Store </p>-->
            <!--        </a>-->
            <!--    </li>-->
            <!--    @include('includes.sidebar.store')-->
            <!--@endcan-->

            @can('store')
                @include('includes.sidebar.store')
            @endcan
            @php $active = ['change/password']; @endphp
            <li class="nav-item {{ isActive($active) }}">
                <a href="{{ url('change/password') }}" class="nav-link {{ isActive($active) }} main-menu">
                    <i class="nav-icon fas fa-key"></i>
                    <p> Change Password </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
