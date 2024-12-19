@extends('layout.mainadmin')

@section('content')



<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Ubah Pengguna</h4>
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
                                <h4 class="card-title">Ubah Pengguna</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('admin/user/action/update', $data->id) }}">
                                @csrf
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
                                        <option value="1" {{ $data->level == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ $data->level == 2 ? 'selected' : '' }}>Helpdesk</option>
                                        <option value="3" {{ $data->level == 3 ? 'selected' : '' }}>PIC</option>
                                        <option value="4" {{ $data->level == 4 ? 'selected' : '' }}>User </option>
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
                                        <option value="{{ $module->id }}" {{ $data->idmodule == $module->id ? 'selected' : '' }}>{{ $module->modulename }}</option>
                                        @endforeach
                                    </select>
                                    @error('idmodule')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Nomor HP</label>
                                    <input type="phone" name="phone" class="form-control" id="phone" placeholder="Masukkan phone" value="{{ $data->phone }}">
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{ $data->email }}">
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="iddepartment">Departemen</label>
                                    <select class="form-control" id="iddepartment" name="iddepartment">
                                        <option selected disabled hidden>Pilih Departemen</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id }}" {{ $data->iddepartment == $department->id ? 'selected' : '' }}>{{ $department->departmentname }}</option>
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
                                        <option value="{{ $company->id }}" {{ $data->idcompany == $company->id ? 'selected' : '' }}>{{ $company->companyname }}</option>
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
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url('admin/user') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function togglePic() {
        var levelSelect = document.getElementById("level");
        var moduleContainer = document.getElementById("module-container");
        if (levelSelect && moduleContainer) {
            if (levelSelect.value == "3") {
                moduleContainer.style.display = "block";
            } else {
                moduleContainer.style.display = "none";
            }
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
