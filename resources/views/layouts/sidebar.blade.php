<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ URL::asset('../backend/dist/img/rstar.png') }}" alt="AdminLTE Logo" class="brand-image ">
        <span class="brand-text font-weight-light">R. star
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
            

                <!-- User Section -->
                @can('user-list')
                <li class="nav-header">User</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('user-list')
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}"
                                class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        @endcan
                        @can('user-create')
                        <li class="nav-item">
                            <a href="{{ route('users.create') }}"
                                class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create User</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('student-list')
                <li class="nav-header">Student</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Student Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('student-list')
                        <li class="nav-item">
                            <a href="{{ route('users.data.index') }}"
                                class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Student List</p>
                            </a>
                        </li>
                        @endcan
                        @can('student-create')
                        <li class="nav-item">
                            <a href="{{ route('users.data.create') }}"
                                class="nav-link {{ request()->routeIs('users.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Student</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan
                <!-- Role Section -->
                @can('role-list')
                <li class="nav-header">Role</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Role
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('role-list')
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}"
                                class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role List</p>
                            </a>
                        </li>
                        @endcan
                        @can('role-create')
                        <li class="nav-item">
                            <a href="{{ route('roles.create') }}"
                                class="nav-link {{ request()->routeIs('roles.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Role</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcan

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
