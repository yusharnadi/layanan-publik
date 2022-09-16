<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserMobileController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('/sms', SmsController::class);
Route::resource('/device', DeviceController::class);

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/dologin', [AuthController::class, 'doLogin'])->middleware('guest')->name('doLogin');

Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/users', UserController::class);


    // DELETE ROUTE 

    Route::get('/user/{id}/delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/passenger/{id}/delete', [PassengerController::class, 'delete'])->name('passenger.delete');
    Route::get('/person/{id}/delete', [PersonController::class, 'delete'])->name('person.delete');
    Route::get('/userMobile/{id}/delete', [UserMobileController::class, 'delete'])->name('userMobile.delete');
    Route::get('/slider/{id}/delete', [SliderController::class, 'delete'])->name('slider.delete');
});
Route::get('/sms/{id}/delete', [SmsController::class, 'delete'])->name('sms.delete');
Route::get('/device/{id}/delete', [DeviceController::class, 'delete'])->name('device.delete');
