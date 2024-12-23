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

                <li class="nav-item {{ request()->routeIs('helpdesk/followup') ? 'active' : '' }}">
                    <a href="{{ url('helpdesk/followup') }}" class="{{ request()->routeIs('helpdesk/followup') ? 'active' : '' }}">
                        <i class="fas fa-inbox"></i>
                        <p>Tindak Lanjut</p>
                    </a>
                    <div class="{{ request()->routeIs('helpdesk/followup') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('helpdesk/followup/waiting') ? 'active' : '' }}">
                                <a href="{{ url('helpdesk/followup/waiting') }}">
                                    <span class="sub-item">Menunggu</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('helpdesk/followup/done') ? 'active' : '' }}">
                                <a href="{{ url('helpdesk/followup/done') }}">
                                    <span class="sub-item">Selesai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
