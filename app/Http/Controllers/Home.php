<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $AllProduk = Produk::all();
        $AllKategori = Kategori::all();
        $AllTestimonial = Testimonial::all();

        return view ('homepage.welcome', compact('AllProduk', 'AllKategori', 'AllTestimonial'));
    }
    public function shop(){
        $AllProduk = Produk::all();
        $AllKategori = Kategori::all();

        return view ('homepage.shop', compact('AllProduk', 'AllKategori'));
    }

    public function contact(){
        return view('homepage.contact');
    }

    public function about(){
        return view('homepage.about');
    }
}
