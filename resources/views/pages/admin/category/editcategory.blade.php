@extends('layout.mainadmin')

@section('content')



<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
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
                    <form method="POST" action="{{ url('admin/category/action/update/'. $data->id) }}">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Ubah category</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryname">Nama Modul</label>
                                    <input type="text" name="categoryname" class="form-control" id="categoryname" placeholder="Masukkan nama modul" value="{{ $data->categoryname }}">
                                    @error('categoryname')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ url('admin/category') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categoryCountInput = document.getElementById('category_count');
        const dynamicInputsContainer = document.getElementById('dynamic_category_inputs');

        const createDynamicInputs = (count) => {
            dynamicInputsContainer.innerHTML = '';
            for (let i = 1; i <= count; i++) {
                const div = document.createElement('div');
                div.classList.add('form-group');
                div.innerHTML = `
                    <label for="category_input_${i}">Masukkan category ke-${i}</label>
                    <input type="text" name="category_input_${i}" class="form-control" id="category_input_${i}" placeholder="Masukkan nama category ke-${i}">
                `;
                dynamicInputsContainer.appendChild(div);
            }
        };

        categoryCountInput.addEventListener('input', function() {
            const count = parseInt(categoryCountInput.value) || 0;
            if (count > 0 && count <= 10) {
                createDynamicInputs(count);
            } else {
                dynamicInputsContainer.innerHTML = '';
            }
        });
    });

</script>

@endsection
