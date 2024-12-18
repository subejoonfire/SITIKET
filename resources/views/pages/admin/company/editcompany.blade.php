@extends('layout.mainadmin')

@section('content')



<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Ubah Perusahaan</h4>
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
                                <h4 class="card-title">Ubah Perusahaan</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/company/action/update/'. $data->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="companycode">Kode</label>
                                    <input type="text" name="companycode" class="form-control" id="companycode" placeholder="Masukkan Kode" value="{{ $data->companycode }}">
                                    @error('companycode')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="companyname">Nama Perusahaan</label>
                                    <input type="text" name="companyname" class="form-control" id="companyname" placeholder="Masukkan Nama Perusahaan" value="{{ $data->companyname }}">
                                    @error('companyname')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url('admin/company') }}" class="btn btn-danger">Batal</a>
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
