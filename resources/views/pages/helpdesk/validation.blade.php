@extends('layout.mainhelp')

@section('content')
<style>
   .notification-badge {
        position: absolute;
        top: -5px; /* Geser ke atas */
        right: -5px; /* Geser ke kanan */
        font-size: 10px; /* Ukuran teks */
        background-color: #ff6161; /* Warna merah */
        color: white; /* Warna teks */
        border-radius: 50%; /* Bentuk bulat */
        padding: 4px 7px; /* Ukuran padding */
        line-height: 1;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Efek bayangan */
    }


    .btn-review {
        position: relative; 
        display: inline-block; /
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Validasi</h4>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Permintaan Validasi</h4>
                                {{-- <a href="{{ url('admin.add_depart') }}" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus"></i>
                                Tambah
                                </a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Tiket</th>
                                            <th>Nama</th>
                                            <th>Departemen</th>
                                            <th>Status</th>
                                            <th>Masalah</th>
                                            <th>Tanggal Diajukan</th>
                                            <th style="width: 10%" data-orderable="false">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->ticketcode }}</td>
                                            <td>{{ $item->users->name }}</td>
                                            <td>{{ $item->idmodule ? $item->modules->modulename : 'Menunggu' }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->issue }}</td>
                                            <td>{{ $item->created_at->format('l, d F Y H:i') }}</td>
                                            <td>
                                                <!-- Wrapper untuk Tombol dan Badge -->
                                                <div class="btn-review">
                                                    <a href="{{ url('helpdesk/detail/' . $item->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i> Detail
                                                    </a>
                                                    <span class="notification-badge">2</span>
                                                </div>
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
