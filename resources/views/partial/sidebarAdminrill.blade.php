<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
           
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('dashboard_admin') ? 'active' : '' }}">
                    <a href="{{ url('admin/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('user') ? 'active' : '' }}">
                        <a href="{{ url('admin/user') }}">
                        <i class="fas fa-user-alt"></i>
                        <p>User</p>
                    </a>
                  
                </li>
            </ul>

        </div>
    </div>
</div>
<!-- End Sidebar -->
