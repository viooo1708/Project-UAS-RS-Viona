<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $viona_dokters = Dokter::all();
        return view('admin.dokter.index', compact('viona_dokters'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'spesialis' => 'required',
            'rating' => 'nullable|numeric|min:0|max:5',
            'foto_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_link' => 'nullable|url',
        ]);

        $data = $request->all();

        // Tambahan: Proses foto dari upload atau link
        if ($request->hasFile('foto_upload')) {
            $data['foto'] = $request->file('foto_upload')->store('viona_dokters', 'public');
        } elseif ($request->filled('foto_link')) {
            $data['foto'] = $request->foto_link;
        }

        Dokter::create($data);
        return redirect()->route('admin.dokter.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Dokter $dokter)
    {
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'spesialis' => 'required',
            'rating' => 'nullable|numeric|min:0|max:5',
            'foto_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_link' => 'nullable|url',
        ]);

        $data = $request->all();

        // Tambahan: Update foto hanya jika diisi
        if ($request->hasFile('foto_upload')) {
            $data['foto'] = $request->file('foto_upload')->store('viona_dokters', 'public');
        } elseif ($request->filled('foto_link')) {
            $data['foto'] = $request->foto_link;
        }

        $dokter->update($data);
        return redirect()->route('admin.dokter.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('admin.dokter.index')->with('success', 'Data berhasil dihapus');
    }
}
