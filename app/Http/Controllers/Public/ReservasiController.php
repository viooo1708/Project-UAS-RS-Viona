<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }

    public function create()
    {
        // Kirim view reservasi untuk pasien
        return view('public.reservasi.form');
    }

    public function store(Request $request)
    {
        Reservasi::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'tanggal' => $request->tanggal,
            'dokter_id' => $request->dokter_id,
            // dll
        ]);

        return redirect()->route('home')->with('success', 'Reservasi berhasil dikirim.');
    }
}
