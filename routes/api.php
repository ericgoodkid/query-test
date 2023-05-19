<?php

use App\Http\Controllers\BingoController;
use App\Http\Controllers\BingoCrossedOutController;
use App\Http\Controllers\BingoDrawController;
use Illuminate\Support\Facades\Route;

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
Route::resource('bingos', BingoController::class);
Route::resource('bingos.draws', BingoDrawController::class);
Route::resource('bingos.crossout', BingoCrossedOutController::class);
