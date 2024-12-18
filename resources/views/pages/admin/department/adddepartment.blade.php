@extends('layout.mainadmin')

@section('content')



<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin/department/action/store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Tambah Departemen</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="departmentname">Nama Department</label>
                                    <input type="text" name="departmentname" class="form-control" id="departmentname" placeholder="Masukkan Nama Department" value="">
                                    @error('departmentname')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="idcompany">Nama Perusahaan</label>
                                    <select name="idcompany" class="form-control" id="idcompany">
                                        <option value="" selected>Pilih Perusahaan</option>
                                        @foreach ($companies as $item)
                                        <option value="{{ $item->id }}">{{ $item->companyname }}</option>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
