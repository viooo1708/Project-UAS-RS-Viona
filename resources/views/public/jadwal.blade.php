@extends('layouts.main')

@section('title', 'Jadwal Dokter')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink fw-bold">Jadwal Dokter</h1>

    <div class="card border-0 shadow-sm" style="background-color: #fff0f5;">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background-color: #ffd6e7;">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Spesialis</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($viona_jadwals as $jadwal)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $jadwal->dokter->nama }}</td>
                                <td>{{ $jadwal->dokter->spesialis }}</td>
                                <td>{{ $jadwal->hari }}</td>
                                <td>{{ $jadwal->jam_mulai }}</td>
                                <td>{{ $jadwal->jam_selesai }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada jadwal tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
