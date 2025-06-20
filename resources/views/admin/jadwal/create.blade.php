@extends('layouts.main')

@section('title', 'Tambah Jadwal Dokter')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Tambah Jadwal Dokter</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.jadwal.store') }}" method="POST">
            @csrf

            {{-- Input Dokter --}}
            <div class="mb-3">
                <label for="dokter_id" class="form-label fw-semibold">Nama Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-select" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($viona_dokters as $dokter)
                        <option value="{{ $dokter->id }}">{{ $dokter->nama }} - {{ $dokter->spesialis }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Input Hari (dropdown) --}}
            <div class="mb-3">
                <label for="hari" class="form-label fw-semibold">Hari</label>
                <select name="hari" id="hari" class="form-select" required>
                    <option value="">-- Pilih Hari --</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>

            {{-- Input Jam Mulai --}}
            <div class="mb-3">
                <label for="jam_mulai" class="form-label fw-semibold">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" required>
            </div>

            {{-- Input Jam Selesai --}}
            <div class="mb-3">
                <label for="jam_selesai" class="form-label fw-semibold">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" required>
            </div>

            {{-- Tombol Aksi --}}
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary rounded-pill">Batal</a>
                <button type="submit" class="btn btn-pink rounded-pill">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
