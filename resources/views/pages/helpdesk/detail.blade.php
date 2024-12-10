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

                                        <!-- Gmail -->
                                        <div style="flex: 1;">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" id="email" value="{{ $data->users->email }}">
                                            @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Handphone -->
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
                                        <!-- Departemen -->
                                        <div style="flex: 1;">
                                            <label for="department">Pilih PIC</label>
                                            <select name="iduser_pic" class="form-control" id="department">
                                                <option value="">Pilih PIC</option>
                                                @foreach ($collection as $item)
                                                <option value="{{ $item->id }}" {{ old('iditem', $data->id ?? '') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('iduser')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- PIC -->
                                        <div style="flex: 1;">
                                            <label for="pic">PIC</label>
                                            <select name="idpic" class="form-control" id="pic">
                                                <option value="">Pilih PIC</option>
                                                @php
                                                // Data dummy PIC
                                                $picCollection = [
                                                ['id' => 1, 'picname' => 'John Doe'],
                                                ['id' => 2, 'picname' => 'Jane Smith'],
                                                ['id' => 3, 'picname' => 'Michael Johnson'],
                                                ['id' => 4, 'picname' => 'Emily Davis']
                                                ];
                                                @endphp

                                                @foreach ($picCollection as $pic)
                                                <option value="{{ $pic['id'] }}" {{ old('idpic', $data->idpic ?? '') == $pic['id'] ? 'selected' : '' }}>
                                                    {{ $pic['picname'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('idpic')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Priority -->
                                        <div style="flex: 1;">
                                            <label for="priority">Priority</label>
                                            <select name="priority" class="form-control" id="priority">
                                                <option value="">Pilih Priority</option>
                                                <option value="can_wait" {{ old('priority', $data->priority ?? '') == 'can_wait' ? 'selected' : '' }}>Can Wait</option>
                                                <option value="medium" {{ old('priority', $data->priority ?? '') == 'medium' ? 'selected' : '' }}>Medium</option>
                                                <option value="urgent" {{ old('priority', $data->priority ?? '') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                                            </select>
                                            @error('priority')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div style="display: flex; gap: 10px; justify-content: space-between;">
                                        <!-- Tanggal Diajukan -->
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
                                    <label for="keluhan">Keluhan</label>
                                    <textarea name="keluhan" class="form-control" id="keluhan" placeholder="Enter Complaint Description">{{ $data->trouble }}</textarea>
                                    @error('keluhan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>



                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="#" class="btn btn-danger">Batal</a>
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
