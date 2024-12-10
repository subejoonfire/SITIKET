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
    #department,
<<<<<<< HEAD:resources/views/pages/pic/ticket/review.blade.php
    #tanggal_diajukan,
    #tiket,
    #priority,
    #module,
    #issue

     {
=======
    #tanggal_diajukan {
>>>>>>> ab9b0d14e4a04b779602db7f7b50df05e6b39527:resources/views/pages/department/ticket/review.blade.php
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
                                    <h4 class="card-title">Change Status</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @csrf
<<<<<<< HEAD:resources/views/pages/pic/ticket/review.blade.php
                                <!-- Id_ticket, Priority, Module, Issue -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="tiket">ID Tiket</label>
                                        <input type="text" name="tiket" class="form-control" id="tiket" value="tktq212">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="priority">Priority</label>
                                        <input type="text" name="priority" class="form-control" id="priority" value="Medium">
                                    </div>
                                </div>
                    
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="module">Module</label>
                                        <input type="text" name="module" class="form-control" id="module" value="tktq212">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="issue">Issue</label>
                                        <input type="text" name="issue" class="form-control" id="issue" value="Medium">
                                    </div>
=======
                                <!-- Departemen sebagai input text biasa -->
                                <div class="form-group">
                                    <label for="department">Departemen</label>
                                    <input type="text" name="iddepartment" class="form-control" id="department" value="{{ $data->departments->departmentname }}">
                                    @error('iddepartment')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
>>>>>>> ab9b0d14e4a04b779602db7f7b50df05e6b39527:resources/views/pages/department/ticket/review.blade.php
                                </div>

                                <!-- Username, Phone, Email, Keluhan (menggunakan data) -->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" value="{{ $data->users->name }}">
                                        @error('username')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                    
                                    <div class="col-md-6">
                                        <label for="phone">No Handphone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $data->users->phone }}">
                                        @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                    
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $data->users->email }}">
                                        @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                    
                                    <div class="col-md-6">
                                        <label for="keluhan">Keluhan</label>
                                        <textarea name="keluhan" class="form-control" id="keluhan" placeholder="Enter Complaint Description">{{ $data->trouble }}</textarea>
                                        @error('keluhan')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
<<<<<<< HEAD:resources/views/pages/pic/ticket/review.blade.php
=======
                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea name="keluhan" class="form-control" id="keluhan" placeholder="Enter Complaint Description">{{ $data->trouble }}</textarea>
                                    @error('keluhan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_diajukan">Tanggal Diajukan</label>
                                    <input type="text" name="tanggal_diajukan" class="form-control" id="tanggal_diajukan" value="{{ $data->created_at->format('l, d F Y H:i') }}">
                                    @error('tanggal_diajukan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                @if ($type == 'index')
                                <div class="card-action">
                                    @if ($data->status == 'DIAJUKAN')
                                    <a href="{{ url('department/action/approved/'. $data->id) }}" class="btn btn-success">Setuju</a>
                                    <a href="{{ url('department/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                                    @endif
                                    <a href="{{ url('department/ticket') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                @elseif ($type == 'approved')
                                <div class="card-action">
                                    <a href="{{ url('department/action/processed/'. $data->id) }}" class="btn btn-success">Proses</a>
                                    <a href="{{ url('department/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                                    <a href="{{ url('department/ticket/approved') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                @elseif ($type == 'processed')
                                <div class="card-action">
                                    <a href="{{ url('department/action/done/'. $data->id) }}" class="btn btn-success">Selesai</a>
                                    <a href="{{ url('department/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                                    <a href="{{ url('department/ticket/processed') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                @elseif ($type == 'done')
                                <div class="card-action">
                                    <a href="{{ url('department/ticket/done') }}" class="btn btn-primary">Kembali</a>
                                </div>
                                @endif
>>>>>>> ab9b0d14e4a04b779602db7f7b50df05e6b39527:resources/views/pages/department/ticket/review.blade.php
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <h4 class="page-title">Pesan Masuk</h4>
            {{-- CHAT NEW --}}
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
                                                {{ $data->trouble }}
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

                @if ($type == 'index')
                <div class="card-action">
                    @if ($data->status == 'DIAJUKAN')
                    <a href="{{ url('pic/action/approved/'. $data->id) }}" class="btn btn-success">Setuju</a>
                    <a href="{{ url('pic/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                    @endif
                    <a href="{{ url('pic/ticket') }}" class="btn btn-primary">Kembali</a>
                </div>
                @elseif ($type == 'approved')
                <div class="card-action">
                    <a href="{{ url('pic/action/processed/'. $data->id) }}" class="btn btn-success">Proses</a>
                    <a href="{{ url('pic/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                    <a href="{{ url('pic/ticket/approved') }}" class="btn btn-primary">Kembali</a>
                </div>
                @elseif ($type == 'processed')
                <div class="card-action">
                    <a href="{{ url('pic/action/done/'. $data->id) }}" class="btn btn-success">Selesai</a>
                    <a href="{{ url('pic/action/declined/'. $data->id) }}" class="btn btn-danger">Tolak</a>
                    <a href="{{ url('pic/ticket/processed') }}" class="btn btn-primary">Kembali</a>
                </div>
                @elseif ($type == 'done')
                <div class="card-action">
                    <a href="{{ url('pic/ticket/done') }}" class="btn btn-primary">Kembali</a>
                </div>
                @endif
        </div>
        </div>
        </div>
    </div>
</div>
</div>

@endsection
