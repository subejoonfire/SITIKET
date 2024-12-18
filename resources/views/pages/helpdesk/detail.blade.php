@extends('layout.mainhelp')
@section('content')
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
                                            <label for="idmodule">Pilih Module</label>
                                            <select name="idmodule" class="form-control" id="idmodule">
                                                <option value="">Pilih Module</option>
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
                                        <div style="flex: 1;">
                                            <label for="iduser_pic">Pilih PIC</label>
                                            @if (count($data->users_tickets) > 0)
                                            @foreach($data->users_tickets as $index => $row)
                                            <select name="iduser_pic[]" class="form-control iduser_pic" id="iduser_pic_{{ $index }}">
                                                <option value="">Pilih PIC</option>
                                                @foreach ($pic as $item)
                                                <option value="{{ $item->id }}" data-module="{{ $item->idmodule }}" {{ $row->iduser_pic == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <br>
                                            @error("iduser_pic.{$index}")
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            @endforeach
                                            <select name="iduser_pic[]" class="form-control iduser_pic" id="iduser_pic_{{ $index }}">
                                                <option value="">Pilih PIC</option>
                                                @foreach ($pic as $item)
                                                <option value="{{ $item->id }}" data-module="{{ $item->idmodule }}">
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @else
                                            <select name="iduser_pic[]" class="form-control" id="iduser_pic">
                                                <option value="">Pilih PIC</option>
                                                @foreach ($pic as $item)
                                                <option value="{{ $item->id }}" data-module="{{ $item->idmodule }}" {{ old('iduser_pic', $data->iduser_pic ?? '') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('iduser_pic')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            @endif
                                        </div>
                                        <div style="flex: 1;">
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
                                    <label for="company">Perusahaan</label>
                                    <input type="text" name="company" class="form-control" id="company" value="{{ $data->issue }}">
                                    @error('company')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kode_perusahaan">Kode Perusahaan</label>
                                    <input type="text" name="kode_perusahaan" class="form-control" id="kode_perusahaan" value="{{ $data->issue }}">
                                    @error('kode_perusahaan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="subjek">Subjek</label>
                                    <input type="text" name="subjek" class="form-control" id="subjek" value="{{ $data->issue }}">
                                    @error('subjek')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" name="subjek" class="form-control" id="kategori" placeholder="Masukan Kategori" value="{{ $data->categories->categoryname }}">
                                    @error('kategori')
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
                                <div class="form-group">
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const moduleSelect = document.getElementById('idmodule');
        const picSelects = document.querySelectorAll('.iduser_pic');

        const updatePicOptions = () => {
            const selectedmodule = moduleSelect.value;
            picSelects.forEach(select => {
                Array.from(select.options).forEach(option => {
                    const moduleId = option.getAttribute('data-module');
                    option.style.display = (selectedmodule && moduleId == selectedmodule) ? '' : 'none';
                });
            });
        };

        moduleSelect.addEventListener('change', updatePicOptions);
        updatePicOptions();
    });

</script>
