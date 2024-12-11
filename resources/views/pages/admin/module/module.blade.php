@extends('layout.mainadmin')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">PIC</h4>
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
                                <h4 class="card-title">PIC</h4>
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
                                            <th>Nama Modul</th>
                                            <th>Jumlah PIC</th>
                                            <th style="width: 18%" data-orderable="false">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $modules = [
                                            ['modul' => 'FI', 'submodules' => ['PIC Finance 1', 'PIC Finance 2']],
                                            ['modul' => 'CO', 'submodules' => ['PIC Controlling 1', 'PIC Controlling 2']],
                                            ['modul' => 'FM', 'submodules' => ['PIC Facility Management']],
                                            ['modul' => 'MM', 'submodules' => ['PIC Material 1', 'PIC Material 2']],
                                            ['modul' => 'PM', 'submodules' => ['PIC Project Management']],
                                            ['modul' => 'SD', 'submodules' => ['PIC Sales 1', 'PIC Sales 2']]
                                        ];
                                        @endphp
                        
                                        @foreach ($modules as $key => $module)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $module['modul'] }}</td>
                                            <td>
                                                <ol>
                                                    @foreach ($module['submodules'] as $submodule)
                                                    <li>{{ $submodule }}</li>
                                                    @endforeach
                                                </ol>
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/department/editmodul') }}" class="btn btn-warning">
                                                    <i class="fa fa-edit fa-lg"></i> Edit
                                                </a>
                                                                                              
                                                <a href="#" class="btn btn-danger">
                                                    <i class="fa fa-trash fa-lg"></i> Delete
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
