@php
$wire = match (auth()->user()->level) {
1 => 'layout.mainadmin',
2 => 'layout.mainhelp',
3 => 'layout.main',
4 => 'layout.mainuser',
default => 'layout.default',
};
@endphp

@extends($wire)

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <h4 class="page-title">User Profile</h4>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-info" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Profile</a> </li>
                                </ul>
                            </div>
                        </div>
                        <form action="{{ url('update/profile') }}" method="post">
                            @csrf
                            <div class="card-body">
                                @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ auth()->user()->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Name" value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Kode Perusahaan</label>
                                            <input type="text" class="form-control no-cursor" placeholder="Kode Perusahaan" value="{{ auth()->user()->companies->companycode ?? 'Tidak ada perusahaan terkait' }}" name="kode">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>No Handphone</label>
                                            <input type="text" class="form-control" placeholder="Masukkan Nomor Handphone" value="{{ auth()->user()->phone }}" name="phone" pattern="[0-9]*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Password Lama</label>
                                            <input type="text" class="form-control" placeholder="Masukan Password Lama" name="old_password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 mb-1">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label>Password Baru</label>
                                            <input class="form-control" name="about" placeholder="Masukan Password Baru" name="new_password" rows="3">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right mt-3 mb-3">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <button class="btn btn-danger">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile card-secondary">
                        <div class="card-header" style="background-image: url('{{ asset('storage/profiles/blogpost.jpg') }}')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img id="profile-img" src="{{ url('storage/profiles/' . (auth()->user()->image ?? 'default.jpg')) }}" alt="..." class="avatar-img rounded-circle" style="cursor: pointer;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name">{{ auth()->user()->name }}</div>
                            </div>
                            <form action="{{ url('profile/image') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="view-profile">
                                    <button type="button" class="btn btn-info btn-block" onclick="document.getElementById('foto').click();">Pilih Foto</button>
                                </div>
                                <input type="file" id="foto" name="image" style="display: none;" accept="image/*" onchange="previewImage(event)">
                                <div id="save-button-container" class="text-center mt-3" style="display: none;">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                            <form action="{{ url('profile/image/delete') }}" method="post" class="mt-3">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-block">Hapus Foto</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('profile-img');
            output.src = reader.result;
            document.getElementById('save-button-container').style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }

</script>
@endsection
