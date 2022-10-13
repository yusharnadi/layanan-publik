<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/indicator', IndicatorController::class);
    Route::resource('/department', DepartmentController::class);
    Route::resource('/users', UserController::class);

    Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
    Route::get('/penilaian/{id}/create', [PenilaianController::class, 'create'])->name('penilaian.create');
    Route::post('/penilaian/{id}/store', [PenilaianController::class, 'store'])->name('penilaian.store');
    Route::get('/penilaian/{id}/edit', [PenilaianController::class, 'edit'])->name('penilaian.edit');
    Route::put('/penilaian/{id}/update', [PenilaianController::class, 'update'])->name('penilaian.update');
    Route::get('/penilaian/{id}/department/{tahun}/{semester}', [PenilaianController::class, 'penilaianDepartment'])->name('penilaian.department');
    Route::get('/penilaian/{id}/detail', [PenilaianController::class, 'penilaianDetail'])->name('penilaian.detail');

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
