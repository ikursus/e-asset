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

            <form method="POST" action="{{ route('asset.update', $asset->id) }}">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Asset</label>
                                    <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : NULL }}" name="nama" placeholder="Nama Lengkap" value="{{ old('nama') ?? $asset->nama }}">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_kp" class="form-label">Kuantiti</label>
                                    <input type="number" class="form-control" name="kuantiti" placeholder="Kuantiti" min="0" step="1" value="{{ old('kuantiti') ?? $asset->kuantiti }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_kp" class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        <option value="available" {{ (old('status') ?? $asset->nama) == 'available' ? 'selected' : NULL }}>Available</option>
                                        <option value="unavailable" {{ (old('status') ?? $asset->nama) == 'unavailable' ? 'selected' : NULL }}>Unavailable</option>
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
