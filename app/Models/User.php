<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',         // role bisa: 'pasien', 'admin', dll
        'no_antrian',   // untuk membedakan pasien
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    /**
     * Auto hash password saat di-set
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => bcrypt($value),
        );
    }

    /**
     * Relasi: 1 user (pasien) bisa memiliki banyak reservasi
     */
    public function viona_reservasis()
    {
        return $this->hasMany(Reservasi::class, 'user_id');
    }

    /**
     * Cek apakah user adalah pasien
     */
    public function isPasien(): bool
    {
        return $this->role === 'pasien';
    }
}
