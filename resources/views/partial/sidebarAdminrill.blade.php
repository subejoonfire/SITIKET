<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.user') ? 'active' : '' }}">
                    <a href="{{ route('admin.user') }}">
                        <i class="fas fa-user-alt"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.category') ? 'active' : '' }}">
                    <a href="{{ route('admin.category') }}">
                        <i class="fas fa-box"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.depart') ? 'active' : '' }}">
                    <a href="{{ route('admin.depart') }}">
                        <i class="fas fa-building"></i>
                        <p>Department</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
