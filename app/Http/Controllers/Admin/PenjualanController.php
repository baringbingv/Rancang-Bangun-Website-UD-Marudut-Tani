<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::paginate(5);
        $produk = Produk::all();

        return view('admin.penjualan.indexPenjualan', compact('penjualan', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();

        return view('admin.penjualan.tambahPenjualan', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'nama_pembeli' => 'required',
            'produk_id.*' => 'required',
            'jumlah.*' => 'required|numeric',
        ];

        $message = [
            'nama_pembeli.required' => 'Nama Pelanggan Harus Di isi',
            'produk_id.*.required' => 'Produk Harus Di isi',
            'jumlah.*.required' => 'Jumlah Harus Di isi',
            'jumlah.*.numeric' => 'Jumlah Harus Bertipe Angka',
        ];
        $this->validate($request, $validate, $message);

        $numPenjualan = count($request->produk_id);

        for ($i = 0; $i < $numPenjualan; $i++) {
            $newPenjualan = new Penjualan;
            $newPenjualan->nama_pembeli = $request->nama_pembeli;
            $newPenjualan->produk_id = $request->produk_id[$i];
            $newPenjualan->jumlah = $request->jumlah[$i];
            $newPenjualan->save();
        }

        return redirect("admin/penjualan")->with ('status', 'penjualan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penjualan = Penjualan::find($id);
        return view('admin.penjualan.viewPenjualan', compact('penjualan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $penjualan = Penjualan::find($id);
        return view('admin.penjualan.editPenjualan', ['penjualan' => $penjualan]);
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

        Penjualan::where('id', $id)->update
        ([
        'nama' => $request->nama,
        'stok' => $request->stok,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/admin/penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->delete();
        return redirect('/admin/penjualan');
    }
}
