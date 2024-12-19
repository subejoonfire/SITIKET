@extends('layout.mainuser')

@section('content')

@include('css/user/userreview')


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
                                <div class="form-group row">
                                    <!-- Baris 1 -->
                                    <div class="col-md-4">
                                        <label for="ticketcode">Kode Tiket</label>
                                        <input type="text" name="ticketcode" class="form-control" id="ticketcode" value="{{ $data->ticketcode }}">
                                        @error('ticketcode')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="priority">Prioritas</label>
                                        <input type="text" name="priority" class="form-control" id="priority" value="{{ $data->priorities->priorityname ?? 'Belum ada' }}">
                                        @error('priority')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="module">Modul</label>
                                        <input type="text" name="module" class="form-control" id="module" value="{{ $data->modules->modulename ?? 'Belum ada' }}">
                                        @error('module')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- Baris 2 -->
                                    <div class="col-md-4">
                                        <label for="status">Status</label>
                                        <span class="form-control" id="status">{{ $data->status }}</span>
                                        @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_diajukan">Tanggal Diajukan</label>
                                        <input type="text" name="tanggal_diajukan" class="form-control" id="tanggal_diajukan" value="{{ $data->created_at->format('l, d F Y H:i') }}" placeholder="Masukkan Tanggal">
                                        @error('tanggal_diajukan')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="PIC">PIC</label>
                                        <input type="text" name="PIC" class="form-control" id="PIC" value="{{ $data->user_pic->name  ?? 'Belum ada' }}" placeholder="Masukkan Tanggal">
                                        @error('PIC')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subjek">Subjek</label>
                                    <span class="form-control" id="subjek">{{ $data->issue }}</span>
                                    @error('subjek')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <label for="issue">Issue</label>
                                    <textarea name="issue" class="form-control" id="issue" rows="4">{{ $data->detailissue }}</textarea>
                                    @error('issue')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="fileview">File Diupload</label>
                                    <div class="d-flex align-items-center" style="border: 1px solid #ddd; border-radius: 5px; padding: 5px;">
                                        @if($data->attachment != NULL)
                                        <a href="{{ url('storage/'. $data->attachment) }}" download class="btn btn-primary mr-2">
                                            Unduh
                                        </a>
                                        <span style="flex-grow: 1; color: #000; font-weight:">
                                            file sap download.pdf
                                        </span>
                                        @else
                                        <div class="form-control text-muted">Tidak ada file terkait.</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('layout/messages')
        </div>
    </div>
</div>


@endsection
