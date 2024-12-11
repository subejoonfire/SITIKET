@extends('layout.mainuser')

@section('content')

<style>
    .text-danger {
        color: red;
    }

    #ticketcode,
    #priority,
    #module,
    #status,
    #subjek,
    #department,
    #tanggal_diajukan,
    #issue {
        background-color: #ffffff !important;
        color: #000000 !important;
        border: 1px solid #D1D1D1 !important;
        padding: 8px;
        font-weight: normal !important;
        pointer-events: none;
    }

</style>

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
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Notifikasi Pesan</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="form-group row">
                                    <!-- Baris 1 -->
                                    <div class="col-md-4">
                                        <label for="ticketcode">Kode Tiket</label>
                                        <input type="text" name="ticketcode" class="form-control" id="ticketcode" value="{{ $data->ticketcode }}">
                                        @error('ticketcode')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="priority">Priority</label>
                                        <input type="text" name="priority" class="form-control" id="priority" value="{{ $data->priority ?? 'Belum ada' }}">
                                        @error('priority')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="module">Module</label>
                                        <input type="text" name="module" class="form-control" id="module" value="{{ $data->module ?? 'Belum ada' }}">
                                        @error('module')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- Baris 2 -->
                                    <div class="col-md-4">
                                        <label for="status">Status</label>
                                        <span class="form-control" id="status">{{ $data->status }}</span>
                                        @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="subjek">Subjek</label>
                                        <span class="form-control" id="subjek">{{ $data->issue }}</span>
                                        @error('subjek')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="department">Departemen Diterima</label>
                                        <span class="form-control" id="department">{{ $data->issue }}</span>
                                        @error('iddepartment')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_diajukan">Tanggal Diajukan</label>
                                    <input type="text" name="tanggal_diajukan" class="form-control" id="tanggal_diajukan" value="{{ $data->created_at->format('l, d F Y H:i') }}" placeholder="Masukkan Tanggal">
                                    @error('tanggal_diajukan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="issue">Issue</label>
                                    <textarea name="issue" class="form-control" id="issue" rows="4">{{ $data->detailissue }}</textarea>
                                    @error('issue')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if ($data->status != 'DIAJUKAN' && $data->status != 'TERKIRIM')
            <h4 class="page-title">Pesan Masuk</h4>
            <div class="container">
                <div class="panel messages-panel">
                    <div class="tab-content">
                        <div class="tab-pane message-body active" id="inbox-message-1">
                            <div class="new-message-wrapper">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Send message to...">
                                    <a class="btn btn-danger close-new-message" href="#"><i class="fa fa-times"></i></a>
                                </div>
                                <div class="chat-footer new-message-textarea">
                                    <textarea class="send-message-text"></textarea>
                                    <label class="upload-file">
                                        <input type="file" required="">
                                        <i class="fa fa-paperclip"></i>
                                    </label>
                                    <button type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>
                                </div>
                            </div>
                        </div>
                        <div class="message-chat">
                            <div class="chat-body">
                                <div class="message info">
                                    <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                    <div class="message-body">
                                        <div class="message-info">
                                            <h4> {{ $data->users->name }} </h4>
                                            <h5> <i class="fa fa-clock-o"></i> 2:25 PM </h5>
                                        </div>
                                        <hr>
                                        <div class="message-text">
                                            {{ $data->detailissue }}
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="message my-message">
                                    <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">
                                    <div class="message-body">
                                        <div class="message-body-inner">
                                            <div class="message-info">
                                                <h4> Dennis Novac </h4>
                                                <h5> <i class="fa fa-clock-o"></i> 2:28 PM </h5>
                                            </div>
                                            <hr>
                                            <div class="message-text">
                                                Thanks, I think I will use this for my next dashboard system.
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            <div class="chat-footer">
                                <textarea class="send-message-text"></textarea>
                                <label class="upload-file">
                                    <input type="file" required="">
                                    <i class="fa fa-paperclip"></i>
                                </label>
                                <button type="button" class="send-message-button btn-info"> <i class="fas fa-paper-plane"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection
