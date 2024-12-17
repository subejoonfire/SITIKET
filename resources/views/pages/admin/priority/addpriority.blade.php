@extends('layout.mainadmin')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Tambah Prioritas</h4>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin/priority/action/store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Tambah Prioritas</div>
                            </div>
                            <div class="card-body">
                                <!-- Input Nama Prioritas -->
                                <div class="form-group">
                                    <label for="priority">Prioritas</label>
                                    <input type="text" name="priority" class="form-control" id="priority" placeholder="Masukkan Prioritas" value="{{ old('priority') }}">
                                    @error('priority')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ url('admin/priority') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
