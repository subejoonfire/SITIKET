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
                <h4 class="page-title">Edit Category</h4>
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
                                <h4 class="card-title">Edit Category</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form Edit Category -->
                            <form method="POST" action="#">
                                @csrf
                                <!-- @method('PUT')  -->
                               
                        
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="name" class="form-control" id="category_name" placeholder="Enter Category Name" value="{{ old('name', 'Dummy Category Name') }}">
                                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                        
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <!-- Hanya untuk dummy, kita ganti action cancel menjadi link kosong -->
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
