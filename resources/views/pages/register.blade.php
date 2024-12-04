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

    <title> Register | Page</title>
</head>
<body>
    <div class="d-md-flex half">
        <div class="bg" style="background-image: url('loginTemplate/images/bg_1.png');"></div>
        <div class="contents">
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
                                <input type="submit" value="Register" class="btn btn-block btn-primary">
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
