@extends('layouts.main')

@section('title', 'Konfirmasi Reservasi')

@section('content')
    <div class="container mt-4">
        <h2>Reservasi Berhasil</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <p><strong>Dokter:</strong> {{ $reservasi->dokter->nama }}</p>
        <p><strong>Tanggal Kunjungan:</strong> {{ $reservasi->tanggal_kunjungan }}</p>
        <p><strong>Nomor Antrian:</strong> {{ $reservasi->nomor_antrian }}</p>

        <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
@endsection
