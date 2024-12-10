@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Pengguna
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Pengguna Baru</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <form>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap">
                                </div>
                                <div class="mb-3">
                                    <label for="no_kp" class="form-label">No. KP</label>
                                    <input type="text" class="form-control" id="no_kp" placeholder="No. Kad Pengenalan">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="alamat email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="no_kakitangan" class="form-label">No. Kakitangan</label>
                                    <input type="text" class="form-control" id="no_kakitangan" placeholder="No. Kakitangan">
                                </div>
                                <div class="mb-3">
                                    <label for="telefon" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" id="telefon" placeholder="No. Telefon">
                                </div>
                                <div class="mb-3">
                                    <label for="bahagian" class="form-label">Bahagian</label>
                                    <select class="form-select" id="bahagian">
                                        <option value="">Pilih Bahagian</option>
                                        <option value="Bahagian A">Bahagian A</option>
                                        <option value="Bahagian B">Bahagian B</option>
                                        <option value="Bahagian C">Bahagian C</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status">
                                        <option value="">Pilih Status</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
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
