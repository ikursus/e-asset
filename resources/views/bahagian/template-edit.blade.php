@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Bahagian
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kemaskini Bahagian</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="POST" action="{{ route('bahagian.update', $bahagian->id) }}">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Bahagian</label>
                                    <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : NULL }}" name="nama" placeholder="Nama Bahagian" value="{{ old('nama') ?? $bahagian->nama }}">
                                    @error('nama')
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
