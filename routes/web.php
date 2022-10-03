<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/indicator', IndicatorController::class);
Route::resource('/department', DepartmentController::class);
Route::resource('/device', DeviceController::class);

Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/penilaian/{id}/create', [PenilaianController::class, 'create'])->name('penilaian.create');
Route::post('/penilaian/{id}/store', [PenilaianController::class, 'store'])->name('penilaian.store');


Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/dologin', [AuthController::class, 'doLogin'])->middleware('guest')->name('doLogin');

Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/users', UserController::class);


    // DELETE ROUTE 

    Route::get('/user/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
});
Route::get('/sms/{id}/delete', [SmsController::class, 'delete'])->name('sms.delete');
Route::get('/indicator/{id}/delete', [IndicatorController::class, 'delete'])->name('indicator.delete');
Route::get('/department/{id}/delete', [DepartmentController::class, 'delete'])->name('department.delete');
