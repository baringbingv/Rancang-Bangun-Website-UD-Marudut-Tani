<?php

namespace App\Http\Controllers\Kasir;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::paginate(5);

        return view('kasir.produk.indexProduk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('kasir.produk.tambahProduk', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'kategori' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'deskripsi' => 'required|min:30|max:50',
        ]);

        $file = $request -> file('gambar');
        $namaFile = $file->getClientOriginalName();
        $tujuanFile = 'produk';

        $file->move($tujuanFile,$namaFile);

        $newProduk = new Produk;
        $newProduk->nama = $request->nama;
        $newProduk->stok = $request->stok;
        $newProduk->harga = $request->harga;
        $newProduk->kategori = $request->kategori;
        $newProduk->gambar = $namaFile;
        $newProduk->deskripsi = $request->deskripsi;

        $newProduk->save();
        return redirect("kasir/produk")->with ('status', 'Produk berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::find($id);
        return view('kasir.produk.viewProduk', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $produk = Produk::find($id);
        return view('kasir.produk.editProduk', ['produk' => $produk]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|min:30|max:50',
        ]);

        Produk::where('id', $id)->update
        ([
        'nama' => $request->nama,
        'stok' => $request->stok,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/kasir/produk')->with('status', 'Produk Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect('/kasir/produk');
    }
}
