@extends('layouts.main')

@section('title', 'Kontak Kami')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Kontak Kami</h1>

    <div class="row">
        <div class="col-md-6 mb-4">
            <h4>Informasi Kontak</h4>
            <ul class="list-unstyled">
                <li><strong>Alamat:</strong> Jl. Kesehatan No. 123, Padang</li>
                <li><strong>Telepon:</strong> (0751) 123-456</li>
                <li><strong>Email:</strong> info@rsviona.com</li>
                <li><strong>Jam Operasional:</strong> Senin - Sabtu (08.00 - 16.00)</li>
            </ul>
        </div>

        <div class="col-md-6 mb-4">
            <h4>Formulir Pesan</h4>
            <form action="{{ route('public.kontak.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Anda</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label">Pesan</label>
                    <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>
    </div>
</div>
@endsection
