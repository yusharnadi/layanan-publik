<?php

use App\Http\Controllers\AspectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RencanaAksiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TindakController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifikasiPenilaianController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/indicator', IndicatorController::class);
    Route::resource('/aspects', AspectController::class);
    Route::resource('/department', DepartmentController::class);
    Route::resource('/users', UserController::class);

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{id}/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan/{id}/store', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::get('/laporan/{id}/view', [LaporanController::class, 'view'])->name('laporan.view');
    Route::put('/laporan/{id}/update', [LaporanController::class, 'update'])->name('laporan.update');
    Route::get('/laporan/{id}/department/{tahun}/{semester}', [LaporanController::class, 'laporanDepartment'])->name('laporan.department');
    Route::get('/laporan/{id}/detail', [LaporanController::class, 'laporanDetail'])->name('laporan.detail');

    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/penilaian/{id}/department/{tahun}/{semester}', [PenilaianController::class, 'penilaianDepartment'])->name('penilaian.department');
    Route::get('/penilaian/{indicator_id}/detail/{department_id}/{tahun}/{semester}', [PenilaianController::class, 'penilaianDetail'])->name('penilaian.detail');
    Route::post('/penilaian/store', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::put('/penilaian/{penilaian_id}/update', [PenilaianController::class, 'update'])->name('penilaian.update');

    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil.index');
    Route::get('/hasil/{aspect_id}/{department_id}/{tahun}/{semester}/aspect/detail', [HasilController::class, 'aspectDetail'])->name('hasil.aspect_detail');

    Route::get('/verifikasi-penilaian', [VerifikasiPenilaianController::class, 'index'])->name('verifikasi.index');
    Route::get('/verifikasi-penilaian/{penilaian_id}/detail', [VerifikasiPenilaianController::class, 'detail'])->name('verifikasi.detail');
    Route::post('/verifikasi-penilaian/{penilaian_id}/update', [VerifikasiPenilaianController::class, 'update'])->name('verifikasi.update');


    Route::get('/evaluasi', [EvaluasiController::class, 'index'])->name('evaluasi.index');
    Route::get('/evaluasi/{id}/department/{tahun}/{semester}', [EvaluasiController::class, 'monevDepartment'])->name('evaluasi.department');
    Route::get('/evaluasi/{indicator_id}/detail/{department_id}/{tahun}/{semester}', [EvaluasiController::class, 'monevDetail'])->name('evaluasi.detail');
    Route::get('/evaluasi/{indicator_id}/detail-user/{tahun}/{semester}', [EvaluasiController::class, 'monevDetailUser'])->name('evaluasi.detail-user');
    Route::post('/evaluasi/store', [EvaluasiController::class, 'store'])->name('evaluasi.store');
    Route::put('/evaluasi/{evaluasi_id}/update', [EvaluasiController::class, 'update'])->name('evaluasi.update');
    Route::get('/evaluasi/export/{department_id}/{tahun}/{semester}', [EvaluasiController::class, 'export'])->name('evaluasi.export');

    Route::get('/rencana-aksi', [RencanaAksiController::class, 'index'])->name('rencana.index');
    Route::get('/rencana-aksi/{evaluasi_id}/create', [RencanaAksiController::class, 'create'])->name('rencana.create');
    Route::post('/rencana-aksi/store', [RencanaAksiController::class, 'store'])->name('rencana.store');
    Route::put('/rencana-aksi/{rencana_id}/update', [RencanaAksiController::class, 'update'])->name('rencana.update');
    Route::get('/rencana-aksi/{id}/department/{tahun}/{semester}', [RencanaAksiController::class, 'rencanaDepartment'])->name('rencana.department');
    Route::get('/rencana-aksi/{rencana_id}/detail-admin', [RencanaAksiController::class, 'detailRencana'])->name('rencana.detail-admin');


    Route::get('/tindak-lanjut', [TindakController::class, 'index'])->name('tindak.index');
    Route::get('/tindak-lanjut/{rencana_id}/create', [TindakController::class, 'create'])->name('tindak.create');

    Route::post('/tindak-lanjut/store', [TindakController::class, 'store'])->name('tindak.store');
    Route::put('/tindak-lanjut/{tindak_id}/update', [TindakController::class, 'update'])->name('tindak.update');
    Route::get('/tindak-lanjut/{id}/department/{tahun}/{semester}', [TindakController::class, 'tindakDepartment'])->name('tindak.department');
    Route::get('/tindak-lanjut/{tindak_id}/detail-admin', [TindakController::class, 'detailTindak'])->name('tindak.detail-admin');


    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/{id}/update', [RoleController::class, 'update'])->name('role.update');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    // DELETE ROUTE 
    Route::get('/user/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/aspects/{id}/delete', [AspectController::class, 'delete'])->name('aspects.delete');
    Route::get('/indicator/{id}/delete', [IndicatorController::class, 'delete'])->name('indicator.delete');
    Route::get('/department/{id}/delete', [DepartmentController::class, 'delete'])->name('department.delete');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/login-process', [AuthController::class, 'loginProcess'])->middleware('guest')->name('login.process');
});
