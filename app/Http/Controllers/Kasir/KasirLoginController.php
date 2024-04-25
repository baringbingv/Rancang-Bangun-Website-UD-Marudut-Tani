<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class KasirLoginController extends Controller
{
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
