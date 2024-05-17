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
        $penjualan = Penjualan::orderBy('created_at', 'desc')->paginate(20);
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

    public function filter(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $penjualan = Penjualan::whereBetween('created_at', [$startDate, $endDate])
            ->paginate(10);

        return view('admin.penjualan.index', [
            'penjualan' => $penjualan
        ]);
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
            'nama_pembeli' => 'required|string|max:255',
            'produk_id' => 'required|array',
            'jumlah' => 'required|array',
            'produk_id.*' => 'exists:produk,id',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        foreach($request->get('produk_id') as $index => $produk_id){
            if (isset($request->get('jumlah')[$index])) {
                $newPenjualan = new Penjualan;
                $newPenjualan->fill([
                    'nama_pembeli' => $request->get('nama_pembeli'),
                    'produk_id' => $produk_id,
                    'jumlah' => $request->get('jumlah')[$index]
                ]);
                $newPenjualan->save();
            }
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
            'jumlah' => 'required|numeric',
        ]);

        Penjualan::where('id', $id)->update
        ([
                'jumlah' => $request->jumlah,
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
        return redirect('/admin/penjualan')->with('status', 'Data Penjualan berhasil di hapus');
    }
}
