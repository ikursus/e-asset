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

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('pengguna.create') }}" class="btn btn-primary">Daftar Pengguna</a>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Senarai Pengguna
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>BAHAGIAN</th>
                                <th>NO. K/P</th>
                                <th>NO. KAKITANGAN</th>
                                <th>TELEFON</th>
                                <th>STATUS</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($senaraiPengguna as $pengguna)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengguna->name }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>{{ $pengguna->bahagian_id }}</td>
                                <td>{{ $pengguna->no_kp }}</td>
                                <td>{{ $pengguna->no_kakitangan }}</td>
                                <td>{{ $pengguna->telefon }}</td>
                                <td>{{ $pengguna->status }}</td>
                                <td>
                                    <form action="{{ route('pengguna.destroy', $pengguna->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('pengguna.edit', $pengguna->id) }}" class="btn btn-info">Edit</a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm nak delete: {{ $pengguna->name }}?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
