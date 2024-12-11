<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('helpdesk') }}">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('validation') ? 'active' : '' }}">
                    <a href="{{ url('helpdesk/validation') }}">
                        <i class="fas fa-clipboard-check"></i>
                        <p>Validasi</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('history') ? 'active' : '' }}">
                    <a href="{{ url('helpdesk/history') }}">
                        <i class="fas fa-hourglass-half"></i>
                        <p>Riwayat Validasi</p>
                    </a>
                </li>
    
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
