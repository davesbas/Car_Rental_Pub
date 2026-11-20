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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('/register',[App\Http\Controllers\Api\AuthController::class,'register']);
// Route::post('/login',[App\Http\Controllers\Api\AuthController::class,'login']);

Route::middleware('auth:api')->group(function(){
    Route::get('/kendaraan',[App\Http\Controllers\Api\KendaraanController::class,'index']);
    Route::post('/kendaraan',[App\Http\Controllers\Api\KendaraanController::class,'store']);
    Route::get('/kendaraan/{id}',[App\Http\Controllers\Api\KendaraanController::class,'show']);
    Route::put('/kendaraan/{id}',[App\Http\Controllers\Api\KendaraanController::class,'update']);
    Route::delete('/kendaraan/{id}',[App\Http\Controllers\Api\KendaraanController::class,'destroy']);
});
