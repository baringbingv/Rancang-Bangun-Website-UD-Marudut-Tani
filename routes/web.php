<?php

use Illuminate\Support\Facades\Route;
use PhpParser\Node\Name;
use App\Controllers\Home;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Home@index');
Route::get('/shop', 'App\Http\Controllers\Home@shop');
Route::get('/about', 'App\Http\Controllers\Home@about');
Route::get('/contact', 'App\Http\Controllers\Home@contact');

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::match(['get','post'], 'login', 'AdminController@Login');
    Route::middleware(['admins'])->group(function(){
        Route::resource('produk', 'ProdukController');
        Route::resource('kategori', 'KategoriController');
        Route::resource('kasir', 'KasirController');
        Route::resource('pembelian', 'PembelianController');
        Route::resource('penjualan', 'PenjualanController');
        Route::resource('testimonial', 'TestimonialController');
    });
    Route::group(['middleware' => ['admins']], function () {
        Route::get('/dashboard', 'AdminController@index');
        Route::get('/logout', 'AdminController@logout');
        Route::get('profile', 'AdminController@profile');
        Route::match (['get', 'post'], 'update-admin-password', 'AdminController@UpdateAdminPassword');
        Route::match (['get', 'post'], 'update-admin-details', 'AdminController@UpdateAdminDetails');

    });
    Route::match(['get','post'], 'register', 'AdminController@register');
});

Route::prefix('/kasir')->namespace('App\Http\Controllers\Kasir')->group(function(){
    Route::match(['get','post'], 'login', 'KasirController@Login');
    Route::middleware(['kasir'])->group(function(){
        Route::get('/dashboard', 'KasirController@dashboard');
        Route::get('/logout', 'KasirController@logout');
        Route::resource('produk', 'ProdukController');
        Route::resource('kategori', 'KategoriController');
        Route::resource('kasir', 'KasirController');
    });
    Route::group(['middleware' => ['kasir']], function () {

    });
});
