@extends('layout.mainuser')

@section('content')

<style>
    .text-danger {
        color: red;
    }

    .form-row {
        display: flex;
        gap: 20px;
    }

    .form-row .form-group {
        flex: 1;
    }

    .form-control {
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }

    .card-body {
        padding: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Beranda</h4>
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
                                <h4 class="card-title">Tambah Pengajuan</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('user/action/store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="category">Kategori</label>
                                    <input type="text" name="category" class="form-control" id="category" placeholder="Masukan Kategori">
                                    @error('category')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="issue">Subjek</label>
                                    <input type="text" name="issue" class="form-control" id="issue" placeholder="Masukan Subjek">
                                    @error('issue')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="idmodule">Modul</label>
                                        <select name="idmodule" class="form-control" id="idmodule">
                                            <option value="">Pilih Modul</option>
                                            @foreach ($module as $item)
                                            <option value="{{ $item->id }}" {{ old('id', $data->idmodule ?? '') == $item->id ? 'selected' : '' }}>
                                                {{ $item->modulename }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('idmodule')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="priority">Prioritas</label>
                                        <select name="priority" class="form-control" id="priority">
                                            <option value="">Pilih Prioritas</option>
                                            <option value="Bisa Menunggu" {{ old('priority', $data->priority ?? '') == 'Bisa Menunggu' ? 'selected' : '' }}>Bisa Menunggu</option>
                                            <option value="Sedang" {{ old('priority', $data->priority ?? '') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                            <option value="Mendesak" {{ old('priority', $data->priority ?? '') == 'Mendesak' ? 'selected' : '' }}>Mendesak</option>
                                        </select>
                                        @error('priority')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detailissue">Keluhan</label>
                                    <textarea type="text" name="detailissue" class="form-control" id="detailissue" placeholder="Masukan Keluhan" cols="30" rows="10"></textarea>
                                    @error('detailissue')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url('user/dashboard') }}" class="btn btn-danger">Batal</a>
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
