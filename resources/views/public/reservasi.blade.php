@extends('layouts.main')

@section('title', 'Reservasi')

@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

@section('content')
<div class="container mt-5">

    {{-- Judul --}}
    <div class="text-center mb-4">
        <h1 class="fw-bold" style="color: #d63384;">Formulir Reservasi Dokter</h1>
        <p class="text-muted">Silakan lengkapi data pasien dan data reservasi berikut</p>
    </div>

    {{-- Alert Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('public.reservasi.store') }}" method="POST" class="p-4 rounded shadow-sm" style="background-color: #fef9f4;">
        @csrf

        {{-- DATA PASIEN --}}
        <h5 class="mb-3" style="color: #ff7b89;">🩺 Data Pasien</h5>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Pasien</label>
            <input type="text" name="nama" id="nama" class="form-control" required
                value="{{ old('nama', $user->name ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" rows="2" class="form-control" required>{{ old('alamat', $user->alamat ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" required
                value="{{ old('no_hp', $user->no_hp ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" required
                value="{{ old('nik', $user->nik ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required
                value="{{ old('tanggal_lahir', $user->tanggal_lahir ?? '') }}">
        </div>

        <div class="mb-4">
            <label for="riwayat_penyakit" class="form-label">Riwayat Penyakit</label>
            <textarea name="riwayat_penyakit" id="riwayat_penyakit" rows="2" class="form-control">{{ old('riwayat_penyakit', $user->riwayat_penyakit ?? '') }}</textarea>
        </div>

        <hr class="my-4">

        {{-- DATA RESERVASI --}}
        <h5 class="mb-3" style="color: #74c69d;">📅 Data Reservasi</h5>

        <div class="mb-3">
            <label for="dokter_id" class="form-label">Pilih Dokter</label>
            <select name="dokter_id" id="dokter_id" class="form-select" required>
                <option value="">-- Pilih Dokter --</option>
                @foreach ($viona_dokters as $dokter)
                    <option value="{{ $dokter->id }}"
                        {{ (old('dokter_id', $selectedDokterId ?? '') == $dokter->id) ? 'selected' : '' }}>
                        {{ $dokter->nama }} - {{ $dokter->spesialis }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Kunjungan</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required
                value="{{ old('tanggal') }}">
        </div>

        <div class="mb-4">
            <label for="keluhan" class="form-label">Keluhan</label>
            <textarea name="keluhan" id="keluhan" rows="3" class="form-control" required>{{ old('keluhan') }}</textarea>
        </div>

        <button type="submit" class="btn px-4 py-2" style="background-color: #d63384; color: white;">
            Kirim Reservasi
        </button>
    </form>
</div>
@endsection
