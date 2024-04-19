<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::paginate(5);
        return view('admin.kategori.indexKategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.tambahKategori');
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
            'kategori' => 'required|max:255|regex:/^[\pL\s\-]+$/u',
            'deskripsi' => 'required',
        ];

        $message = [
            'kategori.required' => 'Kolom Nama Harus Di isi',
            'kategori.max' => 'Kategori tidak boleh lebih dari 255 karakter',
            'kategori.regex' => 'Isi Kolom Nama Harus Berupa Huruf/String',
            'deskripsi.required' => 'Kolom Deskripsi Harus Di isi',
        ];
        $this->validate($request, $validate, $message);

        $newKategori = new Kategori;
        $newKategori->kategori = $request->kategori;
        $newKategori->deskripsi = $request->deskripsi;

        $newKategori->save();
        return redirect("/admin/kategori")->with ('status', 'Kategori ' .$newKategori->kategori. ' berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.viewKategori', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.editKategori', compact('kategori'));
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
        $validate = [
            'kategori' => 'required|regex:/^[\pL\s\-]+$/u',
            'deskripsi' => 'required',
        ];

        $message = [
            'nama.required' => 'Kolom Nama Harus Di isi',
            'nama.regex' => 'Isi Kolom Nama Harus Berupa Huruf/String',
            'deskripsi.required' => 'Kolom Deskripsi Harus Di isi',
        ];
        $this->validate($request, $validate, $message);

        $kategori = Kategori::find($id);
        $kategori->kategori = $request['kategori'];
        $kategori->deskripsi = $request['deskripsi'];

        $kategori->update();
        return redirect('/admin/kategori')->with('success_message', 'Kategori ' . $kategori->nama . ' Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/admin/kategori')->with('success_message', 'Kategori ' . $kategori->nama . ' berhasil dihapus');
    }
}
