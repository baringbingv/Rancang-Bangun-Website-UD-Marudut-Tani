<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Http\Controllers\Controller;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::orderBy('created_at', 'desc')->paginate(5);
        $produk = Produk::all();

        return view('kasir.penjualan.indexPenjualan', compact('penjualan', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();

        return view('kasir.penjualan.tambahPenjualan', compact('produk'));
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

        return redirect("kasir/penjualan")->with('status', 'Data Penjualan berhasil di tambah');
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
        return view('kasir.penjualan.viewPenjualan', compact('penjualan'));
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
        return view('kasir.penjualan.editPenjualan', ['penjualan' => $penjualan]);
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
            'jumlah' => 'required|numeric',
        ]);

        Penjualan::where('id', $id)->update
        ([
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/kasir/penjualan')->with('status', 'Data Penjualan berhasil di update');
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
        return redirect('/kasir/penjualan')->with('status', 'Data Penjualan berhasil di hapus');
    }
}
