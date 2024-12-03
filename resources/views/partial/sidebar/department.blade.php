<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">

            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('department.dashboard') ? 'active' : '' }}">
                    <a href="{{ url('department') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('department.utama') || request()->routeIs('department.setuju') || request()->routeIs('department.proses') || request()->routeIs('department.selesai') || request()->routeIs('department.tolak') ? 'active' : '' }}">
                    <!-- Link Menu Tiket yang akan mengarah ke halaman utama tiket -->
                    <a href="{{ url('department/tiket') }}" class="{{ request()->routeIs('department.utama') || request()->routeIs('department.setuju') || request()->routeIs('department.proses') || request()->routeIs('department.selesai') || request()->routeIs('department.tolak') ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt"></i>
                        <p>Tiket</p>
                    </a>
                    <div class="{{ request()->routeIs('department.utama') || request()->routeIs('department.setuju') || request()->routeIs('department.proses') || request()->routeIs('department.selesai') || request()->routeIs('department.tolak') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('department.setuju') ? 'active' : '' }}">
                                <a href="{{ url('department/setuju') }}">
                                    <span class="sub-item">Disetujui</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department.proses') ? 'active' : '' }}">
                                <a href="{{ url('department/proses') }}">
                                    <span class="sub-item">Proses</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department.selesai') ? 'active' : '' }}">
                                <a href="{{ url('department/selesai') }}">
                                    <span class="sub-item">Selesai</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department.tolak') ? 'active' : '' }}">
                                <a href="{{ url('department/tolak') }}">
                                    <span class="sub-item">Ditolak</span>
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
