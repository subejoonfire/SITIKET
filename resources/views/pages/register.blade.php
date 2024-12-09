<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="loginTemplate/fonts/icomoon/style.css">

    <link rel="stylesheet" href="loginTemplate/css/owl.carousel.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('JG.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="loginTemplate/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="loginTemplate/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Oswald:wght@200..700&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&family=Pridi:wght@200;300;400;500;600;700&family=Readex+Pro:wght@160..700&family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pridi:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Parkinsans:wght@300..800&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Doppio+One&family=Esteban&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend+Giga:wght@100..900&family=Parkinsans:wght@300..800&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&family=Rokkitt:ital,wght@0,100..900;1,100..900&family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">   
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Pridi:wght@200;300;400;500;600;700&family=Righteous&display=swap" rel="stylesheet">
    <title> Register | Page</title><style>
        body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

html, body {
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
    flex: 2;
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
            <img src="loginTemplate/images/GCOMPUTER.png" alt="illustration  "class="illustration">
        </div>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3><strong>Register</strong></h3>
                            </div>
                            <form action="{{ url('register') }}" method="post">
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
                                @csrf
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" id="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nomor HP</label>
                                    <input type="tel" name="phone" class="form-control" placeholder="Masukkan nomor HP" id="phone" pattern="\+?[0-9]{10,15}" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" id="password" required>
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Masukkan ulang password" id="password_confirmation" required>
                                </div>
                                <div class="d-sm-flex mb-5 align-items-center">
                                    <span class="ml-auto">
                                        <a href="{{ url('login') }}" class="forgot-pass">Sudah punya akun? Login</a>
                                    </span>
                                </div>
                                <input type="submit" value="Register" class="btn btn-block btn-success">
                            </form>
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
