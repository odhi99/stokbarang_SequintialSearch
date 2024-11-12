<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'keterangan',
        'qty',
    ];

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_barang', 'id');
    }
}
