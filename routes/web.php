<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuruController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MagangController;

Route::get('/guru', [GuruController::class,  'daftarGuru']);
Route::get('/sekolah', [SekolahController::class, 'kotaSekolah']);
Route::get('/magang', [MagangController::class, 'Magang']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/data-siswa', [SiswaController::class, 'dataSiswa']);
Route::put('/siswa/{id}', [SiswaController::class, 'update']);
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);


Route::get('/halo', function () {
    return 'Halo, selamat datang di kegiatan PKL saya!';
});

Route::view('/selamat-datang', 'welcome');

Route::get('/kategori/{produk?}', function ($produk = 'umum') {
    return 'Kategori produk: ' . $produk;
});

Route::get('/tentang-saya', function () {
    return 'Ini adalah halaman profil peserta PKL saya.';
});

Route::get('/sapa/{nama?}', function ($nama = 'Sobat') {
    return 'Halo, ' . $nama . '! Selamat belajar Laravel';
});

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return 'Ini halaman Dashboard Admin!';
    });

    Route::get('/users', function () {
        return 'Ini halaman Kelola User';
    });

});

Route::redirect('/beranda', '/halo');

Route::get('/profil-peserta-pkl', function () {
    return 'Halaman Profil PKL';
})->name('profil.pkl');

Route::prefix('/panel')->group(function () {

    Route::get('/profil', function () {
        return 'Profil Panel';
    });

    Route::get('/setting', function () {
        return 'Pengeturan Panel';
    });

});

Route::redirect('/masuk', '/');

Route::get('/home', function() {
    return view('home');
});