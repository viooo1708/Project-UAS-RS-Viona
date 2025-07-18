@extends('layouts.main')

@section('title', 'Data Reservasi')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Data Reservasi</h1>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-pink text-center">
                        <tr>
                            <th>No. Antrian</th>
                            <th>Nama Pasien</th>
                            <th>Dokter</th>
                            <th>Jadwal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($viona_reservasis as $reservasi)
                        <tr>
                            <td class="text-center">{{ $reservasi->nomor_antrian ?? '-' }}</td>
                            <td>{{ $reservasi->user->name ?? '-' }}</td>
                            <td>{{ $reservasi->dokter->nama ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($reservasi->tanggal_kunjungan)->format('d-m-Y') }}</td>
                            <td class="text-center">
                                @if ($reservasi->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif ($reservasi->status === 'selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @else
                                    <span class="badge bg-secondary">-</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-wrap gap-1 justify-content-center">
                                    {{-- Tombol Ubah Status ke Pending --}}
                                    <form action="{{ route('admin.reservasi.updateStatus', $reservasi->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="pending">
                                        <button class="btn btn-sm btn-outline-secondary">Pending</button>
                                    </form>

                                    {{-- Tombol Ubah Status ke Selesai --}}
                                    <form action="{{ route('admin.reservasi.updateStatus', $reservasi->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="selesai">
                                        <button class="btn btn-sm btn-outline-success">Selesai</button>
                                    </form>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.reservasi.destroy', $reservasi->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data reservasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
