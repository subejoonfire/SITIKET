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
                    <form method="POST" action="{{ url('admin/user/store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Tambah User</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" value="{{ old('name') }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="iddepartment">Departemen</label>
                                    <select class="form-control" id="iddepartment" name="iddepartment">
                                        <option selected disabled hidden>Pilih Departemen</option>
                                        <option value="1" {{ old('iddepartment') == '1' ? 'selected' : '' }}>Hardware</option>
                                        <option value="2" {{ old('iddepartment') == '2' ? 'selected' : '' }}>Jaringan</option>
                                        <option value="3" {{ old('iddepartment') == '3' ? 'selected' : '' }}>SAP</option>
                                        <option value="4" {{ old('iddepartment') == '4' ? 'selected' : '' }}>Logistik</option>
                                        <option value="5" {{ old('iddepartment') == '5' ? 'selected' : '' }}>IT</option>
                                    </select>
                                    @error('iddepartment')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                                    @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ url('admin/add') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
