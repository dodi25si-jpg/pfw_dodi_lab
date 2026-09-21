<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', function () {
    return 'halo saya';
});


Route::get('/pcr', function () {
    return 'Aku mahasiswa politeknik caltex riau';
});

Route::get('/mahasiswa/detail', function () {
    return '<h1>selamat datang </h1> <h2> INI ADALAH DETAIL MAHASISWA</h2>';
});

Route::get('/mahasiswa/profil', function () {
    return '<h1>selamat datang </h1> <h2> INI ADALAH profil MAHASISWA</h2>';
});


