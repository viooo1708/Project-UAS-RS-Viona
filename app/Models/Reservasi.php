<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{

    protected $table = 'viona_reservasis';

    protected $fillable = ['dokter_id', 'pasien_id', 'tanggal_kunjungan','keluhan', 'status', 'nomor_antrian'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }
    
}
