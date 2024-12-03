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

                        <h1 class="display-2 text-capitalize text-white mb-4">Quick Solution!</h1>
                        <p class="mb-5 fs-5">We provide quick solutions to fix bugs and tech issues, ensuring your system gets back up and running smoothly without prolonged downtime.
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#contact-section">Submit A Bug Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="templates/img/home.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">

                        <h1 class="display-2 text-capitalize text-white mb-4">Seamless Repairs</h1>
                        <p class="mb-5 fs-5">Our team of experts is ready to provide seamless repairs for any technical issues, ensuring your business operations remain efficient and uninterrupted.
                        </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#contact-section">Submit A Bug Report</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="templates/img/home2.jpg" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="display-2 text-capitalize text-white mb-4">Smart Solutions</h1>
                        <p class="mb-5 fs-5">With our smart solutions approach, we not only resolve existing issues but also identify and prevent potential problems in the future, ensuring your systems remain optimized at all times.</p>
                        <div class="d-flex align-items-center justify-content-center">
                            <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#contact-section">Submit A Bug Report</a>
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
                <h5 class="section-about-title pe-3">About Us</h5>
                <h1 class="mb-4">Welcome to <span class="text-primary">SI-TIKET</span></h1>
                <p class="mb-4">We are a team of professionals specializing in solving various technology issues, including hardware, networks, SAP, and user access. We address hardware problems, ensuring your devices function optimally and avoid operational disruptions. For networks, we offer reliable connectivity solutions, ensuring smooth communication and data flow within your business. We also have expertise in SAP implementation and maintenance, supporting your business systems to be more efficient and integrated.</p>
                <p class="mb-4">Additionally, we ensure secure and controlled user access, keeping your systems and data protected. With a fast and intelligent approach, we are ready to provide the best solutions for any technical challenges you face, allowing your business to operate seamlessly without interruptions.</p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Services Start -->
<div class="container-fluid bg-light service py-5" id="services-section">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Services</h5>
            <h1 class="mb-0">Our Services</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                            <div class="service-content text-end">
                                <h5 class="mb-4">Hardware</h5>
                                <p class="mb-0">Installation, maintenance, and upkeep of hardware to ensure your systems function optimally.</p>
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
                                <p class="mb-0">Reliable networking solutions to enhance your company's connectivity and data access speed.</p>
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
                                <p class="mb-0">Secure user access management to protect sensitive data and ensure appropriate access for each user.</p>
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
                                <p class="mb-0">SAP implementation and support to help your business operate more efficiently and in an integrated manner.</p>
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
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="templates/img/explore-tour-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Weekend Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="templates/img/explore-tour-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Holiday Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="templates/img/explore-tour-3.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Road Trip</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="tour-offer bg-info">15% Off</div>
                                <div class="national-plus-icon">
                                    <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="templates/img/explore-tour-4.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Historical Trip</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="templates/img/explore-tour-5.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Family Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="tour-offer bg-warning">50% Off</div>
                                <div class="national-plus-icon">
                                    <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="national-item">
                                <img src="templates/img/explore-tour-6.jpg" class="img-fluid w-100 rounded" alt="Image">
                                <div class="national-content">
                                    <div class="national-info">
                                        <h5 class="text-white text-uppercase mb-2">Beach Tour</h5>
                                        <a href="#" class="btn-hover text-white">View All Place <i class="fa fa-arrow-right ms-2"></i></a>
                                    </div>
                                </div>
                                <div class="national-plus-icon">
                                    <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="InternationalTab-2" class="tab-pane fade show p-0">
                    <div class="InternationalTour-carousel owl-carousel">
                        <div class="international-item">
                            <img src="templates/img/explore-tour-1.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="international-content">
                                <div class="international-info">
                                    <h5 class="text-white text-uppercase mb-2">Australia</h5>
                                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 8 Cities</a>
                                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>143+ Tour Places</span></a>
                                </div>
                            </div>
                            <div class="tour-offer bg-success">30% Off</div>
                            <div class="international-plus-icon">
                                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="international-item">
                            <img src="templates/img/explore-tour-2.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="international-content">
                                <div class="international-info">
                                    <h5 class="text-white text-uppercase mb-2">Germany</h5>
                                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 12 Cities</a>
                                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>21+ Tour Places</span></a>
                                </div>
                            </div>
                            <div class="international-plus-icon">
                                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="international-item">
                            <img src="templates/img/explore-tour-3.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="international-content">
                                <div class="tour-offer bg-warning">45% Off</div>
                                <div class="international-info">
                                    <h5 class="text-white text-uppercase mb-2">Spain</h5>
                                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 9 Cities</a>
                                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>133+ Tour Places</span></a>
                                </div>
                            </div>
                            <div class="international-plus-icon">
                                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="international-item">
                            <img src="templates/img/explore-tour-4.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="international-content">
                                <div class="international-info">
                                    <h5 class="text-white text-uppercase mb-2">Japan</h5>
                                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 8 Cities</a>
                                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>137+ Tour Places</span></a>
                                </div>
                            </div>
                            <div class="international-plus-icon">
                                <a href="#" class="my-auto"><i class="fas fa-link fa-2x text-white"></i></a>
                            </div>
                        </div>
                        <div class="international-item">
                            <img src="templates/img/explore-tour-5.jpg" class="img-fluid w-100 rounded" alt="Image">
                            <div class="international-content">
                                <div class="tour-offer bg-info">70% Off</div>
                                <div class="international-info">
                                    <h5 class="text-white text-uppercase mb-2">London</h5>
                                    <a href="#" class="btn-hover text-white me-4"><i class="fas fa-map-marker-alt me-1"></i> 17 Cities</a>
                                    <a href="#" class="btn-hover text-white"><i class="fa fa-eye ms-2"></i> <span>26+ Tour Places</span></a>
                                </div>
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


<div class="container-fluid contact bg-light py-5" id="contact-section">
    <div class="container py-5">
        <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            <h5 class="section-title px-3">Contact Us</h5>
            <h1 class="mb-0">Contact For Any Query</h1>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-lg-4">
                <div class="bg-white rounded p-4">
                    <div class="text-center mb-4">
                        <i class="fa fa-map-marker-alt fa-3x text-primary"></i>
                        <h4 class="text-primary">
                            <Address></Address>
                        </h4>
                        <p class="mb-0">Gn. Antasari, Kec. Simpang Empat, Kabupaten Tanah Bumbu, Kalimantan Selatan 72211
                    </div>
                    <div class="text-center mb-4">
                        <i class="fa fa-phone-alt fa-3x text-primary mb-3"></i>
                        <h4 class="text-primary">Mobile</h4>
                        <p class="mb-0">+012 345 67890</p>
                        <p class="mb-0">+012 345 67890</p>
                    </div>

                    <div class="text-center">
                        <i class="fa fa-envelope-open fa-3x text-primary mb-3"></i>
                        <h4 class="text-primary">Email</h4>
                        <p class="mb-0">info@example.com</p>
                        <p class="mb-0">info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <h3 class="mb-2">Submit A Bug Report</h3>
                <p class="mb-4">Feel free to contact us if you encounter any issues or need technical assistance. We are ready to help you resolve various challenges related to hardware, networking, SAP, and user access.</p>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control border-0" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="subject" placeholder="Subject">
                                <label for="subject">No Phone</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control border-0" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control border-0" placeholder="Leave a message here" id="message" style="height: 160px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{-- <!-- Packages Start -->
      
        <!-- Packages End --> --}}










@endsection
