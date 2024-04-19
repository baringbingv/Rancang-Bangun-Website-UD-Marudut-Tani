<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produk')->insert([
            'kode_produk' => 'PU1',
            'nama_produk' => 'Kencana',
            'stok' => '50',
            'harga' => '150000',
            'kategori' => 'Pupuk',
            'gambar' => 'Kencana.jpeg',
            'deskripsi' => 'Mantap Kali'
        ]);
    }
}
