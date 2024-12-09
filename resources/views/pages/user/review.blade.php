@extends('layout.mainuser')

@section('content')

<style>
    .text-danger {
        color: red;
    }

    #ticket_id,
#priority,
#module,
#issue {
    background-color: #ffffff !important;
    color: #000000 !important;
    border: 1px solid #D1D1D1 !important;
    padding: 8px;
    font-weight: normal !important;
    pointer-events: none;
}


</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Detail User</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ url('#') }}">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Notifikasi Pesan</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ticket_id">ID_Tiket</label>
                                            <input type="text" name="ticket_id" class="form-control" id="ticket_id" value="TKT12345">
                                            @error('ticket_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="priority">Priority</label>
                                            <input type="text" name="priority" class="form-control" id="priority" value="Medium">
                                            @error('priority')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="module">Module</label>
                                            <input type="text" name="module" class="form-control" id="module" value="Medium">
                                            @error('module')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                            
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="issue">Issue</label>
                                            <input type="text" name="issue" class="form-control" id="issue" value="System Error">
                                            @error('issue')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>

            <h4 class="page-title">Pesan Masuk</h4>
            <div class="row">
                <div class="col-md-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pak Rizky Budi Kusuma</h4>
                                    <p><small class="text-muted"><i class="fa fa-envelope"></i> 5 Menit Lalu</small></p>
                                </div>
                                <div class="timeline-body">
                                    <p>Selamat pagi semua, semoga hari ini membawa kebahagiaan dan keberkahan. Mari kita terus bekerja dengan semangat dan berkolaborasi untuk mencapai tujuan kita.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Ferdi Nurahman</h4>
                                    <p><small class="text-muted"><i class="fa fa-envelope"></i> 3 Menit Lalu</small></p>
                                </div>
                                <div class="timeline-body">
                                    <p>Terima kasih, Pak Rizky. Saya setuju, mari kita berkolaborasi lebih baik lagi dan saling mendukung untuk mencapai hasil yang maksimal. Semangat!</p>
                                </div>
                            </div>
                        </li>
            
                        <li>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Pak Rizky Budi Kusuma</h4>
                                    <p><small class="text-muted"><i class="fa fa-envelope"></i> 1 Menit Lalu</small></p>
                                </div>
                                <div class="timeline-body">
                                    <p>Betul, Ferdi. Kolaborasi adalah kunci utama kesuksesan kita. Mari kita tingkatkan komunikasi dan pastikan semua tujuan tercapai tepat waktu.</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="timeline-title">Ferdi Nurahman</h4>
                                    <p><small class="text-muted"><i class="fa fa-envelope"></i> Sekarang</small></p>
                                </div>
                                <div class="timeline-body">
                                    <p>Setuju, Pak Rizky. Kami akan pastikan setiap langkah terkoordinasi dengan baik. Terima kasih atas arahan dan dukungannya.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>

        
    </div>
</div>


@endsection
