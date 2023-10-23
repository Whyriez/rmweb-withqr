<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


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

Route::get('/', [UserController::class, 'index'])->name('home');
// Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/admin', [AdminController::class, 'show'])->name('admin');
Route::post('/admin', [AdminController::class, 'store'])->name('admin');
Route::put('/admin/edit/{id}', [AdminController::class, 'edit'])->name('/admin/edit/{id}');
Route::get('/admin/update', [AdminController::class, 'update'])->name('/admin/update');
Route::get('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('/admin/delete/{id}');
