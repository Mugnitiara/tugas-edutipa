<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/form', function () {
    return view('form');
})->name('form');
Route::post('/pesan', [HomeController::class, 'store'])->name('pesan.store');
