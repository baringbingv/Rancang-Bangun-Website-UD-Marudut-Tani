<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';

    protected $fillable = [
        'nama_pembeli', 'produk_id', 'jumlah'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function getHargaAttribute()
    {
        return $this->produk->harga;
    }

}
