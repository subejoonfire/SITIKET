@extends('layout.mainadmin')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin/company/action/store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Tambah Perusahaan</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="companycode">Kode</label>
                                    <input type="text" name="companycode" class="form-control @error('companycode') is-invalid @enderror" id="companycode" placeholder="Masukkan Kode" value="{{ old('companycode') }}">
                                    @error('companycode')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="companyname">Nama Perusahaan</label>
                                    <input type="text" name="companyname" class="form-control @error('companyname') is-invalid @enderror" id="companyname" placeholder="Masukkan Nama Perusahaan" value="{{ old('companyname') }}">
                                    @error('companyname')
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
