<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/jpeg" href="{{ asset('JG.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('loginTemplate/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ url('loginTemplate/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('loginTemplate/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('loginTemplate/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@200..700&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Pridi:wght@200;300;400;500;600;700&family=Readex+Pro:wght@160..700&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Parkinsans:wght@300..800&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Parkinsans:wght@300..800&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Parkinsans:wght@300..800&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Doppio+One&family=Esteban&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Parkinsans:wght@300..800&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Parkinsans:wght@300..800&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <title>Verifikasi | Page</title>
    <style>
        /* Gaya dasar */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        .half {
            display: flex;
            height: 100vh;
        }

        .blue-section {
            background: #70c55b;
            color: white;
            flex: 0.4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 10px;
            text-align: center;
        }

        .blue-section img.logo {
            max-width: 100%;
            margin-bottom: 10px;
            margin-top: 5%;
            position: relative;
            top: -4%;
        }

        .blue-section img.illustration {
            max-width: 70%;
            margin-top: auto;
            margin-bottom: 20px;
        }

        .blue-section h3 {
            font-family: 'Vollkorn', serif;
            font-weight: 300;
            font-size: 33px;
            font-weight: bold;
            margin: 10px 0;
            position: relative;
            top: -60px;
        }

        .blue-section h2 {
            font-family: 'esteban', serif;
            font-size: 27px;
            line-height: 1.2;
            font-weight: bold;
            margin: 5px 0;
            position: relative;
            top: -55px;
        }

        .login-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        @media screen and (max-width: 768px) {
            .half {
                flex-direction: column;
                height: auto;
            }

            .blue-section {
                flex: 1;
                padding: 20px;
            }

            .blue-section h3 {
                font-size: 18px;
            }

            .blue-section h2 {
                font-size: 20px;
            }

            .blue-section img.logo {
                max-width: 70%;
            }

            .blue-section img.illustration {
                max-width: 60%;
            }
        }

    </style>
</head>
<body>
    <div class="half">
        <div class="blue-section">
            <img src="loginTemplate/images/SI-TIKET.png" alt="Jhonlin Group Logo" class="logo">
            <h3>SELAMAT DATANG</h3>
            <h2>Sistem Informasi</h2>
            <h2>Pelayanan</h2>
            <img src="loginTemplate/images/GCOMPUTER.png" alt="illustration  " class="illustration">
        </div>
        <div class="login-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-4">
                                <h3><strong>Verifikasi Akun</strong></h3>
                                <p class="text-muted">Silakan verifikasi akun Anda dengan mengklik link yang telah kami kirimkan.</p>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses!</strong> {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Terjadi Kesalahan!</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="text-center gap-3">
                                <a href="{{ url('email_verify') }}" class="btn btn-primary btn-lg text-green text-decoration-none">
                                    <span style="color: white;">Kirim Link Verifikasi</span>
                                </a> </div>
                            <div class="text-center mt-3">
                                <small>Jika Anda tidak menerima email, periksa folder spam.</small>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <small><a href="{{ url('logout') }}">Keluar</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="loginTemplate/js/jquery-3.3.1.min.js"></script>
    <script src="loginTemplate/js/popper.min.js"></script>
    <script src="loginTemplate/js/bootstrap.min.js"></script>
    <script src="loginTemplate/js/main.js"></script>
</body>
</html>
