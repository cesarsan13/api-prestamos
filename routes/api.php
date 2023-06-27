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
Route::post('login',[AuthController::class,'login']);


Route::middleware('auth:sanctum')->controller(AuthController::class)->group(function(){
    Route::delete('/logout/{id}','logout');
});

Route::middleware('auth:sanctum')->controller(CustomerController::class)->group(function(){
    // Route::get('customer',[CustomerController::class,'index']);
    Route::post('/customer','store');
    Route::get("/customers","index");
});
 
