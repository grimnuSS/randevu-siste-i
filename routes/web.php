<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\Front\IndexController::class, 'index'])->name('front.index');

Route::group(['prefix'=>'cron'], function (){
    Route::get('/reminder', function (){
        Artisan::call('Reminder:start');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'admin', 'prefix'=>'admin','as'=>'admin'], function (){
    Route::get('/', [App\Http\Controllers\admin\indexController::class, 'index'])->name('index');
});
