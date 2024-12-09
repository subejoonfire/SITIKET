@extends('layout.mainadmin')

@section('content')

<style>
    .text-danger {
        color: red;
    }

</style>

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
                            <form method="POST" action="{{ url('admin/user/action/update', $user->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="name" class="form-control" id="username" placeholder="Masukkan Username" value="{{ old('name', $user->name) }}">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{ old('email', $user->email) }}">
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password (Isi jika ingin mengganti password)</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select class="form-control" id="level" name="level">
                                        <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ old('level') == 2 ? 'selected' : '' }}>Helpdesk</option>
                                        <option value="3" {{ old('level') == 3 ? 'selected' : '' }}>Pic</option>
                                        <option value="4" {{ old('level') == 4 ? 'selected' : '' }}>User</option>
                                    </select>
                                    @error('level') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="idpic">Departemen</label>
                                    <select class="form-control" id="idpic" name="idpic">
                                        <option selected disabled hidden>Pilih Departemen</option>
                                        @foreach ($collection as $pic)
                                        <option value="{{ $pic->id }}" {{ old('idpic') == $pic->id ? 'selected' : '' }}>{{ $pic->picname }}</option>
                                        @endforeach
                                    </select>
                                    @error('idpic')
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

@endsection
