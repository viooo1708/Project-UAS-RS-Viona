@extends('layouts.main')

@section('title', 'Edit Pasien')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Edit Data Pasien</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.pasien.update', $pasien->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $pasien->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="2" required>{{ $pasien->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label for="no_hp" class="form-label fw-semibold">No. HP</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" value="{{ $pasien->no_hp }}" required>
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label fw-semibold">NIK</label>
                <input type="text" name="nik" class="form-control" id="nik" value="{{ $pasien->nik }}" required>
            </div>

            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select" id="jenis_kelamin" required>
                    <option value="L" {{ $pasien->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $pasien->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $pasien->tanggal_lahir }}" required>
            </div>

            <div class="mb-3">
                <label for="riwayat_penyakit" class="form-label fw-semibold">Riwayat Penyakit</label>
                <textarea name="riwayat_penyakit" class="form-control" id="riwayat_penyakit" rows="2">{{ $pasien->riwayat_penyakit }}</textarea>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.pasien.index') }}" class="btn btn-secondary rounded-pill">Batal</a>
                <button type="submit" class="btn btn-pink rounded-pill">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
