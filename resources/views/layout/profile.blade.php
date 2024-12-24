@if (auth()->user()->level == 3 ||auth()->user()->level == 4 )
<li class="nav-item dropdown hidden-caret">
    <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell"></i>
        @if ($notification != 0)<span class="notification">{{ $notification }}</span>@endif
    </a>
    <ul class="dropdown-menu notif-box bg-light animated fadeIn">
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
            <div class="message-notif-scroll bg-light scrollbar-outer">
                <div class="notif-center">
                    @foreach ($notificationData as $item)
                    <a href="{{ auth()->user()->level == 3 ? url('pic/ticket/review/index/'. $item->idticket) : url('user/review/'. $item->idticket) }}">
                        <div class="notif-img">
                            <img src="{{ url('storage/profiles/' . ($item->user_from->image == '' ? 'default.jpg' : $item->user_from->image)) }}" alt="Img Profile">
                        </div>
                        <div class="notif-content">
                            <span class="subject">{{ $item->user_from->name }}</span>
                            <span class="block">{{ Str::limit($item->message, 20) }}</span>
                            <span class="time">{{ $item->created_at->diffForHumans() }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </li>
    </ul>
</li>
@endif
<li class="nav-item dropdown hidden-caret">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
        <div class="avatar-sm">
            <img src="{{ url('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="..." class="avatar-img rounded-circle">
        </div>
    </a>
    <ul class="dropdown-menu dropdown-user animated bg-light fadeIn">
        <li>
            <div class="user-box">
                <div class="avatar-lg"><img src="{{ url('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="image profile" class="avatar-img rounded"></div>
                <div class="u-text">
                    <h4>{{ auth()->user()->name }}</h4>
                    <p class="text-muted">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </li>
        <li>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('profile') }}">Profil Saya</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('logout') }}">Keluar</a>
        </li>
    </ul>
</li>
