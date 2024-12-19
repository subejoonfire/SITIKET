@extends('layout.mainadmin')
@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tiket</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Semua Tiket</h4>
                                {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                   
                                </button> --}}
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
                                            <td>{{ $item->ticketcode }}</td>
                                            <td>{{ $item->users->name }}</td>
                                            <td>{{ $item->modules->modulename }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->issue }}</td>
                                            <td>{{ $item->created_at->format('l, d F Y H:i') }}</td>
                                            <td>
                                                <div class="btn-review">
                                                    <a href="{{ url('admin/ticket/review/' . $item->id)}}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i> Detail
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
