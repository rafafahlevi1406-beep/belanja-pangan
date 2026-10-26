<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BahanPangan extends Model
{
    protected $fillable = [
        'nama_bahan',
        'kategori',
        'satuan',
        'harga',
        'stok',
        'kebutuhan',
    ];
}
