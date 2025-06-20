@extends('layouts.main')

@section('title', 'Data Pasien')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-pink">Data Pasien</h1>

    <a href="{{ route('admin.pasien.create') }}" class="btn btn-pink mb-3 rounded-pill">
        <i class="bi bi-plus-circle me-1"></i> Tambah Pasien
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle shadow-sm">
            <thead class="table-light text-center">
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($viona_pasiens as $pasien)
                <tr>
                    <td>{{ $pasien->nama }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->no_hp }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            @if ($pasien->viona_reservasis->count() > 0)
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $pasien->id }}">
                                    <i class="bi bi-eye"></i> Detail
                                </button>
                            @endif

                            <a href="{{ route('admin.pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{ route('admin.pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?')" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                {{-- Modal Detail Pasien --}}
                <div class="modal fade" id="modalDetail{{ $pasien->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $pasien->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content shadow-sm">
                            <div class="modal-header bg-pink text-white">
                                <h5 class="modal-title" id="modalLabel{{ $pasien->id }}">Detail Pasien</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Nama:</strong> {{ $pasien->nama }}</p>
                                <p><strong>NIK:</strong> {{ $pasien->nik }}</p>
                                <p><strong>Jenis Kelamin:</strong> {{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                                <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}</p>
                                <p><strong>Alamat:</strong> {{ $pasien->alamat }}</p>
                                <p><strong>No. HP:</strong> {{ $pasien->no_hp }}</p>
                                <p><strong>Riwayat Penyakit:</strong> {{ $pasien->riwayat_penyakit ?? '-' }}</p>

                                <hr>
                                <h6 class="mt-3">Data Reservasi</h6>
                                @foreach ($pasien->viona_reservasis as $reservasi)
                                    <div class="mb-3 p-3 border rounded bg-light">
                                        <p><strong>Tanggal Kunjungan:</strong> {{ \Carbon\Carbon::parse($reservasi->tanggal_kunjungan)->format('d-m-Y') }}</p>
                                        <p><strong>Dokter:</strong> {{ $reservasi->dokter->nama ?? '-' }} ({{ $reservasi->dokter->spesialis ?? '-' }})</p>
                                        <p><strong>Keluhan:</strong> {{ $reservasi->keluhan }}</p>
                                        <p><strong>Status:</strong>
                                            @if ($reservasi->status === 'pending')
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @elseif ($reservasi->status === 'selesai')
                                                <span class="badge bg-success">Selesai</span>
                                            @else
                                                <span class="badge bg-secondary">-</span>
                                            @endif
                                        </p>

                                        {{-- Form Ubah Status --}}
                                        <form action="{{ route('admin.reservasi.updateStatus', $reservasi->id) }}" method="POST" class="mt-2 d-flex align-items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select form-select-sm w-auto">
                                                <option value="pending" {{ $reservasi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="selesai" {{ $reservasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Ubah</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada data pasien.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
