@extends('layout.mainuser')

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
                <h4 class="page-title">Dashboard</h4>
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
                                <h4 class="card-title">Add Request</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('user/action/store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="iddepartment">Departemen</label>
                                    <select class="form-control" id="iddepartment" name="iddepartment">
                                        <option selected disabled hidden>Pilih Departemen</option>
                                        @foreach ($collection as $department)
                                        <option value="{{ $department->id }}" {{ old('iddepartment') == $department->id ? 'selected' : '' }}>{{ $department->departmentname }}</option>
                                        @endforeach
                                    </select>
                                    @error('iddepartment')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_name">Trouble</label>
                                    <textarea type="text" name="trouble" class="form-control" id="category_name" placeholder="Enter Category Name" cols="30" rows="10"></textarea>
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
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
