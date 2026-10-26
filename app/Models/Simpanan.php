<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Simpanan extends Model
{
    protected $fillable = [
        'anggota_id', 'jenis', 'nominal', 'tanggal', 'status'
    ];

    protected function casts(): array
    {
        return ['tanggal' => 'date', 'nominal' => 'integer'];
    }

    public function anggota(): BelongsTo
    {
        return $this->belongsTo(Anggota::class);
    }
}
