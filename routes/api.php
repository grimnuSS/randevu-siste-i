<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\indexController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/working-hours/{date?}', [indexController::class, 'getWorkingHours']);
Route::post('/appointment-store', [indexController::class, 'appointmentStore']);


Route::group(['namespace'=>'admin', 'prefix'=>'admin'], function (){
    Route::get('/list', [\App\Http\Controllers\api\admin\indexController::class, 'getList']);
});
