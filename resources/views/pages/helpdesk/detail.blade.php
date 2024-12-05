@extends('layout.mainhelp')

@section('content')

<style>
    .text-danger {
        color: red;
    }

    /* Custom CSS untuk textarea readonly */
    #category_name[readonly] {
        background-color: white !important; /* Membuat background menjadi putih */
        color: black !important; /* Membuat teks menjadi hitam */
        border: 1px solid #fffefe; /* Memberikan border yang lebih jelas */
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

                                <div class="form-group">
                                    <label for="category_name">Departement</label>
                                    <select name="name" class="form-control" id="category_name">
                                        <option value="">Select Department</option>
                                        @foreach ($collection as $department)
                                        <option value="{{ $department->id }}" {{ old('iddepartment') == $department->id ? 'selected' : '' }}>{{ $department->departmentname }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Masalah Textarea -->
                                <div class="form-group">
                                    <label for="category_name">Masalah</label>
                                    <textarea name="name" class="form-control" id="category_name" placeholder="Enter Trouble Description" readonly>mASALAH SERIUS</textarea>
                                    @error('name')
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
