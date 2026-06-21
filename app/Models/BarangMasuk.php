<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangMasuk extends Model
{
    protected $fillable = ['barang_id', 'jumlah', 'keterangan'];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
}
