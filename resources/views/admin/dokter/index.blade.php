@extends('layouts.main')

@section('title', 'Data Dokter')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Data Dokter</h1>

    <a href="{{ route('admin.dokter.create') }}" class="btn btn-pink mb-3 rounded-pill">
        <i class="bi bi-plus-circle me-1"></i> Tambah Dokter
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle shadow-sm">
            <thead class="table-light text-center">
                <tr>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Rating</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($viona_dokters as $dokter)
                <tr>
                    <td>{{ $dokter->nama }}</td>
                    <td>{{ $dokter->spesialis }}</td>
                    <td>{{ $dokter->rating }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.dokter.edit', $dokter->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('admin.dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')">
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
                    <td colspan="4" class="text-center text-muted">Belum ada data dokter.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
