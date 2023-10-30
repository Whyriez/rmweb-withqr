<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\authController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('login', [authController::class, 'index'])->name('login');
Route::post('proses_login', [authController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [authController::class, 'logout'])->name('logout');



Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'cek_login'], function () {
        // Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/table', [AdminController::class, 'show'])->name('table');
        Route::post('/table', [AdminController::class, 'store'])->name('table');
        Route::put('/table/edit/{id}', [AdminController::class, 'edit'])->name('/admin/edit/{id}');
        Route::get('/table/delete/{id}', [AdminController::class, 'destroy'])->name('/admin/delete/{id}');
        Route::get('/table/delete/{id}', [AdminController::class, 'destroy'])->name('/admin/delete/{id}');
        Route::post('/kategori/add', [AdminController::class, 'addKategori'])->name('kategori/add');
        Route::put('/kategori/edit', [AdminController::class, 'editKategori'])->name('kategori/edit');
        Route::get('/kategori/delete/{id}', [AdminController::class, 'deleteKategori'])->name('kategori/delete/{id}');
        Route::get('/laporan', [AdminController::class, 'viewLaporan'])->name('laporan');
        Route::get('/laporan/harian', [AdminController::class, 'laporanHarian'])->name('laporan/harian');
        Route::get('/laporan/bulanan', [AdminController::class, 'laporanBulanan'])->name('laporan/bulanan');

        Route::get('qrcode', [AdminController::class, 'generateQrCode'])->name('qrcode');
        Route::post('addQrCode/add', [AdminController::class, 'addQrCode'])->name('addQrCode/add');
        Route::get('meja/delete/{id}', [AdminController::class, 'deleteMeja'])->name('meja/delete/{id');
        Route::get('download/qrcode', [AdminController::class, 'downloadQr'])->name('download/qrcode');
    });
});

//user
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/id/{id}', [UserController::class, 'index'])->name('homeid');
Route::get('/cart', [UserController::class, 'viewCart'])->name('cart');
Route::get('/cart/store/{id}', [UserController::class, 'cartStore'])->name('cart/store/{id}');
Route::get('/cart/delete/{id}', [UserController::class, 'cartDelete'])->name('cart/delete/{id}');
Route::put('/cart/update', [UserController::class, 'cartUpdate'])->name('cart/update');
Route::get('/cart/checkout', [UserController::class, 'cartCheckout'])->name('cart/checkout');

Route::get('/kategori/{id}', [UserController::class, 'showKategori'])->name('kategori/{id}');
