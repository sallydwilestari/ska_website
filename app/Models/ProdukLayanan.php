<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukLayanan extends Model
{
    protected $table = 'produk_layanans';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'gambar',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
        ];
    }
}
