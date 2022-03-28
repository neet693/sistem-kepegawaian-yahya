<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListPegawaiController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\RiwayatGapokController;
use App\Http\Controllers\RiwayatHukumanController;
use App\Http\Controllers\RiwayatJabatanController;
use App\Http\Controllers\RiwayatJabatanfController;
use App\Http\Controllers\RiwayatJabatanftController;
use App\Http\Controllers\TmAgamaController;
use App\Http\Controllers\TmDiklatController;
use App\Http\Controllers\TmGapokController;
use App\Http\Controllers\TmJabatanstrukturalController;
use App\Http\Controllers\TmPendidikanController;
use App\Http\Controllers\TmJabatanFtController;
use App\Http\Controllers\TmJabatanfController;
use App\Http\Controllers\TmGolonganController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\SuamiistriController;
use App\Http\Controllers\TmUnitKerjaController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/profile', function () {
//     return view('pegawai.profile');
// });


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [ListPegawaiController::class, 'beranda'])->name('dashboard');
    Route::get('/list', [ListPegawaiController::class, 'index']);
    Route::get('/pegawai/tambah', [ListPegawaiController::class, 'tambah']);
    Route::post('/pegawai/tambah/proses', [ListPegawaiController::class, 'tambah']);
    Route::post('/pegawai/edit/{id}', [ListPegawaiController::class, 'edit']);
    Route::get('/pegawai/hapus/{id}', [ListPegawaiController::class, 'hapus']);
    Route::get('/pegawai/profile/{id}', [ListPegawaiController::class, 'profile']);

    Route::post('/pegawai/anak/tambah/proses', [AnakController::class, 'proses']);
    Route::post('/pegawai/orangtua/tambah/proses', [OrangtuaController::class, 'proses']);
    Route::post('/pegawai/suamiistri/tambah/proses', [SuamiistriController::class, 'proses']);

    Route::post('/pegawai/diklat/tambah', [DiklatController::class, 'tambah']);
    Route::post('/pegawai/diklat/edit/{id}', [DiklatController::class, 'edit']);
    Route::post('/pegawai/diklat/hapus/{id}', [DiklatController::class, 'hapus']);
    Route::get('/pegawai/riwayatdiklat/editpage/{id}/{id1}', [DiklatController::class, 'editpage']);


    Route::post('/pegawai/gapok/tambah', [RiwayatGapokController::class, 'tambah']);
    Route::post('/pegawai/gapok/edit/{id}', [RiwayatGapokController::class, 'edit']);
    Route::get('/pegawai/gapok/editpage/{id}/{id1}', [RiwayatGapokController::class, 'editpage']);
    Route::post('/pegawai/gapok/hapus/{id}', [RiwayatGapokController::class, 'hapus']);

    Route::get('/pegawai/hukuman/editpage/{id}/{id1}', [RiwayatHukumanController::class, 'editpage']);
    Route::post('/pegawai/hukuman/tambah', [RiwayatHukumanController::class, 'tambah']);
    Route::post('/pegawai/hukuman/edit/{id}', [RiwayatHukumanController::class, 'edit']);
    Route::post('/pegawai/hukuman/hapus/{id}', [RiwayatHukumanController::class, 'hapus']);

    Route::post('/pegawai/jabatan/tambah', [RiwayatJabatanController::class, 'tambah']);
    Route::get('/pegawai/jabatan/editpage/{id}/{id1}', [RiwayatJabatanController::class, 'editpage']);
    Route::post('/pegawai/jabatan/edit/{id}', [RiwayatJabatanController::class, 'edit']);
    Route::post('/pegawai/jabatan/hapus/{id}', [RiwayatJabatanController::class, 'hapus']);

    Route::post('/pegawai/jabatanfungsional/tambah', [RiwayatJabatanfController::class, 'tambah']);
    Route::post('/pegawai/jabatanfungsional/hapus/{id}', [RiwayatJabatanfController::class, 'hapus']);
    Route::get('/pegawai/jabatanfungsional/editpage/{id}/{id1}', [RiwayatJabatanfController::class, 'editpage']);
    Route::post('/pegawai/jabatanfungsional/edit/{id}', [RiwayatJabatanfController::class], 'edit');

    Route::post('/pegawai/jabatanfungsionalt/tambah', [RiwayatJabatanftController::class, 'tambah']);
    Route::get('/pegawai/jabatanfungsionalt/editpage/{id}/{id1}', [RiwayatJabatanftController::class, 'editpage']);
    Route::post('/pegawai/jabatanfungsionalt/edit/{id}', [RiwayatJabatanftController::class, 'edit']);
    Route::post('/pegawai/jabatanfungsionalt/hapus/{id}', [RiwayatJabatanftController::class, 'hapus']);

    Route::get('/data/tmagama/tambah', [TmAgamaController::class, 'index']);
    Route::post('/data/tmagama/tambah/proses', [TmAgamaController::class, 'tambah']);
    Route::get('/data/tmagama/hapus/{id}', [TmAgamaController::class, 'hapus']);

    Route::get('/data/tmunitkerja/tambah', [TmUnitKerjaController::class, 'index']);
    Route::post('/data/tmunitkerja/tambah/proses', [TmUnitKerjaController::class, 'tambah']);
    Route::get('/data/tmunitkerja/hapus/{id}', [TmUnitKerjaController::class, 'hapus']);

    Route::get('/pegawai/tmdiklat/tambah', [TmDiklatController::class, 'index']);
    Route::post('/pegawai/tmdiklat/tambah/proses', [TmDiklatController::class, 'tambah']);
    Route::get('/pegawai/tmdiklat/hapus/{id}', [TmDiklatController::class, 'hapus']);

    Route::get('/pegawai/tmgapok/tambah', [TmGapokController::class, 'index']);
    Route::post('/pegawai/tmgapok/tambah/proses', [TmGapokController::class, 'tambah']);
    Route::get('/pegawai/tmgapok/hapus/{id}', [TmGapokController::class, 'hapus']);


    Route::get('/pegawai/tmgolongan/tambah', [TmGolonganController::class, 'index']);
    Route::post('/pegawai/tmgolongan/tambah/proses', [TmGolonganController::class, 'tambah']);
    Route::get('/pegawai/tmgolongan/hapus/{id}', [TmGolonganController::class, 'hapus']);


    Route::get('/pegawai/tmjabatanf/tambah', [TmJabatanfController::class, 'index']);
    Route::post('/pegawai/tmjabatanf/tambah/proses', [TmJabatanfController::class, 'tambah']);
    Route::get('/pegawai/tmjabatanf/hapus/{id}', [TmJabatanfController::class, 'hapus']);


    Route::get('/pegawai/tmjabatanft/tambah', [TmJabatanFtController::class, 'index']);
    Route::post('/pegawai/tmjabatanft/tambah/proses', [TmJabatanFtController::class, 'tambah']);
    Route::get('/pegawai/tmjabatanft/hapus/{id}', [TmJabatanFtController::class, 'hapus']);


    Route::get('/pegawai/tmjabatans/tambah', [TmJabatanstrukturalController::class, 'index']);
    Route::post('/pegawai/tmjabatans/tambah/proses', [TmJabatanstrukturalController::class, 'tambah']);
    Route::get('/pegawai/tmjabatans/hapus/{id}', [TmJabatanstrukturalController::class, 'hapus']);


    Route::get('/data/tmpendidikan/tambah', [TmPendidikanController::class, 'index']);
    Route::post('/data/tmpendidikan/tambah/proses', [TmPendidikanController::class, 'tambah']);
    Route::get('/data/tmpendidikan/hapus/{id}', [TmPendidikanController::class, 'hapus']);


    Route::get('/pegawai/grafik', [GrafikController::class, 'index']);

    //Route Profile Pribadi
    Route::get('/profile/show/', [UserProfileController::class, 'show']);
    Route::post('/profile/edit/{id}', [UserProfileController::class, 'edit']);

    //Route untuk pegawai
    Route::get('/kumpulanpegawai', [ListPegawaiController::class, 'kumpulanpegawai'])->name('kumpulanpegawai');

    //Route untuk direktur
    Route::get('/seluruhpegawai', [ListPegawaiController::class, 'direkturpegawai'])->name('seluruhpegawai');

    //Cetak Pegawai
    Route::get('/pegawai/cetak/{id}', [ListPegawaiController::class, 'cetakPegawai'])->name('cetak-pegawai');

    //Cari Pegawai
    Route::get('/search', [ListPegawaiController::class, 'search'])->name('search');
});
