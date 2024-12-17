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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Perusahaan</h4>
                                <a href="{{ url('admin/company/add') }}" class="btn btn-custom ml-auto">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                            $companies = [
                                ['code' => 'MNG001', 'initial' => 'PT. JG', 'name' => 'PT. JHONLIN GROUP'],
                                ['code' => 'MNG002', 'initial' => 'PT. JB OLD', 'name' => 'PT. JHONLIN BARATAMA OLD'],
                                ['code' => 'MNG003', 'initial' => 'PT. DSP', 'name' => 'PT. DUA SAMUDRA PERKASA'],
                                ['code' => 'MNG004', 'initial' => 'PT. BCMP', 'name' => 'PT. BARAMAGA CITRA MULIA PERSADA'],
                                ['code' => 'MNG005', 'initial' => 'PT. JML', 'name' => 'PT. JHONLIN MARINE LINES'],
                                ['code' => 'ST00', 'initial' => 'STM', 'name' => 'PT. SAMUDERA TIMUR MAS'],
                                ['code' => 'JB00', 'initial' => 'PTJB', 'name' => 'PT. JHONLIN BARATAMA'],
                            ];
                            @endphp
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Initial</th>
                                            <th>Nama Perusahaan</th>
                                            <th style="width: 15%" data-orderable="false">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($companies as $index => $company)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $company['code'] }}</td>
                                            <td>{{ $company['initial'] }}</td>
                                            <td>{{ $company['name'] }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ url('admin/company/edit') }}" 
                                                       class="btn btn-warning btn-sm" style="margin-right: 3px;">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                    <a href="{{ url('admin/company/delete') }}" 
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
