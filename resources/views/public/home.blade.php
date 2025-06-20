@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<div class="container mt-4">

    {{-- Hero Section --}}
    <div class="p-5 mb-5 rounded-4 shadow-sm" style="background-color: #ffe3ec;">
        <div class="container-fluid py-3">
            <h1 class="display-5 fw-bold text-dark">Selamat Datang di <span style="color: #d63384;">RS Viona</span></h1>
            <p class="fs-5 text-secondary">Kami hadir untuk memberikan pelayanan kesehatan terbaik untuk Anda dan keluarga.</p>
            <a class="btn btn-outline-dark btn-lg rounded-pill" href="{{ route('public.reservasi') }}">Reservasi Sekarang</a>
        </div>
    </div>

    {{-- Tentang Kami --}}
    <section class="my-5">
        <h2 class="mb-3 text-pink fw-semibold">Tentang Kami</h2>
        <div class="card border-0 shadow-sm p-4" style="background-color: #fff0f5;">
            <p>RS Viona adalah rumah sakit terpercaya yang telah melayani masyarakat sejak tahun 2004 di Padang. Kami dilengkapi dengan fasilitas modern serta didukung oleh tenaga medis profesional dan berpengalaman.</p>
            <p><strong>Visi:</strong> Menjadi rumah sakit unggulan yang memberikan pelayanan kesehatan terbaik, aman, dan terjangkau.</p>
        </div>
    </section>

    {{-- Layanan Unggulan --}}
    <section class="my-5">
        <h2 class="mb-4 text-pink">Layanan Unggulan</h2>
        <div class="row g-3">
            @php
                $layanan = ['Poli Umum', 'Poli Gigi', 'IGD 24 Jam', 'Rawat Inap', 'Laboratorium', 'Apotek & Radiologi'];
            @endphp

            @foreach ($layanan as $item)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm" style="background-color: #ffeef8;">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-heart-fill text-danger me-2"></i>
                            <span class="text-dark">{{ $item }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Dokter Unggulan --}}
    <section class="my-5">
        <h2 class="mb-4 text-pink">Dokter Unggulan</h2>
        <div class="row g-3">
            @foreach ($viona_dokters->take(3) as $dokter)
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm" style="background-color: #f8f0ff;">
                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $dokter->nama }}</h5>
                            <p class="card-text text-muted">Spesialis: {{ $dokter->spesialis }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Kontak --}}
    <section class="my-5">
        <h2 class="mb-3 text-pink">Kontak Kami</h2>
        <div class="card border-0 shadow-sm p-4" style="background-color: #e3f2fd;">
            <p><strong>Alamat:</strong> Jl. Kesehatan No.1, Padang</p>
            <p><strong>Telepon:</strong> (0751) 123456</p>
            <p><strong>Email:</strong> info@rsviona.com</p>
        </div>
    </section>

</div>
@endsection
