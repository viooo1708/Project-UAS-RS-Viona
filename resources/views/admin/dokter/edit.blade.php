@extends('layouts.main')

@section('title', 'Edit Dokter')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Edit Data Dokter</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.dokter.update', $dokter->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama Dokter</label>
                <input type="text" name="nama" class="form-control" id="nama" value="{{ $dokter->nama }}" required>
            </div>

            <div class="mb-3">
                <label for="spesialis" class="form-label fw-semibold">Spesialis</label>
                <input type="text" name="spesialis" class="form-control" id="spesialis" value="{{ $dokter->spesialis }}" required>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label fw-semibold">Rating (0 - 5)</label>
                <input type="number" name="rating" class="form-control" id="rating" min="0" max="5" step="0.1" value="{{ $dokter->rating }}">
            </div>

            <div class="mb-3">
                <label for="foto_upload" class="form-label fw-semibold">Upload Foto Dokter (opsional)</label>
                <input type="file" name="foto_upload" class="form-control" id="foto_upload" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="foto_link" class="form-label fw-semibold">Atau Masukkan Link Foto (opsional)</label>
                <input type="url" name="foto_link" class="form-control" id="foto_link" value="{{ Str::startsWith($dokter->foto, 'http') ? $dokter->foto : '' }}" placeholder="https://...">
            </div>

            @if($dokter->foto)
                <div class="mb-3">
                    <label class="form-label fw-semibold">Foto Saat Ini:</label><br>
                    @if(Str::startsWith($dokter->foto, 'http'))
                        <img src="{{ $dokter->foto }}" alt="Foto Dokter" width="150" class="img-thumbnail">
                    @else
                        <img src="{{ asset('storage/' . $dokter->foto) }}" alt="Foto Dokter" width="150" class="img-thumbnail">
                    @endif
                </div>
            @endif

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary rounded-pill">Kembali</a>
                <button type="submit" class="btn btn-pink rounded-pill">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection
