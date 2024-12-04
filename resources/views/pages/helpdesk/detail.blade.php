@extends('layout.mainhelp')

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
                                    <label for="category_name">Departement</label>
                                    <select name="name" class="form-control" id="category_name">
                                        <option value="">Select Department</option>
                                        <option value="IT" {{ $name == 'IT' ? 'selected' : '' }}>IT</option>
                                        <option value="HR" {{ $name == 'HR' ? 'selected' : '' }}>HR</option>
                                        <option value="Finance" {{ $name == 'Finance' ? 'selected' : '' }}>Finance</option>
                                        <option value="Marketing" {{ $name == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                    </select>
                                    @error('name') 
                                    <small class="text-danger">{{ $message }}</small> 
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="category_name">Masalah</label>
                                    <textarea name="name" class="form-control" id="category_name" placeholder="Enter Trouble Description" disabled>mASALAH SERIUS</textarea>
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
