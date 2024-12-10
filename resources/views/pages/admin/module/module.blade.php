@extends('layout.mainadmin')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Modul</h4>
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
                                <h4 class="card-title">Modul</h4>
                                <a href="{{ url('admin/module/add') }}" class="btn btn-custom ml-auto">
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
                                            <th>Nama Departemen</th>
                                            <th>Nama Modul</th>
                                            <th>Jumlah Modul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $modules = [
                                            ['department' => 'HR', 'modul' => 'SAP', 'submodules' => ['Module Plant', 'Module HR', 'Module BOD']],
                                            ['department' => 'IT', 'modul' => 'NETWORK', 'submodules' => ['Module Network 1', 'Module Network 2']]
                                        ];
                                        @endphp

                                        @foreach ($modules as $key => $module)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $module['department'] }}</td>
                                            <td>{{ $module['modul'] }}</td>
                                            <td>
                                                <ol>
                                                    @foreach ($module['submodules'] as $subkey => $submodule)
                                                    <li>{{ $submodule }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
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
