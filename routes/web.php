<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BukuController;

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
Route::resource('buku', BukuController::class);