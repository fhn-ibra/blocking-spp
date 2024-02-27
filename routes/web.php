<?php

use App\Http\Controllers\Spp;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Login;
use App\Http\Controllers\Siswa;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [Login::class, 'index'])->name('login');
    Route::post('/login/proses', [Login::class, 'proses']);
});


Route::get('/logout', [Login::class, 'logout']);

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:admin']], function () {
        Route::resource('admin', Admin::class);
        Route::get('/pembayaran', [Spp::class, 'index']);
        Route::post('/pembayaran/save', [Spp::class, 'save']);
    });
        Route::group(['middleware' => ['cekUserLogin:siswa']], function () {
            Route::resource('siswa', Siswa::class);
    });
});
