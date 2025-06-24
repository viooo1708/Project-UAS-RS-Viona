@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<div class="container mt-4">

    {{-- Hero Section --}}
    <div class="mb-5">
        <div class="p-5 rounded-4 shadow-sm text-center text-white animate__animated animate__fadeInDown" style="background: linear-gradient(90deg, #ff8fa3, #ffa5ba);">
            <h1 class="display-4 fw-bold mb-3">Selamat Datang di <span style="color: #fff;">RS Viona</span></h1>
            <p class="fs-5">Kami hadir untuk memberikan pelayanan kesehatan terbaik untuk Anda dan keluarga.</p>
            <a href="{{ route('public.reservasi') }}" class="btn btn-light btn-lg rounded-pill mt-3 animate__animated animate__pulse animate__infinite">
                💌 Reservasi Sekarang
            </a>
        </div>
    </div>

    {{-- Tentang Kami --}}
    <section class="my-5">
        <h2 class="text-center text-pink fw-bold animate__animated animate__fadeIn">Tentang Kami</h2>
        <p class="text-center text-muted mb-4">Profil singkat RS Viona, rumah sakit terpercaya di Padang.</p>
        <div class="card border-0 shadow-sm p-4" style="background-color: #fff0f5;">
            <div class="row align-items-center g-4">
                <div class="col-md-6">
                    <img src="https://media.hitekno.com/thumbs/2019/11/28/62931-rumah-sakit-seoul-national-university-bundang/730x480-img-62931-rumah-sakit-seoul-national-university-bundang.jpg"
                         alt="Tentang RS Viona"
                         class="img-fluid rounded-3 shadow-sm animate__animated animate__zoomIn"
                         style="object-fit: cover;">
                </div>
                <div class="col-md-6 animate__animated animate__fadeInRight">
                    <p class="fs-5">
                        <i class="bi bi-hospital-fill text-danger me-2"></i>
                        <strong>RS Viona</strong> adalah rumah sakit terpercaya yang telah melayani masyarakat sejak <strong>tahun 2004</strong> di Padang.
                    </p>
                    <p>Kami dilengkapi dengan fasilitas modern serta didukung oleh tenaga medis profesional dan berpengalaman.</p>
                    <p class="mt-3">
                        <i class="bi bi-bullseye text-success me-2"></i>
                        <strong>Visi Kami:</strong><br>
                        Menjadi rumah sakit unggulan yang memberikan pelayanan kesehatan terbaik, aman, dan terjangkau.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Layanan Unggulan --}}
    <section class="my-5">
        <h2 class="text-center text-pink fw-bold">Layanan Unggulan</h2>
        <p class="text-center text-muted mb-4">Berbagai fasilitas dan layanan andalan kami untuk kebutuhan kesehatan Anda.</p>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @php
                $layanan = [
                    ['icon' => 'bi-heart-pulse-fill', 'nama' => 'Poli Umum'],
                    ['icon' => 'bi-tooth-fill', 'nama' => 'Poli Gigi'],
                    ['icon' => 'bi-activity', 'nama' => 'IGD 24 Jam'],
                    ['icon' => 'bi-house-heart-fill', 'nama' => 'Rawat Inap'],
                    ['icon' => 'bi-eyeglasses', 'nama' => 'Laboratorium'],
                    ['icon' => 'bi-capsule-pill', 'nama' => 'Apotek & Radiologi'],
                ];
            @endphp

            @foreach ($layanan as $item)
                <div class="col animate__animated animate__fadeInUp">
                    <div class="card h-100 border-0 shadow-sm text-center p-4 layanan-card" style="background-color: #fdf2f8;">
                        <div class="mb-3">
                            <i class="bi {{ $item['icon'] }} text-pink fs-1"></i>
                        </div>
                        <h5 class="card-title text-dark">{{ $item['nama'] }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Dokter Unggulan --}}
    <section class="my-5">
        <h2 class="mb-4 text-pink text-center">Dokter Unggulan</h2>
        <p class="text-center text-muted mb-4">Tim dokter profesional kami yang siap melayani Anda.</p>
        <div class="row g-3">
            @foreach ($viona_dokters->take(3) as $dokter)
                <div class="col-md-4 animate__animated animate__zoomIn">
                    <div class="card h-100 border-0 shadow-sm dokter-card" style="background-color: #f8f0ff;">
                        @php
                            $foto = $dokter->foto
                                ? (Str::startsWith($dokter->foto, 'http')
                                    ? $dokter->foto
                                    : asset('storage/' . $dokter->foto))
                                : 'https://via.placeholder.com/400x300?text=No+Image';
                        @endphp

                        <div class="ratio ratio-4x3 rounded-top overflow-hidden">
                            <img src="{{ $foto }}" alt="{{ $dokter->nama }}" class="img-fluid object-fit-cover w-100 h-100">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title text-dark">{{ $dokter->nama }}</h5>
                            <p class="card-text text-muted">Spesialis: {{ $dokter->spesialis }}</p>
                            <p class="text-warning">Rating: {{ $dokter->rating ?? 'Belum ada' }}</p>
                            <a href="{{ route('public.reservasi', ['dokter_id' => $dokter->id]) }}" class="btn btn-sm btn-primary rounded-pill">Reservasi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Kontak --}}
    <section class="my-5">
        <h2 class="mb-4 text-pink text-center">Kontak Kami</h2>
        <p class="text-center text-muted mb-4">Hubungi kami untuk informasi atau pertanyaan lebih lanjut.</p>
        <div class="card border-0 shadow-sm p-4" style="background-color: #f0f8ff;">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 animate__animated animate__fadeInLeft">
                    <iframe
                        src="https://maps.google.com/maps?q=Jl.%20Kesehatan%20No.1%20Padang&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        class="rounded-3 shadow-sm">
                    </iframe>
                </div>
                <div class="col-md-6 animate__animated animate__fadeInRight">
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-geo-alt-fill text-danger fs-4 me-3"></i>
                        <div>
                            <strong>Alamat:</strong>
                            <p class="mb-0">Jl. Kesehatan No.1, Padang</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-telephone-fill text-success fs-4 me-3"></i>
                        <div>
                            <strong>Telepon:</strong>
                            <p class="mb-0">(0751) 123456</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <i class="bi bi-envelope-fill text-primary fs-4 me-3"></i>
                        <div>
                            <strong>Email:</strong>
                            <p class="mb-0">info@rsviona.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- CSS untuk efek hover --}}
<style>
    .layanan-card:hover,
    .dokter-card:hover {
        transform: scale(1.02);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .text-pink {
        color: #d63384 !important;
    }

    .bg-pink {
        background-color: #ffe3ec !important;
    }
</style>
@endsection
