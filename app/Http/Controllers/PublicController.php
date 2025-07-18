<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Kontak;
use App\Models\Pasien;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

class PublicController extends Controller
{
    public function home()
    {
        $viona_dokters = Dokter::all();
        return view('public.home', compact('viona_dokters'));
    }

    public function dokter()
    {
        $viona_dokters = Dokter::all();
        return view('public.dokter', compact('viona_dokters'));
    }

    public function jadwal()
    {
        $viona_jadwals = Jadwal::with('dokter')->get();
        return view('public.jadwal', compact('viona_jadwals'));
    }

    /**
     * Menampilkan form reservasi.
     * Menerima optional query parameter `dokter_id` untuk pre-select dokter.
     */
    public function reservasi(Request $request)
    {
        $viona_dokters = Dokter::all();
        $selectedDokterId = $request->query('dokter_id'); // Ambil dari query string

        return view('public.reservasi', compact('viona_dokters', 'selectedDokterId'));
    }

    /**
     * Simpan data reservasi baru dan pasien.
     */
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

         // Hitung nomor antrian berdasarkan dokter dan tanggal
        $nomorAntrian = Reservasi::where('dokter_id', $request->dokter_id)
            ->whereDate('tanggal_kunjungan', $request->tanggal)
            ->count() + 1;

        Reservasi::create([
            // 'pasien_id' => $pasien->id,
            'pasien_id' => Auth::id(),
            'dokter_id' => $request->dokter_id,
            'tanggal_kunjungan' => $request->tanggal,
            'keluhan' => $request->keluhan,
            'status' => 'pending',
            'nomor_antrian' => $nomorAntrian,
        ]);

        // return redirect()->route('public.reservasi')->with('success', 'Reservasi berhasil dikirim!');
        return redirect()->route('public.reservasi.konfirmasi', ['tanggal' => $request->tanggal])
        ->with('success', 'Reservasi berhasil! Anda dapat melihat nomor antrian Anda.');

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

        Kontak::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('public.kontak')->with('success', 'Pesan berhasil dikirim!');
    }

    public function __construct()
    {
        $this->middleware('auth')->only(['reservasi', 'simpanReservasi']);
    }

    public function konfirmasiReservasi(Request $request)
    {
        $tanggal = $request->tanggal;
        $userId = Auth::id();

        $reservasi = Reservasi::where('pasien_id', $userId)
                    ->whereDate('tanggal_kunjungan', $tanggal)
                    ->latest()
                    ->first();

        $antrianKe = Reservasi::whereDate('tanggal_kunjungan', $tanggal)
                    ->where('dokter_id', $reservasi->dokter_id)
                    ->where('id', '<=', $reservasi->id)
                    ->count();

        return view('public.konfirmasi', compact('reservasi', 'antrianKe'));
    }

    


}
