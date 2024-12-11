@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Bahagian
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Bahagian Baru</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('bahagian.create') }}" class="btn btn-primary">Tambah Bahagian</a>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Senarai Bahagian
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($senaraiBahagian as $bahagian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bahagian->nama }}</td>
                                <td>
                                    <form method="POST" action="{{ route('bahagian.destroy', $bahagian->id) }}">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('bahagian.edit', $bahagian->id) }}" class="btn btn-info">Edit</a>

                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm nak delete: {{ $bahagian->nama }}?')">
                                            Delete
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
    </div>
</div>
@endsection
