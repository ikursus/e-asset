@extends('layouts.template-induk')
@section('page-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Maklumat Pengguna</h1>
    <div>
        <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i> Kemaskini
        </a>
        <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <th style="width: 200px;">Nama</th>
                        <td>{{ $pengguna->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $pengguna->email }}</td>
                    </tr>
                    <tr>
                        <th>No. KP</th>
                        <td>{{ $pengguna->no_kp }}</td>
                    </tr>
                    <tr>
                        <th>No. Kakitangan</th>
                        <td>{{ $pengguna->no_kakitangan }}</td>
                    </tr>
                    <tr>
                        <th>No. Telefon</th>
                        <td>{{ $pengguna->phone }}</td>
                    </tr>
                    <tr>
                        <th>Bahagian</th>
                        <td>{{ $pengguna->bahagian->nama ?? 'Tiada' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ ucfirst($pengguna->status) }}</td>
                    </tr>
                    <tr>
                        <th>Tarikh Cipta</th>
                        <td>{{ $pengguna->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                    <tr>
                        <th>Tarikh Kemaskini</th>
                        <td>{{ $pengguna->updated_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                @if($pengguna->gambar)
                    <div class="text-center">
                        <img src="{{ asset('uploaded/images/' . $pengguna->gambar) }}"
                             alt="Gambar Pengguna" class="img-fluid rounded"
                             style="max-height: 300px;">
                    </div>
                @else
                    <div class="text-center text-muted">
                        <i class="fas fa-user fa-8x"></i>
                        <p class="mt-2">Tiada Gambar</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
