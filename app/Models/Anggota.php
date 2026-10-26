<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anggota extends Model
{
    protected $fillable = [
        'nomor_anggota',
        'nama',
        'nik',
        'jenis_kelamin',
        'alamat',
        'no_telepon',
        'tanggal_daftar',
        'status',
    ];

    public function simpanans(): HasMany
    {
        return $this->hasMany(Simpanan::class);
    }
}
