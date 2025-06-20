<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $viona_reservasis = Reservasi::with('dokter', 'pasien')->get();
        return view('admin.reservasi.index', compact('viona_reservasis'));
    }

    public function show(Reservasi $reservasi)
    {
        return view('admin.reservasi.show', compact('reservasi'));
    }

    public function edit(Reservasi $reservasi)
    {
        return view('admin.reservasi.edit', compact('reservasi'));
    }

    public function update(Request $request, Reservasi $reservasi)
    {
        $request->validate([
            'status' => 'required|in:pending,selesai',
        ]);

        $reservasi->update([
            'status' => $request->status,
        ]);

        return redirect()->route('admin.reservasi.index')->with('success', 'Status reservasi diperbarui.');
    }

    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();
        return redirect()->route('admin.reservasi.index')->with('success', 'Reservasi dihapus.');
    }

    public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,selesai',
    ]);

    $reservasi = Reservasi::findOrFail($id);
    $reservasi->status = $request->status;
    $reservasi->save();

    return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui.');
}
}

