@extends('layout.mainuser')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Beranda</h4>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Riwayat Pengajuan</p>
                                        <h4 class="card-title">{{ $count }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

                    <!-- Card Riwayat Pengajuan Table -->
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Riwayat Pengajuan</h4>
                                <a href="{{ url('user/add') }}" class="btn btn-custom ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Tiket</th>
                                            <th>Modul</th>
                                            <th>Status</th>
                                            <th>Masalah</th>
                                            <th style="width: 9%" data-orderable="false">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->ticketcode }}</td>
                                            <td>{{ $item->idmodule ? $item->modules->modulename : 'Belum ada' }}</td>
                                            <td>{{ $item->status ?? 'Tidak ada' }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($item->issue ?? 'Tidak ada', 60) }}</td>
                                            <td style="position: relative;">
                                                <a href="{{ url('user/review/' . $item->id) }}" class="btn btn-info btn-sm" style="position: relative; display: inline-block;">
                                                    <i class="fas fa-eye"></i> Detail
                                                </a>
                                                @if ($item->messages->where('iduser_to', auth()->user()->id)->where('read_user', false)->count() > 0)
                                                <span class="notification-badge">
                                                    {{ $item->messages->where('iduser_to', auth()->user()->id)->where('read_user', false)->count() }}
                                                </span>
                                                @else
                                                @endif
                                                @if ($item->status == 'TERKIRIM')
                                                <a href="{{ url('user/action/delete/'. $item->id) }}" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Remove">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
