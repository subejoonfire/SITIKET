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
                                    $name = 'Dummy Department'; // Data dummy untuk nama
                                    $status = 'accept'; // Data dummy untuk status
                                @endphp

                                <div class="form-group">
                                    <label for="category_name">Departement</label>
                                    <input type="text" name="name" class="form-control" id="category_name" placeholder="Enter Category Name" value="{{ $name }}">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="category_name">Trouble</label>
                                    <input type="text" name="name" class="form-control" id="category_name" placeholder="Enter Category Name" value="mASALAH SERIUS">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="accept" {{ $status == 'accept' ? 'selected' : '' }}>ACCEPT</option>
                                        <option value="reject" {{ $status == 'reject' ? 'selected' : '' }}>REJECT</option>
                                    </select>
                                    @error('status') 
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
