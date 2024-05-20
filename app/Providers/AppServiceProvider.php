<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Observers\PembelianObserver;
use App\Observers\PenjualanObserver;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Pembelian::observe(PembelianObserver::class);
        Penjualan::observe(PenjualanObserver::class);
    }
}
