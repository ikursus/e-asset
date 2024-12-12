@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Permohonan
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Permohonan Baru</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="POST" action="{{ route('permohonan.store') }}">
                @csrf
                <div class="card">
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="tujuan" class="form-label">Tujuan Dipinjam</label>
                                    <input type="text" class="form-control {{ $errors->has('tujuan') ? 'is-invalid' : NULL }}" name="tujuan" placeholder="Tujuan Dipinjam">
                                    @error('tujuan')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="tempat_digunakan" class="form-label">Tempat Digunakan</label>
                                    <input type="text" class="form-control {{ $errors->has('tempat_digunakan') ? 'is-invalid' : NULL }}" name="tujuan" placeholder="Tempat Digunakan">
                                    @error('tempat_digunakan')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
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
