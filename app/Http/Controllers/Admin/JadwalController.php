<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Dokter;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $viona_jadwals = Jadwal::with('dokter')->get();
        return view('admin.jadwal.index', compact('viona_jadwals'));
    }

    public function create()
    {
        $viona_dokters = Dokter::all();
        return view('admin.jadwal.create', compact('viona_dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

       Jadwal::create([
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }


    public function edit(Jadwal $jadwal)
    {
        $dokters = Dokter::all();
        return view('admin.jadwal.edit', compact('jadwal', 'dokters'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate([
            'dokter_id' => 'required|exists:viona_dokters,id',
            'hari' => 'required|string|max:20',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $gabungJam = $request->jam_mulai . ' - ' . $request->jam_selesai;

        $jadwal->update([
            'dokter_id' => $request->dokter_id,
            'hari' => $request->hari,
            'jam' => $gabungJam,
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
