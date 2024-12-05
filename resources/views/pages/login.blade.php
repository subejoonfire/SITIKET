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
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <title>Login | Page</title>
    <style>
        .half {
            display: flex;
            height: 100vh;
        }
        .blue-section {
            background: #70c55b;
            background-size: 40px 40px;
            color: rgb(255, 255, 255);
            flex: 0.4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
         .blue-section img.logo {
            max-width: 30%;
            margin-top: 20%; 
            margin-bottom: 30px;
        }
        .blue-section img.illustration {
            max-width: 300px;
            margin-top: 20px;
            margin-bottom: 100%;
        }
        .blue-section img {
            max-width: 200px;
            margin-bottom: 30%;
            max-height: 103%;
            
        }

        .blue-section .illustration {
            max-width: 250px;
            margin-top: 50px;

        }.blue-section img.logo {
            max-width: 450px;
            margin-bottom: 0%;
            margin-top: -15%;
            object-fit: contain; 
        }

        .blue-section img.illustration {
            max-width: 300px;
            margin-top: auto; 
            margin-bottom: 40px; 
            object-fit: flex; 
            align-self: flex; 
        }

        .login-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .blue-section img.logo {
            object-fit: contain;
        }

        .blue-section img.illustration {
            object-fit: contain;
        }
        .blue-section h3 {
            font-family: 'Alata',serif;

            font-weight: 20; 
            font-size: 35px; 
            margin: 30px 0; 
            line-height: 0.3;
        }
    </style>
</head>
<body>
    <div class="half">
        <div class="blue-section">
            <img src="loginTemplate/images/SI-TIKET.png" alt="Jhonlin Group Logo" class="logo">
            <h3>Masuk Untuk Melangkah</h3>
                    <h3>Lebih Jauh Bersama Kami.</h3>
            <img src="loginTemplate/images/GCOMPUTER.png" alt="Illustration  "class="illustration">
        </div>
        <div class="login-section">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="form-block mx-auto">
                            <div class="text-center mb-5">
                                <h3><strong>Login</strong></h3>
                            </div>
                            <form action="{{ route('login') }}" method="post">
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
                                @csrf
                                <div class="form-group first">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" id="email" required>
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" id="password">
                                </div>

                                <div class="d-sm-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto">
                                        <a href="{{ route('register') }}" class="forgot-pass">Belum punya akun? Daftar</a>
                                    </span>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-block btn-primary">
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
