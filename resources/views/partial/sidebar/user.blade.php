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
                        <span class="badge badge-count">5</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<style>
    .badge-count {
        background-color: #ff6161; /* Ubah warna menjadi merah */
        color: white; /* Warna teks putih */
        font-size: 12px; /* Ukuran teks */
        border-radius: 50%; /* Membuat lingkaran */
        padding: 3px 7px; /* Padding untuk ukuran badge */
        line-height: 1;
        display: inline-block; /* Menjaga agar badge tetap proporsional */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Efek bayangan */
    }
</style>