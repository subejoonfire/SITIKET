@extends('layout.mainhelp')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tindak Lanjut</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tindak Lanjut</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Tiket</th>
                                            <th>Nama Pelapor</th>
                                            <th>Module</th>
                                            <th>Status</th>
                                            <th>Masalah</th>
                                            <th>Status</th>
                                            <th>Tanggal Diajukan</th>
                                            <th style="width: 10%" data-orderable="false">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->tickets->ticketcode }}</td>
                                            <td>{{ $item->users->name }}</td>
                                            <td>{{ $item->tickets->modules->modulename ?? 'Tidak tersedia' }}</td>
                                            <td>{{ $item->status == 1 ? 'Sudah di Proses' : 'Belum di Proses' }}</td>
                                            <td>{{ $item->tickets->issue }}</td>
                                            <td>{{ $item->status == 1 ? 'SELESAI' : 'MENUNGGU' }}</td>
                                            <td>{{ $item->created_at->format('l, d F Y H:i') }}</td>
                                            <td>
                                                <a href="{{ url('helpdesk/followup/detail/index/'. $item->idticket)}}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i> Detail
                                                </a>
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
