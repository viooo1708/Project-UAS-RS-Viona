<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Kontak;
use App\Models\Pasien;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    // public function home()
    // {
    //     return view('public.home');
    // }

    public function home()
    {
        $viona_dokters = \App\Models\Dokter::all();
        return view('public.home', compact('viona_dokters'));
    }

    public function dokter()
    {
        $viona_dokters = \App\Models\Dokter::all();
        return view('public.dokter', compact('viona_dokters'));
    }


    public function jadwal()
    {
        $viona_jadwals = Jadwal::with('dokter')->get();
        return view('public.jadwal', compact('viona_jadwals'));
    }

    public function reservasi()
    {
        $viona_dokters = Dokter::all();
        return view('public.reservasi', compact('viona_dokters'));
    }

    public function simpanReservasi(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'nik' => 'required|string|max:20',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            'riwayat_penyakit' => 'nullable|string',

            'dokter_id' => 'required|exists:viona_dokters,id',
            'tanggal' => 'required|date',
            'keluhan' => 'required|string',
        ]);

        $pasien = Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'nik' => $request->nik,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'riwayat_penyakit' => $request->riwayat_penyakit,
        ]);

        Reservasi::create([
            'pasien_id' => $pasien->id,
            'dokter_id' => $request->dokter_id,
            'tanggal_kunjungan' => $request->tanggal,
            'keluhan' => $request->keluhan,
            'status' => 'pending',
        ]);

        return redirect()->route('public.reservasi')->with('success', 'Reservasi berhasil dikirim!');
    }

    public function kontak()
    {
        return view('public.kontak');
    }

    public function simpanKontak(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|email',
            'pesan' => 'required|string|max:500',
        ]);

        // Simpan data ke tabel 'kontaks'
        Kontak::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('public.kontak')->with('success', 'Pesan berhasil dikirim!');
    }


}
