@extends('layout.mainhelp')

@section('content')

<style>
    .text-danger {
        color: red;
    }

    /* Custom CSS untuk textarea readonly */
    #keluhan[readonly] {
        background-color: white !important; /* Membuat background menjadi putih */
        color: black !important; /* Membuat teks menjadi hitam */
        border: 1px solid #fffefe; /* Memberikan border yang lebih jelas */
    }

    #email[readonly] {
        background-color: white !important; /* Membuat background menjadi putih */
        color: black !important; /* Membuat teks menjadi hitam */
        border: 1px solid #fffefe; /* Memberikan border yang lebih jelas */
    }

    #username[readonly] {
        background-color: white !important; /* Membuat background menjadi putih */
        color: black !important; /* Membuat teks menjadi hitam */
        border: 1px solid #fffefe; /* Memberikan border yang lebih jelas */
    }

    #phone[readonly] {
        background-color: white !important; /* Membuat background menjadi putih */
        color: black !important; /* Membuat teks menjadi hitam */
        border: 1px solid #fffefe; /* Memberikan border yang lebih jelas */
    }

    #tanggal_diajukan[readonly] {
        background-color: white !important; /* Membuat background menjadi putih */
        color: black !important; /* Membuat teks menjadi hitam */
        border: 1px solid #fffefe; /* Memberikan border yang lebih jelas */
    }

    /* Custom CSS untuk select Departemen */
#department {
    background-color: #ffffff !important; /* Latar belakang putih */
    color: #000 !important; /* Teks hitam */
    border: 2px solid #4CAF50 !important; /* Border hijau agar lebih mencolok */
    padding: 8px; /* Menambahkan padding agar lebih rapi */
    cursor: pointer; /* Menunjukkan elemen dapat dipilih */
}

/* Untuk menambahkan efek fokus agar lebih jelas saat dropdown dipilih */
#department:focus {
    border-color: #2196F3 !important; /* Ganti border menjadi biru saat fokus */
    box-shadow: 0 0 5px rgba(33, 150, 243, 0.5); /* Menambahkan efek cahaya */
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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Change Status</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form -->
                            <form method="POST" action="{{ url('helpdesk/detail') }}">
                                @csrf
                                <!-- Data Dummy -->
                                @php
                                $name = 'Jhonlin Bratama DSP';
                                @endphp

                                <!-- Username -->
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" value="jhonlinbratama" readonly>
                                    @error('username')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- No Handphone -->
                                <div class="form-group">
                                    <label for="phone">No Handphone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="081234567890" readonly>
                                    @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="jhonlin@example.com" readonly>
                                    @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Departement -->
                                <div class="form-group">
                                    <label for="department">Departement</label>
                                    <select name="name" class="form-control" id="department">
                                        <option value="">Select Department</option>
                                        @foreach ($collection as $department)
                                        <option value="{{ $department->id }}" {{ old('iddepartment') == $department->id ? 'selected' : '' }}>{{ $department->departmentname }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>                                

                                <!-- Keluhan Textarea -->
                                <div class="form-group">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea name="keluhan" class="form-control" id="keluhan" placeholder="Enter Complaint Description" readonly>mASALAH SERIUS</textarea>
                                    @error('keluhan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Tanggal Diajukan -->
                                <div class="form-group">
                                    <label for="tanggal_diajukan">Tanggal Diajukan</label>
                                    <input type="text" name="tanggal_diajukan" class="form-control" id="tanggal_diajukan" value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" readonly>
                                    @error('tanggal_diajukan')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="#" class="btn btn-danger">Cancel</a>
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
