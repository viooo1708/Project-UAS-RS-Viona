@extends('layouts.main')

@section('title', 'Pesan Kontak')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Pesan Kontak dari Pengunjung</h1>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-pink text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kontaks as $kontak)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kontak->nama }}</td>
                            <td>{{ $kontak->email }}</td>
                            <td>{{ $kontak->pesan }}</td>
                            <td>{{ \Carbon\Carbon::parse($kontak->created_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada pesan masuk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
