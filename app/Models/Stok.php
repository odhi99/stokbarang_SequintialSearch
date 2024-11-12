<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = [
        'namabarang',
        'deskripsi',
        'stok',
        'harga',
    ];

    public function masuk()
    {
        return $this->hasMany(Masuk::class, 'id_barang', 'id');
    }

    public function keluar()
    {
        return $this->hasMany(Keluar::class, 'id_barang', 'id');
    }
}
