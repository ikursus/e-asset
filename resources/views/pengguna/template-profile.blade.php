@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Akaun
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Profile</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-body">

                        @include('layouts.template-alerts')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : NULL }}" name="nama" placeholder="Nama Lengkap">
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="no_kp" class="form-label">No. KP</label>
                                    <input type="text" class="form-control" name="no_kp" placeholder="No. Kad Pengenalan">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="alamat email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_kakitangan" class="form-label">No. Kakitangan</label>
                                    <input type="text" class="form-control" name="no_kakitangan" placeholder="No. Kakitangan">
                                </div>
                                <div class="mb-3">
                                    <label for="telefon" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" name="telefon" placeholder="No. Telefon">
                                </div>
                                <div class="mb-3">
                                    <label for="bahagian" class="form-label">Bahagian</label>
                                    <select class="form-select" name="bahagian">
                                        <option value="">Pilih Bahagian</option>
                                        <option value="Bahagian A">Bahagian A</option>
                                        <option value="Bahagian B">Bahagian B</option>
                                        <option value="Bahagian C">Bahagian C</option>
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
