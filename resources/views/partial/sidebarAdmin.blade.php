<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
           
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('department.dashboard') ? 'active' : '' }}">
                    <a href="{{ url('department/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('department.tiket_utama') || request()->routeIs('department.tiket_setuju') || request()->routeIs('department.tiket_proses') || request()->routeIs('department.tiket_selesai') || request()->routeIs('department.tiket_tolak') ? 'active' : '' }}">
                    <!-- Link Menu Tiket yang akan mengarah ke halaman utama tiket -->
                    <a href="tiket" class="{{ request()->routeIs('department.tiket_utama') || request()->routeIs('department.tiket_setuju') || request()->routeIs('department.tiket_proses') || request()->routeIs('department.tiket_selesai') || request()->routeIs('department.tiket_tolak') ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt"></i>
                        <p>Tiket</p>
                    </a>
                    <div class="collapse {{ request()->routeIs('department.tiket_utama') || request()->routeIs('department.tiket_setuju') || request()->routeIs('department.tiket_proses') || request()->routeIs('department.tiket_selesai') || request()->routeIs('department.tiket_tolak') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('department.tiket_setuju') ? 'active' : '' }}">
                                <a href="{{ url('department/setuju') }}">
                                    <span class="sub-item">Disetujui</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department.tiket_proses') ? 'active' : '' }}">
                                <a href="{{ url('department/proses') }}">
                                    <span class="sub-item">Proses</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department.tiket_selesai') ? 'active' : '' }}">
                                <a href="{{ url('department/selesai') }}">
                                    <span class="sub-item">Selesai</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('department.tiket_tolak') ? 'active' : '' }}">
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
