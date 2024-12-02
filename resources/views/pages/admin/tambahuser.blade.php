
@extends('layout.mainadmin')

@section('content')

<style>
    .text-danger {
        color: red;
    }
</style>
<div class="page-inner">
    <div class="page-header">
        <div class="col-md-12">
            <form>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Form Tambah User</div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan Username">
                            <small class="text-danger" style="display:none;">Error message</small>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                            <small class="text-danger" style="display:none;">Error message</small>
                        </div>
                      
                        <div class="form-group">
                            <label for="email2">Email</label>
                            <input type="email" name="email" class="form-control" id="email2" placeholder="Masukkan Email">
                            <small class="text-danger" style="display:none;">Error message</small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password (Isi menggunakan huruf besar dan kecil minimal 8 huruf)</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan Password">
                            <small class="text-danger" style="display:none;">Error message</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Level</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="role">
                                <option selected disabled hidden>Pilih Role</option>
                                <option>admin</option>
                                <option>Departement</option>
                            </select>
                            <small class="text-danger" style="display:none;">Error message</small>
                        </div>
                        <div class="form-group">
                            <label for="profile">Profile</label>
                            <input type="text" name="nohp" class="form-control" id="profile" placeholder="Masukkan Profile">
                            <small class="text-danger" style="display:none;">Error message</small>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="button" class="btn btn-success saveButton">Simpan</button>
                        <button type="button" class="btn btn-danger">Batal</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection