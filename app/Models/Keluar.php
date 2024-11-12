<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_barang',
        'qty',
    ];

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_barang', 'id');
    }

    // Accessor untuk menghitung total
    public function getTotalAttribute()
    {
        return $this->qty * $this->stok->harga;
    }
}
