@extends('layout.mainadmin')

@section('content')

<style>
    .text-danger {
        color: red;
    }
</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin/category/store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Tambah Kategori</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Kategori</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama Kategori" value="{{ old('name') }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ url('admin/category') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
