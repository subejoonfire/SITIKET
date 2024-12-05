@extends('layout.mainLanding')

@section('content')

<!-- Carousel Start -->
<div class="carousel-header" id="beranda-section">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="templates/img/home3.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">

                        <h1 class="display-2 text-capitalize text-white mb-4">Solusi Cepat!</h1>
                        <p class="mb-5 fs-5">Kami menyediakan solusi cepat untuk memperbaiki masalah teknis, memastikan sistem Anda kembali berjalan lancar tanpa gangguan.
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="/login">Submit A Bug Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="templates/img/home.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">

                        <h1 class="display-2 text-capitalize text-white mb-4">Perbaikan Cepat</h1>
                        <p class="mb-5 fs-5">Kami hadir dengan solusi cepat untuk mengatasi masalah teknis, agar sistem Anda kembali normal tanpa kendala.
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="/login">Submit A Bug Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="templates/img/home2.jpg" class="img-fluid" alt="Gambar">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="display-2 text-capitalize text-white mb-4">Solusi Pintar</h1>
                        <p class="mb-5 fs-5">Dengan pendekatan solusi pintar kami, kami tidak hanya menyelesaikan masalah yang ada, tetapi juga mengidentifikasi dan mencegah potensi masalah di masa depan, memastikan sistem Anda tetap optimal setiap saat.</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="/login">Laporkan Bug</a>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
</div>

<!-- Navbar & Hero End -->

<!-- About Start -->
<div class="container-fluid about py-5" id="about-section">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="templates/img/Picture1.jpg" class="img-fluid w-100 h-100" alt="">
                </div>
            </div>
            <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(templates/img/about-img-1.png);">
                <h5 class="section-about-title pe-3">Tentang Kami</h5>
                <h1 class="mb-4">Selamat Datang Di <span class="text-primary">SI-TIKET</span></h1>
                <p class="mb-4">Ingin meningkatkan bisnis Anda dan menyelesaikan lebih banyak hal? Kami siap membantu! Tim kami dapat menyelesaikan semua masalah teknis Anda, besar maupun kecil. Mulai dari komputer yang rusak hingga jaringan yang lambat, kami pastikan bisnis Anda berjalan lancar sehingga Anda bisa fokus pada hal-hal yang benar-benar penting.</p>
                <p class="mb-4">kami menjaga akses pengguna dengan aman dan terkendali, melindungi sistem serta data Anda. Dengan pendekatan yang cepat dan cerdas, kami siap memberikan solusi terbaik untuk setiap tantangan teknis yang Anda hadapi, memastikan bisnis Anda beroperasi tanpa gangguan.</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Services Start -->
<div class="container-fluid bg-light service py-5" id="services-section">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Layanan</h5>
            <h1 class="mb-0">Pelayanan Kami</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Hardware</h5>
                                <p class="mb-0">Instalasi, pemeliharaan, dan pemeliharaan perangkat keras untuk memastikan sistem Anda berfungsi secara optimal.</p>
                            </div>
                            <div class="service-icon p-4">
                                <i class="fa fa-desktop fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Networking</h5>
                                <p class="mb-0">Solusi jaringan yang andal untuk meningkatkan konektivitas dan kecepatan akses data perusahaan Anda.</p>
                            </div>
                            <div class="service-icon p-4">
                                <i class="fa fa-signal fa-4x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                            <div class="service-icon p-4">
                                <i class="fa fa-user-lock fa-4x text-primary"></i>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">User Access</h5>
                                <p class="mb-0">Manajemen akses pengguna yang aman untuk melindungi data sensitif dan memastikan akses yang sesuai untuk setiap pengguna.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                            <div class="service-icon p-4">
                                <i class="fa fa-server fa-4x text-primary"></i>
                            </div>
                            <div class="service-content">
                                <h5 class="mb-4">SAP</h5>
                                <p class="mb-0">Implementasi dan dukungan SAP untuk membantu bisnis Anda beroperasi lebih efisien dan terintegrasi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

<!-- Explore Tour Start -->
<div class="container-fluid ExploreTour py-5">
    <div class="container py-5">

        <div class="tab-class text-center">

            <div class="tab-content">
                <div id="NationalTab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="national-item">
                                <img src="templates/img/1.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Software</h5>
                                      
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a class="my-auto"></a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="national-item">
                                <img src="templates/img/2.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Development</h5>
                                        
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a class="my-auto"></a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="national-item">
                                <img src="templates/img/3.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">User Acces</h5>
                                       
                                    </div>
                                </div>
                              
                                <div class="national-plus-icon">
                                    <a class="my-auto"></a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="national-item">
                                <img src="templates/img/4.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Networking</h5>
                                       
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a  class="my-auto"></a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="national-item">
                                <img src="templates/img/5.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Hardware Repair</h5>
                                        
                                    </div>
                                </div>
                                
                                <div class="national-plus-icon">
                                    <a class="my-auto"></a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="national-item">
                                <img src="templates/img/6.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">SAP</h5>
                                       
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a class="my-auto"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                {{--  --}}
                            </div>
                            <div class="international-plus-icon">
                                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Explore Tour Start -->

{{-- <!-- Packages Start -->
      
        <!-- Packages End --> --}}










@endsection
