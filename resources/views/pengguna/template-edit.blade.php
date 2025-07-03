@extends('layouts.template-induk')
@section('page-content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Kemaskini Pengguna</h1>
    <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('pengguna.update', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name', $pengguna->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email', $pengguna->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_kp" class="form-label">No. KP</label>
                        <input type="text" class="form-control @error('no_kp') is-invalid @enderror"
                               id="no_kp" name="no_kp" value="{{ old('no_kp', $pengguna->no_kp) }}" required>
                        @error('no_kp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="no_kakitangan" class="form-label">No. Kakitangan</label>
                        <input type="text" class="form-control @error('no_kakitangan') is-invalid @enderror"
                               id="no_kakitangan" name="no_kakitangan" value="{{ old('no_kakitangan', $pengguna->no_kakitangan) }}" required>
                        @error('no_kakitangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label">No. Telefon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                               id="phone" name="phone" value="{{ old('phone', $pengguna->phone) }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bahagian_id" class="form-label">Bahagian</label>
                        <select class="form-control @error('bahagian_id') is-invalid @enderror"
                                id="bahagian_id" name="bahagian_id" required>
                            <option value="">Sila Pilih</option>
                            @foreach($senaraiBahagian as $bahagian)
                                <option value="{{ $bahagian->id }}"
                                    {{ old('bahagian_id', $pengguna->bahagian_id) == $bahagian->id ? 'selected' : '' }}>
                                    {{ $bahagian->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('bahagian_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                            <option value="">Sila Pilih</option>
                            <option value="aktif" {{ old('status', $pengguna->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="tidak_aktif" {{ old('status', $pengguna->status) == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        @if($pengguna->gambar)
                            <div class="mb-2">
                                <img src="{{ asset('uploaded/images/' . $pengguna->gambar) }}"
                                     alt="Gambar Pengguna" class="img-thumbnail" style="max-height: 100px;">
                            </div>
                        @endif
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                               id="gambar" name="gambar">
                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('pengguna.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
