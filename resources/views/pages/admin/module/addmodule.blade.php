@extends('layout.mainadmin')

@section('content')



<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin/module/action/store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Tambah Module</div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="department">Nama Departemen</label>
                                    <select name="department" class="form-control" id="department">
                                        <option value="" disabled selected>Pilih Departemen</option>
                                        <option value="HR">HR</option>
                                        <option value="IT">IT</option>
                                        <option value="HRD">HRD</option>
                                        <option value="PLANT">PLANT</option>
                                        <option value="DLL">DLL</option>
                                    </select>
                                    @error('department')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="modulename">Nama Modul</label>
                                <input type="text" name="modulename" class="form-control" id="modulename" placeholder="Masukkan nama modul">
                                @error('modulename')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ url('admin/module') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
