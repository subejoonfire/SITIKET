@extends('layout.main')
@section('content')

<style>
    .text-danger {
        color: red;
    }

    #keluhan,
    #email,
    #username,
    #phone,
    #module,
    #created_at,
    #tiket,
    #priority,
    #module,
    #subjek,
    #category,
    #detailissue,
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
                                <h4 class="card-title">Change Status</h4>
                            </div>
                            <div class="card-body">
                                <!-- Username, Email, No Handphone -->
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
                                        <input type="text" name="priority" class="form-control" id="priority" value="{{ $data->priority }}">
                                        @error('priority')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="category">Kategori</label>
                                        <input type="text" name="category" class="form-control" id="category" value="{{ $data->category }}">
                                        @error('issue')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="issue">Subjek</label>
                                        <input type="text" name="issue" class="form-control" id="issue" value="{{ $data->issue }}">
                                        @error('issue')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="detailissue">Keluhan</label>
                                        <textarea name="detailissue" class="form-control" id="detailissue" rows="3" placeholder="Enter Complaint Description">{{ $data->detailissue }}</textarea>
                                        @error('detailissue')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
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
                                            {{ $data->issue }}
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

                                <div class="message info">
                                    <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                    <div class="message-body">
                                        <div class="message-info">
                                            <h4> Elon Musk </h4>
                                            <h5> <i class="fa fa-clock-o"></i> 2:32 PM </h5>
                                        </div>
                                        <hr>
                                        <div class="message-text">
                                            Hah, too late, I already bought it and my team is impleting the new design right now.
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
