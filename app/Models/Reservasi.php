<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{

    protected $table = 'viona_reservasis';

    protected $fillable = ['dokter_id', 'pasien_id', 'tanggal_kunjungan', 'status'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }
}
