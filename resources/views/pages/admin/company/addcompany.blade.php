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
                                <div class="card-title">Form Tambah Perusahaan</div>
                            </div>
                            <div class="card-body">
                                <!-- Input Kode -->
                                <div class="form-group">
                                    <label for="code">Kode</label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="Masukkan Kode" value="{{ old('code') }}">
                                    @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            
                                <!-- Input Inisial -->
                                <div class="form-group">
                                    <label for="initial">Inisial</label>
                                    <input type="text" name="initial" class="form-control" id="initial" placeholder="Masukkan Inisial Perusahaan" value="{{ old('initial') }}">
                                    @error('initial')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            
                                <!-- Input Nama Perusahaan -->
                                <div class="form-group">
                                    <label for="name">Nama Perusahaan</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama Perusahaan" value="{{ old('name') }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ url('admin/company') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection