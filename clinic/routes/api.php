<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('client-login',[ClientApiController::class,'login']);


Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::post('logout',[ClientApiController::class,'logout']);
    Route::post('client-info',[ClientApiController::class,'clientInfo']);
    Route::post('booking',[ClientApiController::class,'booking']);
    Route::post('service-list',[ClientApiController::class,'serviceList']);
    Route::post('booking-list',[ClientApiController::class,'bookingList']);
    Route::post('booking-cancel',[ClientApiController::class,'bookingCancel']);
    Route::post('bill-list-client',[ClientApiController::class,'billListClient']);

});
