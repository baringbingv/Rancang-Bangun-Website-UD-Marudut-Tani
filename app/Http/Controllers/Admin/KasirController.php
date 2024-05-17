<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class KasirController extends Controller
{
    public function index()
    {
        $kasir = Kasir::paginate(10);

        return view('admin.kasir.indexKasir', compact('kasir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kasir.tambahKasir');
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
            'username' => 'required|min:6',
            'password' => 'required|min:8',
        ]);

        $newKasir = new Kasir;
        $newKasir->nama = $request->nama;
        $newKasir->username = $request->username;
        $newKasir->password = Hash::make($request->password);

        $newKasir->save();
        return redirect("admin/kasir")->with ('status', 'Kasir berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasir = Kasir::find($id);
        return view('admin.kasir.viewKasir', compact('kasir'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $kasir = Kasir::find($id);
        return view('admin.kasir.editKasir', ['kasir' => $kasir]);
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

        Kasir::where('id', $id)->update
        ([
        'nama' => $request->nama,
        'stok' => $request->stok,
        'harga' => $request->harga,
        'deskripsi' => $request->deskripsi,
        ]);

        return redirect('/admin/kasir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $kasir = Kasir::find($id);
        $kasir->delete();
        return redirect('/admin/kasir');
    }
}
