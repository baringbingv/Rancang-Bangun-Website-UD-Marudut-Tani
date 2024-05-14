<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $AllProduk = Produk::orderBy('created_at', 'desc')->take(10)->get();
        $AllKategori = Kategori::all();
        $AllTestimonial = Testimonial::all();

        return view ('homepage.welcome', compact('AllProduk', 'AllKategori', 'AllTestimonial'));
    }
    public function shop(){
        $AllProduk = Produk::orderBy('created_at', 'desc')->get();
        $AllKategori = Kategori::all();

        return view ('homepage.shop', compact('AllProduk', 'AllKategori'));
    }

    public function contact(){
        return view('homepage.contact');
    }

    public function about(){
        return view('homepage.about');
    }

    public function store(Request $request)
    {
        $validate = [
            'nama' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'email' => 'required|email',
            'deskripsi' => 'required',
        ];

        $message = [
            'nama.required' => 'Kolom Nama Harus Di isi',
            'nama.max' => 'Testimonial tidak boleh lebih dari 255 karakter',
            'nama.regex' => 'Isi Kolom Nama Harus Berupa Huruf/String',
            'email.required' => 'Email Harus Di isi',
            'email.email' => 'Kolom Harus bertipe E-mail',
            'foto.mimes' => 'Foto harus berformat jpeg, png, dan jpg',
            'foto.max' => 'Foto tidak boleh lebih dari 5MB',
            'deskripsi.required' => 'Kolom Deskripsi Harus Di isi',
        ];
        $this->validate($request, $validate, $message);

        $file = $request -> file('foto');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'testimonial';

        $file->move($tujuanFile,$namaFile);

        $newTestimonial = new Testimonial;
        $newTestimonial->nama = $request->nama;
        $newTestimonial->foto = $namaFile;
        $newTestimonial->email = $request->email;
        $newTestimonial->deskripsi = $request->deskripsi;

        $newTestimonial->save();
        return redirect("/")->with ('status', 'Testimonial ' .$newTestimonial->testimonial. ' berhasil di tambahkan');
    }
}
