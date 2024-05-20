<?php

namespace App\Observers;

use App\Models\Penjualan;
use App\Models\Produk;

class PenjualanObserver
{
    /**
     * Handle the Penjualan "created" event.
     *
     * @param  \App\Models\Penjualan  $pembelian
     * @return void
     */
    public function created(Penjualan $penjualan)
    {
        $produk = Produk::find($penjualan->produk_id);
        if ($produk) {
            $produk->stok -= $penjualan->jumlah;
            $produk->save();
        }
    }
}
