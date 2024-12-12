@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Pengguna
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Kemaskini Pengguna: {{ $pengguna->name }}</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="POST" action="{{ route('pengguna.update', $pengguna->id) }}">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : NULL }}" name="name" placeholder="Nama Lengkap" value="{{ $pengguna->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_kp" class="form-label">No. KP</label>
                                    <input type="text" class="form-control" name="no_kp" placeholder="No. Kad Pengenalan" value="{{ $pengguna->no_kp }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="alamat email" value="{{ $pengguna->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_kakitangan" class="form-label">No. Kakitangan</label>
                                    <input type="text" class="form-control" name="no_kakitangan" placeholder="No. Kakitangan" value="{{ $pengguna->no_kakitangan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" name="phone" placeholder="No. Telefon" value="{{ $pengguna->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="bahagian" class="form-label">Bahagian</label>
                                    <select class="form-select" name="bahagian_id">
                                        <option value="">-- Pilih Bahagian --</option>
                                        @foreach( $senaraiBahagian as $bahagian )
                                        <option value="{{ $bahagian->id }}" {{ $pengguna->bahagian_id == $bahagian->id ? 'selected' : NULL }}>{{ $bahagian->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="">Pilih Status</option>
                                        <option value="aktif" {{ $pengguna->status == 'aktif' ? 'selected' : NULL }}>Aktif</option>
                                        <option value="tidak_aktif" {{ $pengguna->status == 'tidak_aktif' ? 'selected' : NULL }}>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@stop
