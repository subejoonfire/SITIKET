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
                <li class="nav-item {{ request()->routeIs('admin/tiket') || request()->routeIs('admin.setuju') || request()->routeIs('admin.proses') || request()->routeIs('admin.selesai') || request()->routeIs('admin.tolak') ? 'active' : '' }}">
                    <!-- Link Menu Tiket yang akan mengarah ke halaman utama tiket -->
                    <a href="{{ url('admin/tiket') }}" class="{{ request()->routeIs('admin.tiket') || request()->routeIs('admin.setuju') || request()->routeIs('admin.proses') || request()->routeIs('admin.selesai') || request()->routeIs('admin.tolak') ? 'active' : '' }}">
                        <i class="fas fa-ticket-alt"></i>
                        <p>Tiket</p>
                    </a>
                    <div class="{{ request()->routeIs('admin/utama') || request()->routeIs('admin.setuju') || request()->routeIs('admin.proses') || request()->routeIs('admin.selesai') || request()->routeIs('admin.tolak') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin/tiket/approved') ? 'active' : '' }}">
                                <a href="{{ url('admin/approved/') }}">
                                    <span class="sub-item">Disetujui</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin/tiket/processed') ? 'active' : '' }}">
                                <a href="{{ url('admin/processed') }}">
                                    <span class="sub-item">Proses</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin/tiket/declined') ? 'active' : '' }}">
                                <a href="{{ url('admin/declined') }}">
                                    <span class="sub-item">Ditolak</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin/tiket/done') ? 'active' : '' }}">
                                <a href="{{ url('admin/done') }}">
                                    <span class="sub-item">Selesai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> 
                {{-- <li class="nav-item {{ request()->is('admin/user') ? 'active' : '' }}">
                    <a href="{{ url('admin/user') }}">
                        <i class="fas fa-user-alt"></i>
                        <p>Pengguna</p>
                    </a>
                </li> --}}

                <li class="nav-item {{ request()->routeIs('admin/user') || request()->routeIs('admin.admin') || request()->routeIs('admin.user') || request()->routeIs('admin.pic') || request()->routeIs('admin.helpdesk') ? 'active' : '' }}">
                    <!-- Link Menu Tiket yang akan mengarah ke halaman utama tiket -->
                    <a href="{{ url('admin/user') }}" class="{{ request()->routeIs('admin.user') || request()->routeIs('admin.admin') || request()->routeIs('admin.user') || request()->routeIs('admin.pic') || request()->routeIs('admin.helpdesk') ? 'active' : '' }}">
                        <i class="fas fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                    <div class="{{ request()->routeIs('admin/utama') || request()->routeIs('admin.setuju') || request()->routeIs('admin.proses') || request()->routeIs('admin.selesai') || request()->routeIs('admin.tolak') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('admin/admin') ? 'active' : '' }}">
                                <a href="{{ url('admin/ladmin') }}">
                                    <span class="sub-item">Admin</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin/user') ? 'active' : '' }}">
                                <a href="{{ url('admin/luser') }}">
                                    <span class="sub-item">User</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin/pic') ? 'active' : '' }}">
                                <a href="{{ url('admin/lpic') }}">
                                    <span class="sub-item">PIC</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('admin/helpdesk') ? 'active' : '' }}">
                                <a href="{{ url('admin/lhelpdesk') }}">
                                    <span class="sub-item">Helpdesk</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> 


                <li class="nav-item {{ request()->is('admin/module') ? 'active' : '' }}">
                    <a href="{{ url('admin/module') }}">
                        <i class="fas fa-file-alt"></i>
                        <p>Modul</p>
                    </a>
                </li>                
                <li class="nav-item {{ request()->is('admin/category') ? 'active' : '' }}">
                    <a href="{{ url('admin/category') }}">
                        <i class="fas fa-layer-group"></i>
                        <p>Kategori</p>
                    </a>
                </li>                
                           
                {{-- <li class="nav-item {{ request()->is('admin/pic') ? 'active' : '' }}">
                    <a href="{{ url('admin/pic') }}">
                <li class="nav-item {{ request()->is('admin/category') ? 'active' : '' }}">
                <a href="{{ url('admin/category') }}">
                    <i class="fas fa-box"></i>
                    <p>Category</p>
                </a>
                </li> --}}
                <li class="nav-item {{ request()->is('admin/department') ? 'active' : '' }}">
                    <a href="{{ url('admin/department') }}">
                        <i class="fas fa-users"></i>
                        <p>Departemen</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/company') ? 'active' : '' }}">
                    <a href="{{ url('admin/company') }}">
                        <i class="fas fa-building"></i>
                        <p>Perusahaan</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/priority') ? 'active' : '' }}">
                    <a href="{{ url('admin/priority') }}">
                        <i class="fas fa-clipboard"></i>
                        <p>Prioritas</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
