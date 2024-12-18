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
                <li class="nav-item {{ request()->is('admin/ticket*') ? 'active' : '' }}">
                    <a href="#ticketSubmenu" onclick="window.location.href = '{{ url('admin/ticket') }}'" data-toggle="collapse" class="collapsed">
                        <i class="fas fa-ticket-alt"></i>
                        <p>Tiket</p>
                    </a>
                    <div class="collapse {{ request()->is('admin/ticket*') ? 'show' : '' }}" id="ticketSubmenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/ticket/approved') ? 'active' : '' }}">
                                <a href="{{ url('admin/ticket/approved') }}">
                                    <span class="sub-item">Disetujui</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/ticket/processed') ? 'active' : '' }}">
                                <a href="{{ url('admin/ticket/processed') }}">
                                    <span class="sub-item">Proses</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/ticket/declined') ? 'active' : '' }}">
                                <a href="{{ url('admin/ticket/declined') }}">
                                    <span class="sub-item">Ditolak</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/ticket/done') ? 'active' : '' }}">
                                <a href="{{ url('admin/ticket/done') }}">
                                    <span class="sub-item">Selesai</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('admin/user*') ? 'active' : '' }}">
                    <a href="#userSubmenu" onclick="window.location.href = '{{ url('admin/user') }}'" data-toggle="collapse" class="collapsed">
                        <i class="fas fa-user"></i>
                        <p>Pengguna</p>
                    </a>
                    <div class="collapse {{ request()->is('admin/user*') ? 'show' : '' }}" id="userSubmenu">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin/user/admin') ? 'active' : '' }}">
                                <a href="{{ url('admin/user/admin') }}">
                                    <span class="sub-item">Admin</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/user/user') ? 'active' : '' }}">
                                <a href="{{ url('admin/user/user') }}">
                                    <span class="sub-item">User</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/user/pic') ? 'active' : '' }}">
                                <a href="{{ url('admin/user/pic') }}">
                                    <span class="sub-item">PIC</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('admin/user/helpdesk') ? 'active' : '' }}">
                                <a href="{{ url('admin/user/helpdesk') }}">
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
