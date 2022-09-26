<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/indicator', IndicatorController::class);
Route::resource('/device', DeviceController::class);

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
