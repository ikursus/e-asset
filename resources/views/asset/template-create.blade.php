@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Asset
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Asset Baru</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="POST" action="{{ route('asset.store') }}">
                @csrf
                <div class="card">
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Asset</label>
                                    <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : NULL }}" name="nama" placeholder="Nama Lengkap">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_kp" class="form-label">Kuantiti</label>
                                    <input type="number" class="form-control" name="kuantiti" placeholder="Kuantiti" min="0" step="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_kp" class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="available">Available</option>
                                        <option value="unavailable">Unavailable</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@stop
