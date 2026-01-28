<?php

use App\Http\Controllers\AuthC;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', [AuthC::class, 'login'])->name('login');       // Tampil form
Route::post('/login', [AuthC::class, 'loginStore'])->name('login.store'); // Proses login
