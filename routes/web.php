<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\RencanaAksiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/indicator', IndicatorController::class);
    Route::resource('/department', DepartmentController::class);
    Route::resource('/users', UserController::class);

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/{id}/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan/{id}/store', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::put('/laporan/{id}/update', [LaporanController::class, 'update'])->name('laporan.update');
    Route::get('/laporan/{id}/department/{tahun}/{semester}', [LaporanController::class, 'laporanDepartment'])->name('laporan.department');
    Route::get('/laporan/{id}/detail', [LaporanController::class, 'laporanDetail'])->name('laporan.detail');

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
    Route::put('/rencana-aksi/{rencana_id}/store', [RencanaAksiController::class, 'update'])->name('rencana.update');


    Route::get('/role', [RoleController::class, 'index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'create'])->name('role.create');
    Route::post('/role', [RoleController::class, 'store'])->name('role.store');
    Route::get('/role/{id}/edit', [RoleController::class, 'edit'])->name('role.edit');
    Route::put('/role/{id}/update', [RoleController::class, 'update'])->name('role.update');


    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    // DELETE ROUTE 
    Route::get('/user/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/indicator/{id}/delete', [IndicatorController::class, 'delete'])->name('indicator.delete');
    Route::get('/department/{id}/delete', [DepartmentController::class, 'delete'])->name('department.delete');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
    Route::post('/login-process', [AuthController::class, 'loginProcess'])->middleware('guest')->name('login.process');
});
