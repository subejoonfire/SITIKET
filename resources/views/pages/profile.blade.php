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
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="name" placeholder="Name" value="Rizky">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Name" value="rizky@gmail.com">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>No Handphone</label>
                                        <input type="text" class="form-control" placeholder="Masukkan Nomor Handphone" value="083142170067" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Password Lama</label>
                                        <input type="text" class="form-control" placeholder="Masukan Password Lama" name="address">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-1">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default">
                                        <label>Password Baru</label>
                                        <input class="form-control" name="about" placeholder="Masukan Password Baru" rows="3">
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3 mb-3">
                                <button class="btn btn-success">Save</button>
                                <button class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-profile card-secondary">
                        <div class="card-header" style="background-image: url('{{ asset('back-end/assets/img/blogpost.jpg') }}')">
                            <div class="profile-picture">
                                <div class="avatar avatar-xl">
                                    <img id="profile-img" 
                                         src="{{ asset('back-end/assets/img/profile.jpg') }}" 
                                         alt="..." 
                                         class="avatar-img rounded-circle">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="user-profile text-center">
                                <div class="name">Rizky</div>
                            </div>
                            <div class="view-profile">
                                <button class="btn btn-info btn-block" onclick="document.getElementById('foto').click();">Ganti Profil</button>
                            </div>
                            <input type="file" id="foto" style="display: none;" accept="image/*" onchange="previewImage(event)">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('profile-img');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
