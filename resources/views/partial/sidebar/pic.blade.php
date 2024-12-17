<!-- Sidebar -->
@include('css/pic/dashboard')
<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('pic/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('pic') }}">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('pic/utama') || request()->routeIs('pic.setuju') || request()->routeIs('pic.proses') || request()->routeIs('pic.selesai') || request()->routeIs('pic.tolak') ? 'active' : '' }}">
                    <!-- Link Menu Tiket yang akan mengarah ke halaman utama tiket -->
                    <a href="{{ url('pic/ticket') }}" class="{{ request()->routeIs('pic.ticket') || request()->routeIs('pic.setuju') || request()->routeIs('pic.proses') || request()->routeIs('pic.selesai') || request()->routeIs('pic.tolak') ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt"></i>
                        <p>Tiket</p>
                        <span class="badge badge-count">5</span>
                    </a>
                    <div class="{{ request()->routeIs('pic/utama') || request()->routeIs('pic.setuju') || request()->routeIs('pic.proses') || request()->routeIs('pic.selesai') || request()->routeIs('pic.tolak') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('pic/ticket/approved') ? 'active' : '' }}">
                                <a href="{{ url('pic/ticket/approved/') }}">
                                    <span class="sub-item">Disetujui</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('pic/ticket/processed') ? 'active' : '' }}">
                                <a href="{{ url('pic/ticket/processed') }}">
                                    <span class="sub-item">Proses</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('pic/ticket/declined') ? 'active' : '' }}">
                                <a href="{{ url('pic/ticket/declined') }}">
                                    <span class="sub-item">Ditolak</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('pic/ticket/done') ? 'active' : '' }}">
                                <a href="{{ url('pic/ticket/done') }}">
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
