@extends('layout.mainadmin')

@section('content')



<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Ubah Departemen</h4>
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
                                <h4 class="card-title">Ubah Departemen</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/department/action/update/') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="departmentname">Nama Department</label>
                                        <input type="text" name="departmentname" class="form-control" id="departmentname" placeholder="Masukkan Nama Department" value="{{ $data->departmentname }}">
                                        @error('departmentname')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="idcompany">Nama Perusahaan</label>
                                        <select name="idcompany" class="form-control" id="idcompany">
                                            <option value="" selected>Pilih Perusahaan</option>
                                            @foreach ($companies as $item)
                                            <option value="{{ $item->id }}" {{ $item->id == $data->idcompany ? 'Selected' : '' }}>{{ $item->companyname }}</option>
                                            @endforeach
                                        </select>
                                        @error('idcompany')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url('admin/department') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
