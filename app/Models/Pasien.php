<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{

    protected $table = 'viona_pasiens';

    protected $fillable = [
        'nama', 'alamat', 'no_hp', 'nik', 'jenis_kelamin', 'tanggal_lahir', 'riwayat_penyakit',
    ];

    public function viona_reservasis()
    {
        return $this->hasMany(Reservasi::class, 'pasien_id');
    }

}
