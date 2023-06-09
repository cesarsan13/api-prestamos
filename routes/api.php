<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AuthController;
Use App\Http\Controllers\CustomerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'login']);
Route::post('signup',[AuthController::class,'signup']);
Route::get('customer',[CustomerController::class,'index']);
