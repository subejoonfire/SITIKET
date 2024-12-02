<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
           
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('department/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('tiket_*') ? 'active' : '' }}">
                    <!-- Link Menu Tiket yang akan mengarah ke halaman utama tiket -->
                    <a href="/tiket" class="{{ request()->routeIs('tiket_utama') ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt"></i>
                        <p>Tiket</p>
                    </a>
                    <div class="collapse {{ request()->routeIs('tiket_*') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('tiket_setuju') ? 'active' : '' }}">
                                <a href="{{ url('setujui') }}">
                                    <span class="sub-item">Disetujui</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('tiket_proses') ? 'active' : '' }}">
                                <a href="{{ url('proses') }}">
                                    <span class="sub-item">Proses</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('tiket_selesai') ? 'active' : '' }}">
                                <a href="{{ url('selesai') }}">
                                    <span class="sub-item">Selesai</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('tiket_tolak') ? 'active' : '' }}">
                                <a href="{{ url('tolak') }}">
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
