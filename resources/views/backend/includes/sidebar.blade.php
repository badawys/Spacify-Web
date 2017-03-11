<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ access()->user()->picture }}" class="img-circle" alt="User Image" />
            </div><!--pull-left-->
            <div class="pull-left info">
                <p>{{ access()->user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('strings.backend.general.status.online') }}</a>
            </div><!--pull-left-->
        </div><!--user-panel-->

        <!-- search form (Optional) -->
        {{--{{ Form::open(['route' => 'admin.search.index', 'method' => 'get', 'class' => 'sidebar-form']) }}--}}
            {{--<div class="input-group">--}}
                {{--{{ Form::text('q', Request::get('q'), ['class' => 'form-control', 'required' => 'required', 'placeholder' => trans('strings.backend.general.search_placeholder')]) }}--}}

                  {{--<span class="input-group-btn">--}}
                    {{--<button type='submit' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
                  {{--</span><!--input-group-btn-->--}}
            {{--</div><!--input-group-->--}}
        {{--{{ Form::close() }}--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>{{ trans('menus.backend.sidebar.dashboard') }}</span>
                </a>
            </li>

            @permissions(['manage-users', 'manage-roles'])
                <li class="{{ Active::pattern('admin/access/*') }} treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>{{ trans('menus.backend.access.title') }}</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu {{ Active::pattern('admin/access/*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/access/*', 'display: block;') }}">
                        @permission('manage-users')
                            <li class="{{ Active::pattern('admin/access/user*') }}">
                                <a href="{{ route('admin.access.user.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>{{ trans('labels.backend.access.users.management') }}</span>
                                </a>
                            </li>
                        @endauth

                        @permission('manage-roles')
                            <li class="{{ Active::pattern('admin/access/role*') }}">
                                <a href="{{ route('admin.access.role.index') }}">
                                    <i class="fa fa-circle-o"></i>
                                    <span>{{ trans('labels.backend.access.roles.management') }}</span>
                                </a>
                            </li>
                        @endauth

                        @permission('manage-permissions')
                        <li class="{{ Active::pattern('admin/access/permission*') }}">
                            <a href="{{ route('admin.access.permission.index') }}">
                                <i class="fa fa-circle-o"></i>
                                <span>{{ trans('labels.backend.access.permissions.management') }}</span>
                            </a>
                        </li>
                        @endauth
                    </ul>
                </li>
            @endauth

            <li class="{{ Active::pattern('admin/spaces*') }}">
                <a href="{{ route('admin.spaces.index') }}">
                    <i class="fa  fa-map-marker"></i>
                    <span>{{ trans('labels.backend.spaces.management') }}</span>
                </a>
            </li>

            <li class="{{ Active::pattern('admin/posts*') }}">
                <a href="{{ route('admin.posts.index') }}">
                    <i class="fa fa-align-justify"></i>
                    <span>{{ trans('labels.backend.posts.management') }}</span>
                </a>
            </li>

            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>

            <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/log-viewer') }}">
                        <a href="{{ route('admin.log-viewer::dashboard') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.dashboard') }}</span>
                        </a>
                    </li>

                    <li class="{{ Active::pattern('admin/log-viewer/logs') }}">
                        <a href="{{ route('admin.log-viewer::logs.list') }}">
                            <i class="fa fa-circle-o"></i>
                            <span>{{ trans('menus.backend.log-viewer.logs') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section><!-- /.sidebar -->
</aside>
