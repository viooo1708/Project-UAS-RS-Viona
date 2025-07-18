<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

    protected $table = 'viona_jadwals';

    protected $fillable = ['dokter_id', 'hari', 'jam_mulai', 'jam_selesai'];
    
    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
