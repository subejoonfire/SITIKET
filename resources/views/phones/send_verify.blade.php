<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('loginTemplate/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ url('loginTemplate/css/owl.carousel.min.css') }}">
    <link rel="icon" type="image/jpeg" href="{{ url('JG.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ url('loginTemplate/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('loginTemplate/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@200..700&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <title>Verifikasi OTP | Page</title>
    <style>
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
        }

        .blue-section img.illustration {
            max-width: 70%;
            margin-top: auto;
            margin-bottom: 20px;
        }

        .blue-section h3 {
            font-family: 'Vollkorn', serif;
            font-weight: bold;
            font-size: 33px;
            margin: 10px 0;
        }

        .blue-section h2 {
            font-family: 'Esteban', serif;
            font-size: 27px;
            font-weight: bold;
            margin: 5px 0;
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

        #changePhoneLink {
            cursor: pointer;
            text-decoration: underline;
        }

        #changePhoneForm {
            display: none;
        }

        .btn-block {
            height: auto;
            padding: 10px 15px;
        }

        .btn-primary {
            font-size: 14px;
        }

        .small-button {
            padding: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 12px;
            width: auto;
            background-color: #0078cd;
            color: white;
            border: none;
            border-radius: 2px;
        }

        .button-container-phone {
            display: flex;
            text-align: center;
            justify-content: center;
        }

    </style>
</head>
<body>
    <div class="half">
        <!-- Bagian kiri: Blue Section -->
        <div class="blue-section">
            <img src="{{ url('loginTemplate/images/SI-TIKET.png') }}" alt="Jhonlin Group Logo" class="logo">
            <h3>SELAMAT DATANG</h3>
            <h2>Sistem Informasi</h2>
            <h2>Pelayanan</h2>
            <img src="{{ url('loginTemplate/images/GCOMPUTER.png') }}" alt="illustration" class="illustration">
        </div>

        <!-- Bagian kanan: Login Section -->
        <div class="login-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-4">
                                <h3><strong>Verifikasi OTP</strong></h3>
                                <p class="text-muted">Silakan masukkan OTP yang telah kami kirimkan ke nomor HP Anda.</p>
                            </div>
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role=" alert">
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
                            @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Kesalahan!</strong> {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <div class="text-center mt-3">
                                <small>
                                    Nomor HP Anda: {{ substr(auth()->user()->phone, 0, 3) . '****' . substr(auth()->user()->phone, -3) }}
                                </small>
                                <br>
                                <small>
                                    <a href="#" id="changePhoneLink">Ganti Nomor HP</a>
                                </small>
                            </div>
                            <div id="changePhoneForm" class="mt-3">
                                <form action="{{ url('change_phone') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="phone" placeholder="Masukkan Nomor HP Baru" required>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="small-button"><span>Ganti Nomor</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <form action="{{ url('phone_verify') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="otp" placeholder="Masukkan OTP" required>
                                </div>
                                <div class="text-center gap-3">
                                    <button type="submit" class="btn btn-primary btn-lg text-green">Verifikasi OTP</button>
                                </div>
                            </form>

                            <!-- Tautan Kirim Ulang -->
                            <div class="text-center mt-3">
                                <small>Jika Anda tidak menerima OTP, <a href="{{ url('phone/send_otp') }}">kirim ulang OTP</a>.</small>
                            </div>

                            <!-- Tautan Ganti Nomor HP -->

                            <!-- Form Ganti Nomor HP -->


                            <!-- Tautan Keluar -->
                            <div class="text-center mt-3">
                                <small><a href="{{ url('logout') }}">Keluar</a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="loginTemplate/js/jquery-3.3.1.min.js"></script>
    <script src="loginTemplate/js/popper.min.js"></script>
    <script src="loginTemplate/js/bootstrap.min.js"></script>
    <script src="loginTemplate/js/main.js"></script>
    <script>
        document.getElementById('changePhoneLink').addEventListener('click', function(event) {
            event.preventDefault();
            const changePhoneForm = document.getElementById('changePhoneForm');
            if (changePhoneForm.style.display === 'none' || changePhoneForm.style.display === '') {
                changePhoneForm.style.display = 'block';
            } else {
                changePhoneForm.style.display = 'none';
            }
        });

    </script>
</body>
</html>
