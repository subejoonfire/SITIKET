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
                                <div class="card-title">Form Tambah Departemen</div>
                            </div>
                            <div class="card-body">
                                <!-- Input Unit -->
                                <div class="form-group">
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
                                
                            
                                <!-- Input Kode -->
                                <div class="form-group">
                                    <label for="code">Kode</label>
                                    <input type="text" name="code" class="form-control" id="code" placeholder="Masukkan Kode" value="">
                                    @error('code')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            
                                <!-- Input Nama Department -->
                                <div class="form-group">
                                    <label for="name">Nama Department</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama Department" value="">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ url('admin/department') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
