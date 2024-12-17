@extends('layout.mainadmin')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Departemen</h4>
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
                                <h4 class="card-title">Departemen</h4>
                                <a href="{{ url('admin/department/add') }}" class="btn btn-custom ml-auto">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                $departments = [
                                    ['No' => 1, 'Nama Perusahaan' => 'PT. JHONLIN GROUP', 'Kode' => 'HRD', 'Nama Department' => 'Human Resource Development'],
                                    ['No' => 2, 'Nama Perusahaan' => 'PT. JHONLIN GROUP', 'Kode' => 'GA', 'Nama Department' => 'GENERAL 2222'],
                                    ['No' => 3, 'Nama Perusahaan' => 'PT. JHONLIN GROUP', 'Kode' => 'OPRN', 'Nama Department' => 'DEPT. OPERATION'],
                                    ['No' => 4, 'Nama Perusahaan' => 'PT. JHONLIN GROUP', 'Kode' => 'FAT', 'Nama Department' => 'DEPT. FAT'],
                                    ['No' => 5, 'Nama Perusahaan' => 'PT. JHONLIN MARINE LINES', 'Kode' => 'GA', 'Nama Department' => 'GENERAL JML'],
                                    ['No' => 6, 'Nama Perusahaan' => 'PT. SAMUDERA TIMUR MAS', 'Kode' => 'OPRN', 'Nama Department' => 'DEPT. OPERATION'],
                                    ['No' => 7, 'Nama Perusahaan' => 'PT. SAMUDERA TIMUR MAS', 'Kode' => 'DOCC', 'Nama Department' => 'DOC. CONTROL'],
                                    ['No' => 8, 'Nama Perusahaan' => 'PT. SAMUDERA TIMUR MAS', 'Kode' => 'FAT', 'Nama Department' => 'DEPT. FAT'],
                                    ['No' => 9, 'Nama Perusahaan' => 'PT. SAMUDERA TIMUR MAS', 'Kode' => 'HRGA', 'Nama Department' => 'HRGA'],
                                    ['No' => 10, 'Nama Perusahaan' => 'PT. JHONLIN BARATAMA', 'Kode' => 'FAT', 'Nama Department' => 'FAT'],
                                    ['No' => 11, 'Nama Perusahaan' => 'PT. JHONLIN BARATAMA', 'Kode' => 'HRGA', 'Nama Department' => 'HRGA'],
                                    ['No' => 12, 'Nama Perusahaan' => 'PT. JHONLIN BARATAMA', 'Kode' => 'PLANT', 'Nama Department' => 'PLANT MAINTENANCE'],
                                ];
                            @endphp

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Perusahaan</th>
                                            <th>Kode</th>
                                            <th>Nama Department</th>
                                            <th style="width: 15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $item)
                                            <tr>
                                                <td>{{ $item['No'] }}</td>
                                                <td>{{ $item['Nama Perusahaan'] }}</td>
                                                <td>{{ $item['Kode'] }}</td>
                                                <td>{{ $item['Nama Department'] }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ url('admin/department/edit') }}" 
                                                           class="btn btn-warning btn-sm" style="margin-right: 3px;">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <a href="#" 
                                                           class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
                                                            <i class="fa fa-trash"></i> Hapus
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
