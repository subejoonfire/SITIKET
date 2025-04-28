@extends('layout.mainadmin')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengguna</h4>
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
                                <h4 class="card-title">Pengguna</h4>
                                <a href="{{ url('admin/user/add') }}" class="btn btn-custom ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </a>

                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 8%">ID User</th>
                                            <th style="width: 9%">Username</th>
                                            <th style="width: 8%">No HP</th>
                                            <th style="width: 10%">Email</th>
                                            <th style="width: 10%">Departemen</th>
                                            <th style="width: 15%">Perusahaan</th>
                                            <th>Modul</th>
                                            <th>Level</th>
                                            <th style="width: 10%" data-orderable="false">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($collection as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->departments->departmentname ?? '' }}</td>
                                            <td>{{ $item->companies->companyname ?? '' }}</td>
                                            <td>{{ $item->modules->modulename ?? '' }}</td>
                                            <td>{{ $item->level == 1 ? 'Admin' : ($item->level == 2 ? 'Helpdesk' : ($item->level == 3 ? 'PIC' : 'User')) }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ url('admin/user/edit', ['id' => $item->id]) }}" 
                                                       data-toggle="tooltip" 
                                                       title="" 
                                                       class="btn btn-link btn-primary btn-lg" 
                                                       data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                        
                                                    @if ($item->level != 1)
                                                        <a href="javascript:void(0)" 
                                                           class="btn btn-link btn-danger btn-delete" 
                                                           data-url="{{ url('admin/user/action/delete/' . $item->id) }}" 
                                                           data-toggle="tooltip" 
                                                           title="Hapus">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    @endif
                                        
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
