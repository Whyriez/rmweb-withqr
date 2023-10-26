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

Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/table', [AdminController::class, 'show'])->name('table');
Route::post('/table', [AdminController::class, 'store'])->name('table');
Route::put('/table/edit/{id}', [AdminController::class, 'edit'])->name('/table/edit/{id}');
Route::get('/table/update', [AdminController::class, 'update'])->name('/table/update');
Route::get('/table/delete/{id}', [AdminController::class, 'destroy'])->name('/table/delete/{id}');