<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout/header')
</head>
<body>
    <div class="wrapper">
        <div class="main-header" data-background-color>
            <div class="logo-header">
                <a href="{{ url('/') }}" class="logo">
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
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                @if ($notification != 0)
                                <span class="notification">{{ $notification }}</span>
                                @endif
                            </a>
                            <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                                @if ($notification != 0)
                                <li>
                                    <div class="dropdown-title">Kamu punya {{ $notification }} pesan baru</div>
                                </li>
                                @else
                                <li>
                                    <div class="dropdown-title">Tidak ada pesan terbaru</div>
                                </li>
                                @endif
                                <li>
                                    <div class="message-notif-scroll scrollbar-outer">
                                        <div class="notif-center">
                                            @foreach ($notificationData as $item)
                                            <a href="{{ url('user/review/'. $item->idticket) }}">
                                                <div class="notif-img">
                                                    <img src="{{ url('storage/profiles/' . ($item->user_from->image == '' ? 'default.jpg' : $item->user_from->image)) }}" alt="Img Profile">
                                                </div>
                                                <div class="notif-content">
                                                    <span class="subject">{{ $item->user_from->name }}</span>
                                                    <span class="block">
                                                        {{ Str::limit($item->message, 20) }}
                                                    </span>
                                                    <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                                                </div>
                                            </a>
                                            @endforeach
                                        </div>
                                    </div>                                    
                                </li>
                                <li>
                                    {{-- <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a> --}}
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hidden-caret">

                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{ url('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <li>
                                    <div class="user-box">
                                        <div class="avatar-lg"><img src="{{ url('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="image profile" class="avatar-img rounded"></div>
                                        <div class="u-text">
                                            <h4>{{ auth()->user()->name }}</h4>
                                            <p class="text-muted">{{ auth()->user()->email}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('profile') }}">My Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        @include('partial.sidebar.user')
        @yield('content')
    </div>
    @include('layout/footer')
</body>
</html>
