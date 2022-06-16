<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\StateController;
use App\Http\Controllers\Api\StateController;


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
Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::middleware('auth:sanctum')->controller(StateController::class)->group(function(){
    Route::get('state', 'index');
    Route::get('state/{id}', 'show');
});

Route::middleware('auth:sanctum')->controller(CityController::class)->group(function(){
    Route::get('city', 'index');
    Route::get('city/state/{id}', 'showByState');
    Route::get('city/{id}', 'show');
});
