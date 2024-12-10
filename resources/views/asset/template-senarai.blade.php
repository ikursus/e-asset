@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Asset
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Daftar Asset Baru</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('asset.create') }}" class="btn btn-primary">Tambah Asset</a>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Senarai Asset
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>ITEM</th>
                                <th>KUANTITI</th>
                                <th>STATUS</th>
                                <th>TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
