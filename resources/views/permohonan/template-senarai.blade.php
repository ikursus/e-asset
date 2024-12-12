@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Permohonan
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Senarai Permohonan</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('permohonan.create') }}" class="btn btn-primary">Permohonan Baru</a>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Senarai Permohonan
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>BIL</th>
                                <th>TUJUAN</th>
                                <th>TEMPAT DIGUNAKAN</th>
                                <th>TARIKH MULA PINJAM</th>
                                <th>ASSET DIPINJAM</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($senaraiPermohonan as $permohonan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permohonan->tujuan }}</td>
                                <td>{{ $permohonan->tempat_digunakan }}</td>
                                <td>{{ $permohonan->tarikh_mula }}</td>
                                <td>
                                    <ul>
                                    @foreach ($permohonan->permohonanItems as $item)
                                        <li>{{ $item->asset->nama }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('permohonan.show', $permohonan->id) }}" class="btn btn-info">Detail</a
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
