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
                        <span class="badge badge-count">5</span>
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
<style>
    .badge-count {
        background-color: #ff6161; 
        color: white; 
        font-size: 12px; 
        border-radius: 50%; 
        padding: 3px 7px; 
        line-height: 1;
        display: inline-block; 
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
    }
</style>