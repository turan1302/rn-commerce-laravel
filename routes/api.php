<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'product','as'=>'product.'],function (){
    Route::get('list',[\App\Http\Controllers\api\product\indexController::class,'list'])->name('list');
    Route::post('create',[\App\Http\Controllers\api\product\indexController::class,'create'])->name('create');
    Route::get('detail/{productId}',[\App\Http\Controllers\api\product\indexController::class,'detail'])->name('detail');
    Route::post('search',[\App\Http\Controllers\api\product\indexController::class,'search'])->name('search');
});
