@extends('layout.mainhelp')

@section('content')

<style>
    .text-danger {
        color: red;
    }

    #keluhan,
    #email,
    #username,
    #phone,
    #subjek,
    #tanggal_diajukan {
        background-color: #ffffff !important;
        color: #000000 !important;
        border: 1px solid #D1D1D1 !important;
        padding: 8px;
        font-weight: normal !important;
        pointer-events: none;
    }

    #department {
        background-color: #ffffff !important;
        color: #000000 !important;
        border: 2px solid #4CAF50 !important;
        padding: 8px;
        cursor: pointer;
    }

    #pic {
        background-color: #ffffff !important;
        color: #000000 !important;
        border: 2px solid #4CAF50 !important;
        padding: 8px;
        cursor: pointer;
    }

    #pic:focus {
        border-color: #70c55b !important;
        box-shadow: 0 0 5px rgba(0, 235, 4, 0.5);
    }

    #priority {
        background-color: #ffffff !important;
        color: #000000 !important;
        border: 2px solid #4CAF50 !important;
        padding: 8px;
        cursor: pointer;
    }

    #priority:focus {
        border-color: #70c55b !important;
        box-shadow: 0 0 5px rgba(0, 235, 4, 0.5);
    }

    #department:focus {
        border-color: #70c55b !important;
        box-shadow: 0 0 5px rgba(0, 235, 4, 0.5);
    }

    #subjek {
        background-color: #ffffff !important;
        color: #000000 !important;
        padding: 8px;
        cursor: pointer
    }

</style>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Detail Pengguna</h4>
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
                    <form method="POST" action="{{ url('helpdesk/action/update/'. $data->id) }}">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Ubah Status</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group">
                                    <div style="display: flex; gap: 10px; justify-content: space-between;">
                                        <!-- User -->
                                        <div style="flex: 1;">
                                            <label for="username">User</label>
                                            <input type="text" name="username" class="form-control" id="username" value="{{ $data->users->name }}">
                                            @error('username')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div style="flex: 1;">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{ $data->users->email }}">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div style="flex: 1;">
                                            <label for="phone">No Handphone</label>
                                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $data->users->phone }}">
                                            @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div style="display: flex; gap: 10px; justify-content: space-between;">
                                        <div style="flex: 1;">
                                            <label for="department">Pilih Departemen</label>
                                            <select name="iddepartment" class="form-control" id="department">
                                                <option value="">Pilih Departemen</option>
                                                @foreach ($department as $item)
                                                <option value="{{ $item->id }}" {{ old('id', $data->iddepartment ?? '') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->departmentname }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('iddepartment')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>  
                                        <div style="flex: 1;">
                                            <label for="iduser_pic">Pilih PIC</label>
                                            <select name="iduser_pic" class="form-control" id="pic">
                                                <option value="">Pilih PIC</option>
                                                @foreach ($pic as $item)
                                                <option value="{{ $item->id }}" data-department="{{ $item->iddepartment }}" {{ old('iduser_pic', $data->iduser_pic ?? '') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('iduser_pic')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div style="flex: 1;">
                                            <label for="priority">Priority</label>
                                            <select name="priority" class="form-control" id="priority">
                                                <option value="">Pilih Priority</option>
                                                <option value="Bisa Menunggu" {{ old('priority', $data->priority ?? '') == 'Bisa Menunggu' ? 'selected' : '' }}>Bisa Menunggu</option>
                                                <option value="Sedang" {{ old('priority', $data->priority ?? '') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                                <option value="Mendesak" {{ old('priority', $data->priority ?? '') == 'Mendesak' ? 'selected' : '' }}>Mendesak</option>
                                            </select>
                                            @error('priority')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="display: flex; gap: 10px; justify-content: space-between;">
                                        <div style="flex: 1;">
                                            <label for="tanggal_diajukan">Tanggal Diajukan</label>
                                            <input type="text" name="tanggal_diajukan" class="form-control" id="tanggal_diajukan" value="{{ $data->created_at->format('l, d F Y H:i') }}">
                                            @error('tanggal_diajukan')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subjek">Subjek</label>
                                    <input type="text" name="subjek" class="form-control" id="subjek" value="{{ $data->issue }}">
                                    @error('subjek')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea name="keluhan" class="form-control" id="keluhan" placeholder="Enter Complaint Description">{{ $data->detailissue }}</textarea>
                                    @error('keluhan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{ url('helpdesk/validation') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@if ($data->iduser_pic == NULL)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const departmentSelect = document.getElementById('department');
        const picSelect = document.getElementById('pic');

        const updatePicOptions = () => {
            const selectedDepartment = departmentSelect.value;
            picSelect.disabled = !selectedDepartment;

            Array.from(picSelect.options).forEach(option => {
                const optionDepartment = option.getAttribute('data-department');
                option.style.display = (!selectedDepartment || optionDepartment === selectedDepartment) ? '' : 'none';
            });

            picSelect.value = '';
        };

        departmentSelect.addEventListener('change', updatePicOptions);
        updatePicOptions();
    });

</script>
@endif
