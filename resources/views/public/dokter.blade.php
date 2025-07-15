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
                    @if ($dokter->foto)
                        @if (Str::startsWith($dokter->foto, 'http'))
                            <img src="{{ $dokter->foto }}" class="card-img-top" alt="{{ $dokter->nama }}" style="height: 250px; object-fit: cover;">
                        @else
                            <img src="{{ asset('storage/' . $dokter->foto) }}" class="card-img-top" alt="{{ $dokter->nama }}" style="height: 250px; object-fit: cover;">
                        @endif
                    @else
                        <img src="https://via.placeholder.com/300x250?text=No+Image" class="card-img-top" alt="No Image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title mb-1">
                            <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#dokterModal{{ $dokter->id }}">
                                {{ $dokter->nama }}
                            </a>
                        </h5>
                        <p class="text-muted mb-1">Spesialis: {{ $dokter->spesialis }}</p>
                        <p class="text-warning mb-0">Rating: {{ $dokter->rating ?? 'Belum ada rating' }}</p>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Dokter -->
            <div class="modal fade" id="dokterModal{{ $dokter->id }}" tabindex="-1" aria-labelledby="dokterModalLabel{{ $dokter->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content shadow">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title" id="dokterModalLabel{{ $dokter->id }}">Detail Dokter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body row">
                            <div class="col-md-5 text-center mb-3 mb-md-0">
                                @if ($dokter->foto)
                                    @if (Str::startsWith($dokter->foto, 'http'))
                                        <img src="{{ $dokter->foto }}" class="img-fluid rounded shadow-sm" alt="{{ $dokter->nama }}">
                                    @else
                                        <img src="{{ asset('storage/' . $dokter->foto) }}" class="img-fluid rounded shadow-sm" alt="{{ $dokter->nama }}">
                                    @endif
                                @else
                                    <img src="https://via.placeholder.com/300x250?text=No+Image" class="img-fluid rounded shadow-sm" alt="No Image">
                                @endif
                            </div>
                            <div class="col-md-7">
                                <h4 class="mb-2">{{ $dokter->nama }}</h4>
                                <p class="mb-1"><strong>Spesialis:</strong> {{ $dokter->spesialis }}</p>
                                <p class="mb-1 text-warning"><strong>Rating:</strong> {{ $dokter->rating ?? 'Belum ada rating' }}</p>

                                <!-- {{-- Optional Tambahan Info --}}
                                <p class="mb-1"><strong>Jam Praktik:</strong> {{ $dokter->jam_praktik ?? 'Tidak tersedia' }}</p>
                                <p class="mb-1"><strong>No. Kontak:</strong> {{ $dokter->kontak ?? 'Tidak tersedia' }}</p> -->

                                <a href="{{ route('public.reservasi', ['dokter_id' => $dokter->id]) }}" class="btn btn-primary mt-3 rounded-pill">
                                    Reservasi Sekarang
                                </a>
                            </div>
                        </div>
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

{{-- Tambahkan ini jika belum include Bootstrap JS --}}
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endpush
