@extends('layouts.template-induk')

@section('page-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">
        Pilih Asset Permohonan
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ $permohonan->kuantiti }}</li>
    </ol>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Informasi Permohonan</div>
                <div class="card-body">

                    @include('layouts.template-alerts')

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-4">PERKARA</th>
                                    <th class="col-6">BUTIRAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tujuan Permohonan</td>
                                    <td>{{ $permohonan->tujuan }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat Digunakan</td>
                                    <td>{{ $permohonan->tempat_digunakan }}</td>
                                </tr>
                                <tr>
                                    <td>Status Permohonan</td>
                                    <td>{{ $permohonan->status }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">

                                        @if ($permohonan->status == 'draft')

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Pilih Asset
                                        </button>

                                        @endif

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">

                                                <form method="POST" action="{{ route('permohonan.update', $permohonan->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="tindakan_permohonan" value="tambah_asset">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Asset</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="asset_id" class="form-label">Asset</label>
                                                                        <select name="asset_id" id="asset_id" class="form-select {{ $errors->has('asset_id') ? 'is-invalid' : NULL }}">
                                                                            <option value="">Pilih Asset</option>
                                                                            @foreach ($senaraiAsset as $asset)
                                                                            <option value="{{ $asset->id }}">{{ $asset->nama }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('asset_id')
                                                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="kuantiti" class="form-label">Kuantiti</label>
                                                                        <input type="number" min="1" step="1" class="form-control {{ $errors->has('kuantiti') ? 'is-invalid' : NULL }}" name="kuantiti" value="{{ old('kuantiti') }}">
                                                                        @error('kuantiti')
                                                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="catatan" class="form-label">Catatan</label>
                                                                        <input type="text" class="form-control {{ $errors->has('catatan') ? 'is-invalid' : NULL }}" name="catatan" placeholder="Catatan" value="{{ old('catatan') }}">
                                                                        @error('catatan')
                                                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Tambah Asset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">Maklumat Asset</div>
                <div class="card-body">

                    @include('layouts.template-alerts')

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="col-4">Asset</th>
                                    <th class="col-2">Kuantiti</th>
                                    <th class="col-4">Catatan</th>
                                    <th class="col-2">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permohonanAssets as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->kuantiti }}</td>
                                    <td>{{ $item->catatan }}</td>
                                    <td>
                                        @if ($permohonan->status == 'draft')
                                        <form action="{{ route('permohonan.asset.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm nak delete: {{ $asset->nama }}?')">Hapus</button>
                                        </form>
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @if ($permohonan->status == 'draft')
                            <tfoot>
                                <tr>
                                    <td colspan="4">
                                        <div class="d-flex justify-content-start">
                                            <form method="POST" action="{{ route('permohonan.update', $permohonan->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="tindakan_permohonan" value="hantar_permohonan">
                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Confirm submission permohonan?')">Hantar Permohonan</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                            @endif

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
