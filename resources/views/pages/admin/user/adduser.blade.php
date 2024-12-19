@extends('layout.mainadmin')

@section('content')

<style>
    .checkbox-group {
        display: grid;
        grid-auto-flow: column;
        /* Isi ke bawah dulu */
        grid-template-rows: repeat(5, auto);
        /* Maksimal 5 baris */
        grid-template-columns: repeat(4, 1fr);
        /* Maksimal 4 kolom */
        gap: 10px;
        /* Jarak antar elemen */
        margin-left: 15px;
    }

    .checkbox-group label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .checkbox-group input[type="checkbox"] {
        margin-right: 5px;
        /* Jarak antara checkbox dan teks */
    }

    @media (max-width: 768px) {
        .checkbox-group {
            grid-auto-flow: row;
            /* Berubah jadi mengisi ke kanan dulu di layar kecil */
            grid-template-rows: none;
            grid-template-columns: repeat(2, 1fr);
            /* Maksimal 2 kolom di layar kecil */
        }
    }

    @media (max-width: 480px) {
        .checkbox-group {
            grid-template-columns: 1fr;
            /* Satu kolom di layar sangat kecil */
        }
    }

</style>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <div class="col-md-12">
                    <form method="POST" action="{{ url('admin/user/action/store') }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Tambah Pengguna</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input required type="text" name="name" class="form-control" id="name" placeholder="Masukkan Nama" value="{{ old('name') }}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select class="form-control" id="level" name="level" onchange="togglePic()">
                                        <option selected disabled hidden>Pilih Level</option>
                                        <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ old('level') == 2 ? 'selected' : '' }}>Helpdesk</option>
                                        <option value="3" {{ old('level') == 3 ? 'selected' : '' }}>PIC</option>
                                        <option value="4" {{ old('level') == 4 ? 'selected' : '' }}>User </option>
                                    </select>
                                    @error('level')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group" id="module-container" style="display: none;">
                                    <label for="idmodule">Modul</label>
                                    <select class="form-control" id="idmodule" name="idmodule">
                                        <option selected disabled hidden>Pilih Modul</option>
                                        @foreach ($modules as $module)
                                        <option value="{{ $module->id }}" {{ old('idmodule') == $module->id ? 'selected' : '' }}>{{ $module->modulename }}</option>
                                        @endforeach
                                    </select>
                                    @error('idmodule')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nomor HP</label>
                                    <input type="phone" name="phone" class="form-control" id="phone" placeholder="Masukkan phone" value="{{ old('phone') }}">
                                    @error('phone')
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
                                    <label for="iddepartment">Departemen</label>
                                    <select class="form-control" id="iddepartment" name="iddepartment">
                                        <option selected disabled hidden>Pilih Departemen</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ old('iddepartment') == $department->id ? 'selected' : '' }}>{{ $department->departmentname }}</option>
                                        @endforeach
                                    </select>
                                    @error('iddepartment')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="idcompany">Perusahaan</label>
                                    <select class="form-control" id="idcompany" name="idcompany">
                                        <option selected disabled hidden>Pilih Perusahaan</option>
                                        @foreach ($companies as $company)
                                        <option value="{{ $company->id }}" {{ old('idcompany') == $company->id ? 'selected' : '' }}>{{ $company->companyname }}</option>
                                        @endforeach
                                    </select>
                                    @error('idcompany')
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

<script>
    function togglePic() {
        var levelSelect = document.getElementById("level");
        var moduleContainer = document.getElementById("module-container");
        if (levelSelect.value == "3") {
            moduleContainer.style.display = "block";
        } else {
            moduleContainer.style.display = "none";
        }
    }
    document.addEventListener('DOMContentLoaded', togglePic);
    document.addEventListener('DOMContentLoaded', function() {
        var levelSelect = document.getElementById("level");
        if (levelSelect) {
            levelSelect.addEventListener('change', togglePic);
        }
    });

</script>

@endsection
