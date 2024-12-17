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
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->

                            @php
                            // Data Dummy untuk Departemen
                            $departments = [
                                ['id' => 1, 'unit' => 'PT. JHONLIN GROUP', 'code' => 'HRD', 'name' => 'Human Resource Development'],
                                ['id' => 2, 'unit' => 'PT. JHONLIN GROUP', 'code' => 'GA', 'name' => 'GENERAL 2222'],
                                ['id' => 3, 'unit' => 'PT. JHONLIN GROUP', 'code' => 'OPRN', 'name' => 'DEPT. OPERATION'],
                                ['id' => 4, 'unit' => 'PT. JHONLIN GROUP', 'code' => 'FAT', 'name' => 'DEPT. FAT'],
                                ['id' => 5, 'unit' => 'PT. JHONLIN MARINE LINES', 'code' => 'GA', 'name' => 'GENERAL JML'],
                                ['id' => 6, 'unit' => 'PT. SAMUDERA TIMUR MAS', 'code' => 'OPRN', 'name' => 'DEPT. OPERATION'],
                                ['id' => 7, 'unit' => 'PT. SAMUDERA TIMUR MAS', 'code' => 'DOCC', 'name' => 'DOC. CONTROL'],
                                ['id' => 8, 'unit' => 'PT. SAMUDERA TIMUR MAS', 'code' => 'FAT', 'name' => 'DEPT. FAT'],
                                ['id' => 9, 'unit' => 'PT. SAMUDERA TIMUR MAS', 'code' => 'HRGA', 'name' => 'HRGA'],
                                ['id' => 10, 'unit' => 'PT. JHONLIN BARATAMA', 'code' => 'FAT', 'name' => 'FAT'],
                                ['id' => 11, 'unit' => 'PT. JHONLIN BARATAMA', 'code' => 'HRGA', 'name' => 'HRGA'],
                                ['id' => 12, 'unit' => 'PT. JHONLIN BARATAMA', 'code' => 'PLANT', 'name' => 'PLANT MAINTENANCE'],
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
                                        <th style="width: 15%" data-orderable="false">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['unit'] }}</td>
                                        <td>{{ $item['code'] }}</td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>
                                            <div class="form-button-action">
                                                <a href="{{ url('admin/department/edit/')}}" class="btn btn-warning btn-sm" style="margin-right: 3px;">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus">
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
