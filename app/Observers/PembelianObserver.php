<?php

namespace App\Observers;

use App\Models\Pembelian;
use App\Models\Produk;

class PembelianObserver
{
    /**
     * Handle the Pembelian "created" event.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return void
     */
    public function created(Pembelian $pembelian)
    {
        $produk = Produk::find($pembelian->produk_id);
        if ($produk) {
            $produk->stok += $pembelian->jumlah;
            $produk->save();
        }
    }
}
