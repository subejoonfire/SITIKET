<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout/header')
</head>
<body>
    <div class="wrapper">
        <div class="main-header" data-background-color>
            <div class="logo-header">
                <a href="/" class="logo">
                    <span class="navbar-brand" style="color: white;">SI-TIKET</span>
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                </button>
                <button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded"><i class="fa fa-bars"></i></button>
                </div>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">
                    <div class="collapse" id="search-nav"></div>
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        @include('layout/profile')
                    </ul>
                </div>
            </nav>
        </div>
        @include('partial.sidebar.pic')
        @yield('content')
    </div>
</body>
@include('layout/footer')
</html>
