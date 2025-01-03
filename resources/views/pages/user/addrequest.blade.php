@extends('layout.mainuser')
@section('content')
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
                            <form method="POST" action="{{ url('user/action/store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="idcategory">Kategori</label>
                                    <select name="idcategory" class="form-control" id="idcategory">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($category as $item)
                                        <option value="{{ $item->id }}" {{ old('id', $data->idcategory ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->categoryname }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('idcategory')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="issue">Subjek</label>
                                        <input type="text" name="issue" class="form-control" placeholder="Masukan Subjek">
                                        @error('issue')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="attachment">Upload File</label>
                                        <input type="file" name="attachment" class="form-control" id="attachment" accept="*">
                                        @error('attachment')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
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
                                    <div class="col">
                                        <label for="idpriority">Prioritas</label>
                                        <select name="idpriority" class="form-control" id="idpriority">
                                            <option value="">Pilih Prioritas</option>
                                            @foreach ($priority as $item)
                                            <option value="{{ $item->id }}" {{ old('id', $data->idpriority ?? '') == $item->id ? 'selected' : '' }}>
                                                {{ $item->priorityname }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('idpriority')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="detailissue">Keluhan</label>
                                    <textarea type="text" name="detailissue" class="form-control" id="destailissue" placeholder="Masukan Keluhan" cols="30" rows="10"></textarea>
                                    @error('detailissue')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url('user') }}" class="btn btn-danger">Batal</a>
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
