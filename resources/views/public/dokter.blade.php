@extends('layouts.main')

@section('title', 'Daftar Dokter')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="container my-4">
    <h2 class="mb-4 text-center">Daftar Dokter</h2>

    <div class="row">
        @forelse ($viona_dokters as $dokter)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">

                    @if($dokter->foto)
                        @if(Str::startsWith($dokter->foto, 'http'))
                            <img src="{{ $dokter->foto }}" class="card-img-top" alt="{{ $dokter->nama }}" style="height: 250px; object-fit: cover;">
                        @else
                            <img src="{{ asset('storage/' . $dokter->foto) }}" class="card-img-top" alt="{{ $dokter->nama }}" style="height: 250px; object-fit: cover;">
                        @endif
                    @else
                        <img src="https://via.placeholder.com/300x250?text=No+Image" class="card-img-top" alt="No Image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title mb-1">{{ $dokter->nama }}</h5>
                        <p class="text-muted mb-1">Spesialis: {{ $dokter->spesialis }}</p>
                        <p class="text-warning mb-0">Rating: {{ $dokter->rating ?? 'Belum ada rating' }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada data dokter.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
