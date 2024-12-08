<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                    <a href="{{ url('admin') }}">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/user') ? 'active' : '' }}">
                    <a href="{{ url('admin/user') }}">
                        <i class="fas fa-user-alt"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                {{-- <li class="nav-item {{ request()->is('admin/category') ? 'active' : '' }}">
                <a href="{{ url('admin/category') }}">
                    <i class="fas fa-box"></i>
                    <p>Category</p>
                </a>
                </li> --}}
                <li class="nav-item {{ request()->is('admin/pic') ? 'active' : '' }}">
                    <a href="{{ url('admin/pic') }}">
                        <i class="fas fa-building"></i>
                        <p>Departemen</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>
<!-- End Sidebar -->
