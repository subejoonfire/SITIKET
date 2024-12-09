<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('department/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('department') }}">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('department/utama') || request()->routeIs('department.setuju') || request()->routeIs('department.proses') || request()->routeIs('department.selesai') || request()->routeIs('department.tolak') ? 'active' : '' }}">
                    <!-- Link Menu Tiket yang akan mengarah ke halaman utama tiket -->
                    <a href="{{ url('department/ticket') }}" class="{{ request()->routeIs('department.ticket') || request()->routeIs('department.setuju') || request()->routeIs('department.proses') || request()->routeIs('department.selesai') || request()->routeIs('department.tolak') ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt"></i>
                        <p>Tiket</p>
                    </a>
                    <div class="{{ request()->routeIs('department/utama') || request()->routeIs('department.setuju') || request()->routeIs('department.proses') || request()->routeIs('department.selesai') || request()->routeIs('department.tolak') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('department/ticket/approved') ? 'active' : '' }}">
                                <a href="{{ url('department/ticket/approved/') }}">
                                    <span class="sub-item">Disetujui</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department/ticket/processed') ? 'active' : '' }}">
                                <a href="{{ url('department/ticket/processed') }}">
                                    <span class="sub-item">Proses</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department/ticket/declined') ? 'active' : '' }}">
                                <a href="{{ url('department/ticket/declined') }}">
                                    <span class="sub-item">Ditolak</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department/ticket/done') ? 'active' : '' }}">
                                <a href="{{ url('department/ticket/done') }}">
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
