<?php

namespace App\Listeners;

use App\Events\PembelianCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStokProduk
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PembelianCreated  $event
     * @return void
     */
    public function handle(PembelianCreated $event)
    {
        $pembelian = $event->pembelian;
        $produk = $pembelian->produk;
        $jumlah = $pembelian->jumlah;

        $produk->stok -= $jumlah;
        $produk->save();
    }
}
