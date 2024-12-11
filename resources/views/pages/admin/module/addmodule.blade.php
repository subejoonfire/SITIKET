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
                <div class="col-md-12">
                    <form method="POST" action="#">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Form Tambah Module</div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="form-group">
                                    <label for="department">Nama Departemen</label>
                                    <select name="department" class="form-control" id="department">
                                        <option value="" disabled selected>Pilih Departemen</option>
                                        <option value="HR">HR</option>
                                        <option value="IT">IT</option>
                                        <option value="HRD">HRD</option>
                                        <option value="PLANT">PLANT</option>
                                        <option value="DLL">DLL</option>
                                    </select>
                                    @error('department')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label for="module_name">Nama Modul</label>
                                    <input type="text" name="module_name" class="form-control" id="module_name" placeholder="Masukkan nama modul" value="{{ old('module_name') }}">
                                    @error('module_name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="module_count">Jumlah Modul</label>
                                    <input type="number" name="module_count" class="form-control" id="module_count" placeholder="Masukkan jumlah modul" min="1" max="10" value="{{ old('module_count') }}">
                                    @error('module_count')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div id="dynamic_module_inputs"></div>
                            </div>

                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="{{ url('admin/module') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const moduleCountInput = document.getElementById('module_count');
        const dynamicInputsContainer = document.getElementById('dynamic_module_inputs');

        const createDynamicInputs = (count) => {
            dynamicInputsContainer.innerHTML = '';
            for (let i = 1; i <= count; i++) {
                const div = document.createElement('div');
                div.classList.add('form-group');
                div.innerHTML = `
                    <label for="module_input_${i}">Masukkan Module ke-${i}</label>
                    <input type="text" name="module_input_${i}" class="form-control" id="module_input_${i}" placeholder="Masukkan nama module ke-${i}">
                `;
                dynamicInputsContainer.appendChild(div);
            }
        };

        moduleCountInput.addEventListener('input', function () {
            const count = parseInt(moduleCountInput.value) || 0;
            if (count > 0 && count <= 10) {
                createDynamicInputs(count);
            } else {
                dynamicInputsContainer.innerHTML = '';
            }
        });
    });
</script>

@endsection
