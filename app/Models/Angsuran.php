<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    protected $fillable = ['pinjaman_id', 'angsuran_ke', 'jatuh_tempo', 'jumlah_tagihan', 'jumlah_bayar', 'status'];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class);
    }
}
