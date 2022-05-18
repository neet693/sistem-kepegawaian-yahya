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
    Route::get('/list', [ListPegawaiController::class, 'index'])->name('list');
    Route::get('/pegawai/tambah', [ListPegawaiController::class, 'tambah']);
    Route::post('/pegawai/tambah/proses', [ListPegawaiController::class, 'tambah'])->name('pegawai.tambah');
    Route::post('/pegawai/edit/{id_peg}', [ListPegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::get('/pegawai/hapus/{id_peg}', [ListPegawaiController::class, 'hapus'])->name('pegawai.hapus');
    Route::get('/pegawai/profile/{id_peg}', [ListPegawaiController::class, 'profile'])->name('pegawai.profile');

    Route::post('/pegawai/anak/tambah/proses', [AnakController::class, 'proses'])->name('anak.tambah');
    Route::post('/pegawai/orangtua/tambah/proses', [OrangtuaController::class, 'proses'])->name('orangtua.tambah');
    Route::post('/pegawai/suamiistri/tambah/proses', [SuamiistriController::class, 'proses'])->name('suamiistri.tambah');

    Route::post('/pegawai/diklat/tambah', [DiklatController::class, 'tambah'])->name('pegawai.diklat.tambah');
    // Route::post('/pegawai/diklat/edit/{id}', [DiklatController::class, 'edit']);
    Route::post('/pegawai/diklat/hapus/{id_diklat}', [DiklatController::class, 'hapus'])->name('pegawai.diklat.hapus');
    Route::get('/pegawai/riwayatdiklat/editpage/{id_diklat}/{id_peg}', [DiklatController::class, 'editpage'])->name('pegawai.diklat.editpage');


    Route::post('/pegawai/gapok/tambah', [RiwayatGapokController::class, 'tambah'])->name('pegawai.gapok.tambah');
    // Route::post('/pegawai/gapok/edit/{id}', [RiwayatGapokController::class, 'edit']);
    Route::get('/pegawai/gapok/editpage/{id_gapok}/{id_peg}', [RiwayatGapokController::class, 'editpage'])->name('pegawai.gapok.editpage');
    Route::post('/pegawai/gapok/hapus/{id_gapok}', [RiwayatGapokController::class, 'hapus'])->name('pegawai.gapok.hapus');

    Route::post('/pegawai/hukuman/tambah', [RiwayatHukumanController::class, 'tambah'])->name('pegawai.hukuman.tambah');
    Route::get('/pegawai/hukuman/editpage/{id_hukuman}/{id_pegawai}', [RiwayatHukumanController::class, 'editpage'])->name('pegawai.hukuman.editpage');
    // Route::post('/pegawai/hukuman/edit/{id}', [RiwayatHukumanController::class, 'edit']);
    Route::post('/pegawai/hukuman/hapus/{id_hukuman}', [RiwayatHukumanController::class, 'hapus'])->name('pegawai.hukuman.hapus');

    Route::post('/pegawai/jabatan/tambah', [RiwayatJabatanController::class, 'tambah'])->name('pegawai.jabatan.tambah');
    Route::get('/pegawai/jabatan/editpage/{id_jabatan}/{id_peg}', [RiwayatJabatanController::class, 'editpage'])->name('pegawai.jabatan.editpage');
    // Route::post('/pegawai/jabatan/edit/{id}', [RiwayatJabatanController::class, 'edit']);
    Route::post('/pegawai/jabatan/hapus/{id_jabatan}', [RiwayatJabatanController::class, 'hapus'])->name('pegawai.jabatan.hapus');

    Route::post('/pegawai/jabatanfungsional/tambah', [RiwayatJabatanfController::class, 'tambah'])->name('pegawai.jabatanfungsional.tambah');
    Route::post('/pegawai/jabatanfungsional/hapus/{id_jabatanf}', [RiwayatJabatanfController::class, 'hapus'])->name('pegawai.jabatanfungsional.hapus');
    Route::get('/pegawai/jabatanfungsional/editpage/{id_jabatanf}/{id_peg}', [RiwayatJabatanfController::class, 'editpage'])->name('pegawai.jabatanfungsional.editpage');
    // Route::post('/pegawai/jabatanfungsional/edit/{id}', [RiwayatJabatanfController::class], 'edit');

    Route::post('/pegawai/jabatanfungsionalt/tambah', [RiwayatJabatanftController::class, 'tambah'])->name('pegawai.jabatanfungsionalt.tambah');
    Route::get('/pegawai/jabatanfungsionalt/editpage/{id_jbtft}/{id_peg}', [RiwayatJabatanftController::class, 'editpage'])->name('pegawai.jabatanfungsionalt.editpage');
    // Route::post('/pegawai/jabatanfungsionalt/edit/{id}', [RiwayatJabatanftController::class, 'edit']);
    Route::post('/pegawai/jabatanfungsionalt/hapus/{id_jbtft}', [RiwayatJabatanftController::class, 'hapus'])->name('pegawai.jabatanfungsionalt.hapus');

    // Start Route Group TM
    //TmAgamaController
    Route::get('/data/tmagama/tambah', [TmAgamaController::class, 'index'])->name('agama.list');
    Route::post('/data/tmagama/tambah/proses', [TmAgamaController::class, 'tambah'])->name('tm.agama.tambah');
    Route::get('/data/tmagama/hapus/{kode_agama}', [TmAgamaController::class, 'hapus'])->name('tm.agama.hapus');

    //TmUnitKerjaController
    Route::get('/data/tmunitkerja/tambah', [TmUnitKerjaController::class, 'index'])->name('unitkerja.list');
    Route::post('/data/tmunitkerja/tambah/proses', [TmUnitKerjaController::class, 'tambah'])->name('tm.unitkerja.tambah');
    Route::get('/data/tmunitkerja/hapus/{kode_unitkerja}', [TmUnitKerjaController::class, 'hapus'])->name('tm.unitkerja.hapus');

    //TmDiklatController
    Route::get('/pegawai/tmdiklat/tambah', [TmDiklatController::class, 'index'])->name('diklat.list');
    Route::post('/pegawai/tmdiklat/tambah/proses', [TmDiklatController::class, 'tambah'])->name('tm.diklat.tambah');
    Route::get('/pegawai/tmdiklat/hapus/{kode_diklat}', [TmDiklatController::class, 'hapus'])->name('tm.diklat.hapus');

    //TmGapokController
    Route::get('/pegawai/tmgapok/tambah', [TmGapokController::class, 'index'])->name('gapok.list');
    Route::post('/pegawai/tmgapok/tambah/proses', [TmGapokController::class, 'tambah'])->name('tm.gapok.tambah');
    Route::get('/pegawai/tmgapok/hapus/{kode_gapok}', [TmGapokController::class, 'hapus'])->name('tm.gapok.hapus');

    //TmGologanController
    Route::get('/pegawai/tmgolongan/tambah', [TmGolonganController::class, 'index'])->name('golongan.list');
    Route::post('/pegawai/tmgolongan/tambah/proses', [TmGolonganController::class, 'tambah'])->name('tm.golongan.tambah');
    Route::get('/pegawai/tmgolongan/hapus/{kode_gol}', [TmGolonganController::class, 'hapus'])->name('tm.golongan.hapus');

    //TmJabatanfController
    Route::get('/pegawai/tmjabatanf/tambah', [TmJabatanfController::class, 'index'])->name('jabatanf.list');
    Route::post('/pegawai/tmjabatanf/tambah/proses', [TmJabatanfController::class, 'tambah'])->name('tm.jabatanf.tambah');
    Route::get('/pegawai/tmjabatanf/hapus/{kode_jbtf}', [TmJabatanfController::class, 'hapus'])->name('tm.jabatanf.hapus');

    //TmJabatanFtController
    Route::get('/pegawai/tmjabatanft/tambah', [TmJabatanFtController::class, 'index'])->name('jabatanft.list');
    Route::post('/pegawai/tmjabatanft/tambah/proses', [TmJabatanFtController::class, 'tambah'])->name('tm.jabatanft.tambah');
    Route::get('/pegawai/tmjabatanft/hapus/{kode_jbtft}', [TmJabatanFtController::class, 'hapus'])->name('tm.jabatanft.hapus');

    //TmJabatanstrukturalController
    Route::get('/pegawai/tmjabatans/tambah', [TmJabatanstrukturalController::class, 'index'])->name('jabatans.list');
    Route::post('/pegawai/tmjabatans/tambah/proses', [TmJabatanstrukturalController::class, 'tambah'])->name('tm.jabatans.tambah');
    Route::get('/pegawai/tmjabatans/hapus/{kode_jbts}', [TmJabatanstrukturalController::class, 'hapus'])->name('tm.jabatans.hapus');

    //TmPendidikanController
    Route::get('/data/tmpendidikan/tambah', [TmPendidikanController::class, 'index'])->name('pendidikan.list');
    Route::post('/data/tmpendidikan/tambah/proses', [TmPendidikanController::class, 'tambah'])->name('tm.pendidikan.tambah');
    Route::get('/data/tmpendidikan/hapus/{kode_pdd}', [TmPendidikanController::class, 'hapus'])->name('tm.pendidikan.hapus');
    //End Route Group TM


    //Route Grafik
    Route::get('/pegawai/grafik', [GrafikController::class, 'index'])->name('grafik.list');

    //Route Profile Pribadi
    Route::get('/profile/show/', [UserProfileController::class, 'show'])->name('profile.show');
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
