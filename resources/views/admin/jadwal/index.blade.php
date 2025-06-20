@extends('layouts.main')

@section('title', 'Data Jadwal Dokter')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Data Jadwal Dokter</h1>

    <a href="{{ route('admin.jadwal.create') }}" class="btn btn-pink mb-3 rounded-pill">
        <i class="bi bi-plus-circle me-1"></i> Tambah Jadwal
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle shadow-sm">
            <thead class="table-light text-center">
                <tr>
                    <th>Dokter</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($viona_jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->dokter->nama }}</td>
                    <td>{{ $jadwal->hari }}</td>
                    <td>{{ $jadwal->jam_mulai }}</td>
                    <td>{{ $jadwal->jam_selesai }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('admin.jadwal.destroy', $jadwal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Belum ada data jadwal.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
