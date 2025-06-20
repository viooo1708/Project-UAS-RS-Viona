@extends('layouts.main')

@section('title', 'Tambah Dokter')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Tambah Dokter Baru</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.dokter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama Dokter</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
            </div>

            <div class="mb-3">
                <label for="spesialis" class="form-label fw-semibold">Spesialis</label>
                <input type="text" name="spesialis" class="form-control" id="spesialis" required>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label fw-semibold">Rating (0 - 5)</label>
                <input type="number" name="rating" class="form-control" id="rating" min="0" max="5" step="0.1">
            </div>

            <div class="mb-3">
                <label for="foto_upload" class="form-label fw-semibold">Upload Foto Dokter</label>
                <input type="file" name="foto_upload" class="form-control" id="foto_upload" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="foto_link" class="form-label fw-semibold">Atau Masukkan Link Foto</label>
                <input type="url" name="foto_link" class="form-control" id="foto_link" placeholder="https://...">
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.dokter.index') }}" class="btn btn-secondary rounded-pill">Batal</a>
                <button type="submit" class="btn btn-pink rounded-pill">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
