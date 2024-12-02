<!-- Sidebar -->
<div class="sidebar">

    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ url('back-end/assets/img/profile.jpg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            Hizrian
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ url('department/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('tiket_*') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-ticket-alt"></i>
                        <p>Tiket</p>
                        <span class="caret"></span>
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
