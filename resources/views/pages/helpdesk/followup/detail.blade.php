@extends('layout.mainhelp')
@section('content')
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
                                    <div class="col">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" value="{{ $data->users->name }}">
                                    </div>
                                    <div class="col">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $data->users->email }}">
                                    </div>
                                    <div class="col">
                                        <label for="phone">No Handphone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $data->users->phone }}">
                                    </div>
                                    <div class="col">
                                        <label for="perusahaan">Perusahaan</label>
                                        <input type="text" name="perusahaan" class="form-control" id="perusahaan" value="{{ $data->users->companies->companyname ?? 'Tidak ada'}}">
                                    </div>
                                    <div class="col">
                                        <label for="kode_perusahaan">Kode Perusahaan</label>
                                        <input type="text" name="kode_perusahaan" class="form-control" id="kode_perusahaan" value="{{ $data->users->companies->companycode ?? 'Tidak ada'}}">
                                    </div>
                                    <div class="col">
                                        <label for="department">Departemen</label>
                                        <input type="text" name="department" class="form-control" id="department" value="{{ $data->users->departments->departmentname ?? 'Tidak ada'}}">
                                    </div>
                                    <div class="col">
                                        <label for="module">Module</label>
                                        <input type="text" name="module" class="form-control" id="module" value="{{ $data->tickets->modules->modulename }}">
                                    </div>
                                    <div class="col">
                                        <label for="priority">Priority</label>
                                        <input type="text" name="priority" class="form-control" id="priority" value="{{ $data->tickets->priorities->priorityname ?? 'Prioritas tidak diatur' }}">
                                    </div>
                                    <div class="col">
                                        <label for="category">Kategori</label>
                                        <input type="text" name="category" class="form-control" id="category" value="{{ $data->tickets->categories->categoryname }}">
                                    </div>
                                    <div class="col">
                                        <label for="status">Status</label>
                                        <input type="text" name="status" class="form-control" id="category" value="{{ $data->tickets->followups->first()->status == 1 ? 'SELESAI' : 'MENUNGGU' }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <label for="created_at">Tanggal Diajukan</label>
                                        <input type="text" name="created_at" class="form-control" id="created_at" value="{{ $data->tickets->followups->first()->created_at->format('l, d F Y H:i') }}">
                                    </div>
                                    <div class="col">
                                        <label for="created_at">Kode Ticket</label>
                                        <input type="text" name="created_at" class="form-control" id="created_at" value="{{ $data->tickets->ticketcode }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="issue">Subjek</label>
                                        <input type="text" name="issue" class="form-control" id="issue" value="{{ $data->tickets->issue }}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="detailissue">Keluhan</label>
                                        <textarea name="detailissue" class="form-control" id="detailissue" rows="3">{{ $data->tickets->detailissue }}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="detailissue">Pesan Tindak Lanjut</label>
                                        <textarea id="detailissue" name="followup_text" class="form-control" placeholder="Masukkan Tindak Lanjut" rows="3">{{ $data->tickets->followups->first()->followup_issue ?? 'Tidak tersedia' }}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="fileview">File Diupload</label>
                                        <div class="d-flex align-items-center">
                                            @if($data->tickets->attachment != NULL)
                                            <a href="{{ url('storage/'. $data->tickets->attachment) }}" download class="btn btn-primary mr-2">
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
                                    @if ($type != 'done' && $data->tickets->followups->first()->status == 0)
                                    <div class="form-group row">
                                        <div class="col">
                                            <a href="{{ url('helpdesk/detail/' . $data->tickets->id) }}" class="btn btn-secondary mr-2">
                                                Tindak Lanjuti
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a href="{{ url('helpdesk/followup/done/' . $data->tickets->id) }}" class="btn btn-success mr-2">
                                                Selesai
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
