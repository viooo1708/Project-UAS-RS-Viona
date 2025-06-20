@extends('layouts.main')

@section('title', 'Edit Jadwal Dokter')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Edit Jadwal Dokter</h1>

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Dokter --}}
            <div class="mb-3">
                <label for="dokter_id" class="form-label fw-semibold">Nama Dokter</label>
                <select name="dokter_id" id="dokter_id" class="form-select" required>
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($dokters as $dokter)
                        <option value="{{ $dokter->id }}" {{ $jadwal->dokter_id == $dokter->id ? 'selected' : '' }}>
                            {{ $dokter->nama }} - {{ $dokter->spesialis }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Hari (Dropdown) --}}
            <div class="mb-3">
                <label for="hari" class="form-label fw-semibold">Hari</label>
                <select name="hari" id="hari" class="form-select" required>
                    <option value="">-- Pilih Hari --</option>
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $hari)
                        <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>{{ $hari }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Jam Mulai --}}
            <div class="mb-3">
                <label for="jam_mulai" class="form-label fw-semibold">Jam Mulai</label>
                <input type="time" name="jam_mulai" id="jam_mulai" class="form-control" value="{{ $jadwal->jam_mulai }}" required>
            </div>

            {{-- Jam Selesai --}}
            <div class="mb-3">
                <label for="jam_selesai" class="form-label fw-semibold">Jam Selesai</label>
                <input type="time" name="jam_selesai" id="jam_selesai" class="form-control" value="{{ $jadwal->jam_selesai }}" required>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary rounded-pill">Batal</a>
                <button type="submit" class="btn btn-pink rounded-pill">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
