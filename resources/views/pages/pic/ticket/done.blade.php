@extends('layout.main')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tiket Selesai</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Diselesaikan</h4>
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
                                            <td>{{ $item->tickets->modules->modulename }}</td>
                                            <td>{{ $item->tickets->status }}</td>
                                            <td>{{ $item->tickets->issue }}</td>
                                            <td>{{ $item->tickets->created_at->format('l, d F Y H:i') }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ url('pic/ticket/review/done/'. $item->tickets->id)}}" class="btn btn-info btn-lg rounded-pill d-flex align-items-center px-3 py-2" data-original-title="Change Status">
                                                        <i class="fa fa-eye me-3"></i>
                                                        <span>Detail</span>
                                                    </a>
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
