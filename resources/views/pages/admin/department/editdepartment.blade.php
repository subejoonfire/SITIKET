@extends('layout.mainadmin')

@section('content')



<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Ubah Departemen</h4>
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
                                <h4 class="card-title">Ubah Departemen</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/department/action/update/') }}">
                                @csrf
                                <!-- @method('PUT') -->
                                <div class="form-group">
                                    <!-- Unit -->
                                    <label for="unit">Nama Perusahaan</label>
                                    <select name="unit" class="form-control" id="unit">
                                        <option value="" selected disabled>Pilih Perusahaan</option>
                                        <option value="PT. JHONLIN GROUP">PT. JHONLIN GROUP</option>
                                        <option value="PT. JHONLIN BARATAMA OLD">PT. JHONLIN BARATAMA OLD</option>
                                        <option value="PT. DUA SAMUDRA PERKASA">PT. DUA SAMUDRA PERKASA</option>
                                        <option value="PT. BARAMEGA CITRA MULIA PERSADA">PT. BARAMEGA CITRA MULIA PERSADA</option>
                                        <option value="PT. JHONLIN MARINE LINES">PT. JHONLIN MARINE LINES</option>
                                        <option value="PT. SAMUDERA TIMUR MAS">PT. SAMUDERA TIMUR MAS</option>
                                        <option value="PT. JHONLIN BARATAMA">PT. JHONLIN BARATAMA</option>
                                    </select>
                                    @error('unit')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                        
                                <div class="form-group">
                                    <!-- Kode -->
                                    <label for="code">Kode</label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="Kode" value="HRD">
                                    @error('code') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                        
                                <div class="form-group">
                                    <!-- Nama Department -->
                                    <label for="name">Nama Department</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Department" value="Human Resource Developmenta">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                        
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url('admin/department') }}" class="btn btn-danger">Batal</a>
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
