<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//public routes
Route::get('stats', StatsController::class);
Route::get('categories', [CategoryController::class, 'index']);
Route::apiResource('brands' , BrandController::class)->only(['index', 'show']);
Route::apiResource('products' , ProductController::class)->only(['index', 'show']);
Route::apiResource('coupons' , CouponController::class)->only(['index', 'show']);

//private routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('categories', [CategoryController::class, 'store']);
    Route::get('/user', fn (Request $request) => $request->user());
    Route::apiResource('users' , UserController::class);
    Route::apiResource('brands' , BrandController::class)->except(['index', 'destroy', 'show']);
    Route::apiResource('products' , ProductController::class)->except(['index', 'show']);
    Route::apiResource('coupons' , CouponController::class)->except(['index', 'show']);
});
