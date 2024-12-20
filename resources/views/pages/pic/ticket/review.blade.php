@extends('layout.main')
@section('content')

@include('css/pic/picreview')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Detail User</h4>
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
                    <form method="POST" action="{{ url('#') }}">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" value="{{ $data->users->name }}">
                                        @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $data->users->email }}">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone">No Handphone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $data->users->phone }}">
                                        @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <label for="module">Module</label>
                                        <input type="text" name="module" class="form-control" id="module" value="{{ $data->modules->modulename }}">
                                        @error('module')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="created_at">Tanggal Diajukan</label>
                                        <input type="text" name="created_at" class="form-control" id="created_at" value="{{ $data->created_at }}">
                                        @error('created_at')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="priority">Priority</label>
                                        <input type="text" name="priority" class="form-control" id="priority" value="{{ $data->priorities->priorityname ?? 'Prioritas tidak diatur' }}">
                                        @error('priority')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="perusahaan">Perusahaan</label>
                                            <input type="text" name="perusahaan" class="form-control" id="perusahaan" value="{{ $data->users->companies->companyname ?? 'Tidak ada'}}">
                                            @error('perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kode_perusahaan">Kode Perusahaan</label>
                                            <input type="text" name="kode_perusahaan" class="form-control" id="kode_perusahaan" value="{{ $data->users->companies->companycode ?? 'Tidak ada'}}">
                                            @error('kode_perusahaan')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="department">Departemen</label>
                                            <input type="text" name="department" class="form-control" id="department" value="{{ $data->users->departments->departmentname ?? 'Tidak ada'}}">
                                            @error('department')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 mb-3">
                                        <label for="category">Kategori</label>
                                        <input type="text" name="category" class="form-control" id="category" value="{{ $data->categories->categoryname }}">
                                        @error('category')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="issue">Subjek</label>
                                        <input type="text" name="issue" class="form-control" id="issue" value="{{ $data->issue }}">
                                        @error('issue')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="detailissue">Keluhan</label>
                                        <textarea name="detailissue" class="form-control" id="detailissue" rows="3" placeholder="Enter Complaint Description" readonly>{{ $data->detailissue }}</textarea>
                                        @error('detailissue')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label for="fileview">File Diupload</label>
                                        <div class="d-flex align-items-center" style="border: 1px solid #ddd; border-radius: 5px; padding: 5px;">
                                            @if($data->attachment != NULL)
                                            <a href="{{ url('storage/'. $data->attachment) }}" download class="btn btn-primary mr-2">
                                                Unduh
                                            </a>
                                            <span style="flex-grow: 1; color: #000; font-weight:">
                                                Unduh File
                                            </span>
                                            @else
                                            <div class="form-control text-muted">Tidak ada file terkait.</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if ($type == 'index')
                                <div class="form-group">
                                    @if ($data->status == 'DIAJUKAN')
                                    <a href="{{ url('pic/action/approved/'. $data->id) }}" class="btn btn-success">Setuju</a>
                                    <a href="{{ url('pic/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                                    @endif
                                    <a href="{{ url('pic/ticket') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                @elseif ($data->status == 'DISETUJUI')
                                <div class="card-action">
                                    <a href="{{ url('pic/action/processed/'. $data->id) }}" class="btn btn-success">Proses</a>
                                    <a href="{{ url('pic/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                                    <a href="{{ url('pic/ticket/approved') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                @elseif ($data->status == 'DIPROSES')
                                <div class="card-action">
                                    <a href="{{ url('pic/action/done/'. $data->id) }}" class="btn btn-success">Selesai</a>
                                    <a href="{{ url('pic/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                                    <a href="{{ url('pic/ticket/processed') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                @elseif ($data->status == 'SELESAI')
                                <div class="card-action">
                                    <a href="{{ url('pic/ticket/done') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('layout/messages')
        </div>
    </div>
</div>
<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }
    document.addEventListener("DOMContentLoaded", function () {
        const textarea = document.getElementById("detailissue");
        if (textarea) {
            autoResize(textarea);
        }
    });
</script>
@endsection
