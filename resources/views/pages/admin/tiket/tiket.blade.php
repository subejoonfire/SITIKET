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
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                    New</span>
                                                <span class="fw-light">
                                                    Row
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Create a new row using this form, make sure you fill them all</p>
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Name</label>
                                                            <input id="addName" type="text" class="form-control" placeholder="fill name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Position</label>
                                                            <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Office</label>
                                                            <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <!-- Dummy Data -->
                                            @foreach(range(1, 5) as $index) <!-- Loop 5 times for dummy data -->
                                            <tr>
                                                <td>{{ $index }}</td>
                                                <td>TK-{{ str_pad($index, 4, '0', STR_PAD_LEFT) }}</td> <!-- Example ticket code -->
                                                <td>Nama Pelapor {{ $index }}</td> <!-- Example name -->
                                                <td>Module {{ $index }}</td> <!-- Example module -->
                                                <td>{{ ['Open', 'In Progress', 'Closed'][rand(0, 2)] }}</td> <!-- Random status -->
                                                <td>Masalah {{ $index }}</td> <!-- Example issue -->
                                                <td>{{ \Carbon\Carbon::now()->subDays(rand(1, 5))->format('l, d F Y H:i') }}</td> <!-- Random date -->
                                                <td>
                                                    <a href="{{ url('admin/tiket/review/' . $index) }}" class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i> Detail
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        
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
