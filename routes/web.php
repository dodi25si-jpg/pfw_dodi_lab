<?php

use Illuminate\Support\Facades\Route;

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
    return '<h1>selamat datang</h1><h2>INI ADALAH DETAIL MAHASISWA</h2>';
});

Route::get('/mahasiswa/profil', function () {
    return '<h1>selamat datang</h1><h2>INI ADALAH PROFIL MAHASISWA</h2>';
});

Route::get('/about', function () {
    return view('halaman-about');
});



