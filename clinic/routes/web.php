<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BillController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('user',UserController::class);
    Route::resource('client',ClientController::class);
    Route::resource('medicine',MedicineController::class);
    Route::resource('service',ServiceController::class);
    Route::resource('order-register',RegisterController::class);
    Route::resource('bill',BillController::class);

});


require __DIR__.'/auth.php';
