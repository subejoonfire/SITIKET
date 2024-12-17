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
                            <form method="POST" action="{{ url('admin/company/action/update/') }}">
                                @csrf
                                <!-- Input Kode -->
                                <div class="form-group">
                                    <label for="code">Kode</label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="Kode" value="MNG001">
                                    @error('code') 
                                    <small class="text-danger">{{ $message }}</small> 
                                    @enderror
                                </div>
                        
                                <!-- Input Inisial -->
                                <div class="form-group">
                                    <label for="initial">Inisial</label>
                                    <input type="text" name="initial" class="form-control" id="initial" placeholder="Inisial" value="PT. JG">
                                    @error('initial') 
                                    <small class="text-danger">{{ $message }}</small> 
                                    @enderror
                                </div>
                        
                                <!-- Input Nama Perusahaan -->
                                <div class="form-group">
                                    <label for="name">Nama Perusahaan</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Perusahaan" value="PT. JHONLIN GROUP">
                                    @error('name') 
                                    <small class="text-danger">{{ $message }}</small> 
                                    @enderror
                                </div>
                        
                                <!-- Tombol Aksi -->
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
