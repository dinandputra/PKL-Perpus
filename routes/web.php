<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KembaliController;


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

Route::get('/', function () {
    return view('beranda');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    //route buku
    Route::resource('admin/buku' , BukuController::class);
    Route::post('caribuku' , [BukuController::class , 'caribuku']) -> name('caribuku');
    Route::get('/admin/hapusbuku/{id}' , [BukuController::class , 'destroy']);
    
    //route peminjam
    Route::resource('admin/peminjam' , PeminjamController::class);
    Route::post('caripeminjam' , [PeminjamController::class , 'caripeminjam']) -> name('caripeminjam');
    Route::get('/admin/hapuspeminjam/{id}' , [PeminjamController::class , 'destroy']);
    

    //route peminjaman
    Route::resource('admin/peminjaman' , PeminjamanController::class);
    Route::post('caripeminjaman' , [PeminjamanController::class , 'caripeminjaman']) -> name('caripeminjaman');
    Route::post('/admin/simpandetail' , [PeminjamanController::class , 'simpanDetail']) -> name('simpanDetail');
    Route::get('/admin/hapuspeminjaman/{id}' , [PeminjamanController::class , 'destroy']);

    //route kembali
    Route::resource('admin/kembali' , KembaliController::class);
    Route::post('carikembali' , [KembaliController::class , 'carikembali']) -> name('carikembali');
    Route::get('/admin/hapuskembali/{id}' , [KembaliController::class , 'destroy']);
});
