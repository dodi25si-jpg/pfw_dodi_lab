<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mahasiswa', function () {
    return 'Hallo Mahasiswa';
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

Route::get('/home', [HomeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/question', [QuestionController::class, 'index'])
		->name('question.index');


Route::get('/dashboard', [DashboardController::class, 'index'])
		->name('dashboard.index');

Route::resource('pelanggan', PelangganController::class);

Route::resource('user', UserController::class)->except(['show']);

Route::get('/admin', [AdminController::class, 'index']);
