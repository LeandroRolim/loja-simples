<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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
Route::get('stats', StatsController::class);
Route::get('categories', [CategoryController::class, 'index']);
Route::apiResource('brands' , BrandController::class)->only(['index', 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('categories', [CategoryController::class, 'store']);
    Route::get('/user', fn (Request $request) => $request->user());
    Route::apiResource('users' , UserController::class);
    Route::apiResource('brands' , BrandController::class)->except(['index', 'destroy', 'show']);
});
