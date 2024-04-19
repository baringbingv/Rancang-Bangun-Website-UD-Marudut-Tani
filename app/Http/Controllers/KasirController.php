<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KasirController extends Controller
{
    public function index()
    {
        $kasir = Kasir::paginate(5);

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

    public function dashboard(){
        $JumlahProduk = Produk::count();
        $JumlahKategori = Kategori::count();

        return view ('kasir.dashboard', compact('JumlahProduk', 'JumlahKategori'));
    }

    public function Login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            $required = [
                'username' => 'required',
                'password' => 'required|min:6',
            ];
            $message = [
                'username.required' => 'Username harus diisi',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 6 karakter',
            ];
            $this->validate($request, $required, $message);
            if(Auth::guard('kasir')->attempt(['username' => $data['username'], 'password' => $data['password']])){
                return redirect('kasir/dashboard')->with('success_message', 'Login Berhasil!');
            }
            else{
                return redirect()->back()->with('message', 'Invalid Login');
            }
        }
        return view ('kasir.login');
    }

    public function logout(){
        Auth::guard('kasir')->logout();
        return redirect('/kasir/login');
    }
}
