<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjamans';
    protected $fillable = ['anggota_id', 'jumlah', 'bunga', 'tenor', 'status'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function angsurans()
    {
        return $this->hasMany(Angsuran::class);
    }
}
