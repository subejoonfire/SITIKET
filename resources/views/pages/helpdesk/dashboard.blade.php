@extends('layout.mainhelp')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Incoming Validation</p>
                                        <h4 class="card-title">12</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                        <i class="fas fa-hourglass-half"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Validation History</p>
                                        <h4 class="card-title">3</h4>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Incoming Validation</h4>
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
                                            <th>Department</th>
                                            <th>Status</th>

                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td>T12</td>
                                        <td>Jhonlin Group DSP</td>
                                        <td>Menunggu Validasi</td>
                                        <td>
                                            <div class="form-button-action">
                                                <!-- Tombol Terima dengan ikon dan teks -->
                                                <a href="#" data-toggle="modal" data-target="#acceptModal" class="btn btn-success btn-lg rounded-pill d-flex align-items-center px-3 py-2" data-original-title="Accept">
                                                    <i class="fa fa-check me-3"></i> <!-- Spasi lebih antara ikon dan teks -->
                                                    <span>Terima</span>
                                                </a>
                                                <!-- Tombol Tolak dengan ikon dan teks -->
                                                <a href="#" data-toggle="modal" data-target="#rejectModal" class="btn btn-danger btn-lg rounded-pill d-flex align-items-center px-3 py-2" data-original-title="Reject">
                                                    <i class="fa fa-times me-3"></i> <!-- Spasi lebih antara ikon dan teks -->
                                                    <span>Tolak</span>
                                                </a>
                                            </div>
                                        </td>

                                        {{-- @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><img src="{{ $item->photo }}" alt="Jane's Photo" class="img-fluid rounded-circle"></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ url('admin/user/delete/'. $item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>

                                    <tbody>
                                        <td>T1</td>
                                        <td>Jhonlin Group DSP</td>
                                        <td>Menunggu Validasi</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="#" data-toggle="modal" data-target="#acceptModal" class="btn btn-success btn-lg rounded-pill d-flex align-items-center px-3 py-2" data-original-title="Accept">
                                                    <i class="fa fa-check me-3"></i>
                                                    <span>Terima</span>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#rejectModal" class="btn btn-danger btn-lg rounded-pill d-flex align-items-center px-3 py-2" data-original-title="Reject">
                                                    <i class="fa fa-times me-3"></i>
                                                    <span>Tolak</span>
                                                </a>
                                            </div>
                                        </td>
                                        {{-- @foreach ($user as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><img src="{{ $item->photo }}" alt="Jane's Photo" class="img-fluid rounded-circle"></td>
                                        <td>
                                            <div class="form-button-action">
                                                <a data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ url('admin/user/delete/'. $item->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                        </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Terima -->
            <div class="modal fade" id="acceptModal" tabindex="-1" aria-labelledby="acceptModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="acceptModalLabel">Konfirmasi Terima</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menerima permintaan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-success">Terima</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Tolak -->
            <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rejectModalLabel">Konfirmasi Tolak</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menolak permintaan ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger">Tolak</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
