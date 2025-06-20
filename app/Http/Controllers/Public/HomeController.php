<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Reservasi;
use App\Models\Pasien;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('public.home', compact('dokters'));
    }

    public function reservasiForm($dokter_id)
    {
        return view('public.reservasi', compact('dokter_id'));
    }

    public function submitReservasi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'dokter_id' => 'required',
            'tanggal_kunjungan' => 'required|date',
        ]);

        $pasien = Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        Reservasi::create([
            'dokter_id' => $request->dokter_id,
            'pasien_id' => $pasien->id,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'status' => 'pending'
        ]);

        return redirect('/')->with('success', 'Reservasi berhasil dikirim!');
    }
}
