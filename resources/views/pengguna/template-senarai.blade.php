@extends('layouts.template-induk')
@section('page-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Senarai Pengguna</h1>
    <div>
        <a href="{{ route('pengguna.export') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Export Excel
        </a>
        <a href="{{ route('pengguna.pdf') }}" class="btn btn-danger">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
        <a href="{{ route('pengguna.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Pengguna
        </a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. KP</th>
                        <th>No. Kakitangan</th>
                        <th>Phone</th>
                        <th>Bahagian</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($senaraiPengguna as $pengguna)
                    <tr>
                        <td>{{ $pengguna->id }}</td>
                        <td>{{ $pengguna->name }}</td>
                        <td>{{ $pengguna->email }}</td>
                        <td>{{ $pengguna->no_kp }}</td>
                        <td>{{ $pengguna->no_kakitangan }}</td>
                        <td>{{ $pengguna->phone }}</td>
                        <td>{{ $pengguna->bahagian->nama ?? 'Tiada' }}</td>
                        <td>{{ ucfirst($pengguna->status) }}</td>
                        <td>
                            <a href="{{ route('pengguna.show', $pengguna->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Adakah anda pasti?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
