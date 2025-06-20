<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'viona_dokters';

    protected $fillable = ['nama', 'spesialis', 'foto', 'rating'];

    public function viona_jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function viona_reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}
