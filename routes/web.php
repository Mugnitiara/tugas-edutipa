<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

// Halaman daftar film
Route::get('/movie', [MovieController::class, 'index'])->name('movie.index');

// Halaman utama
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Halaman form pesan
Route::get('/form', function () {
    return view('form');
})->name('form');

// Proses kirim pesan dari form
Route::post('/pesan', [HomeController::class, 'store'])->name('pesan.store');
