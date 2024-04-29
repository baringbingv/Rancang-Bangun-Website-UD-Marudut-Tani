<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Produk;
use App\Events\PembelianCreated;
use App\Http\Controllers\Controller;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::paginate(5);
        $produk = Produk::all();

        return view('kasir.pembelian.indexPembelian', compact('pembelian', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::all();

        return view('kasir.pembelian.tambahPembelian', compact('produk'));
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
            'produk_id.*' => 'required',
            'jumlah.*' => 'required|numeric',
        ];

        $message = [
            'produk_id.*.required' => 'Produk Harus Di isi',
            'jumlah.*.required' => 'Jumlah Harus Di isi',
            'jumlah.*.numeric' => 'Jumlah Harus Bertipe Angka',
        ];
        $this->validate($request, $validate, $message);

        $numPembelian = count($request->produk_id);

        for ($i = 0; $i < $numPembelian; $i++) {
            $newPembelian = new Pembelian;
            $newPembelian->produk_id = $request->produk_id[$i];
            $newPembelian->jumlah = $request->jumlah[$i];
            $newPembelian->save();
        }

        return redirect("kasir/pembelian")->with ('status', 'pembelian berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembelian = Pembelian::find($id);
        return view('kasir.pembelian.viewPembelian', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $pembelian = Pembelian::find($id);
        return view('kasir.pembelian.editPembelian', ['pembelian' => $pembelian]);
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

        Pembelian::where('id', $id)->update
        ([
        'jumlah' => $request->jumlah,
        ]);

        return redirect('/kasir/pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->delete();
        return redirect('/kasir/pembelian');
    }
}
