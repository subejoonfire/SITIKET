<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">

                <li class="nav-item {{ request()->routeIs('user/dashboard') ? 'active' : '' }}">
                    <a href="{{ url('user') }}">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                        @if ($notification != 0)
                        <span class="badge badge-count">{{ $notification }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
