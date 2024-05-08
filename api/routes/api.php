<?php


use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\OrderDetailsController;
use Illuminate\Support\Facades\Route;


// aubrey
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::patch('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// kent
Route::get('/order_details', [OrderDetailsController::class, 'index']);
Route::get('/order_details/{id}', [OrderDetailsController::class, 'show']);
Route::post('/order_details', [OrderDetailsController::class, 'store']);
Route::patch('/order_details/{id}', [OrderDetailsController::class, 'update']);
Route::delete('/order_details/{id}', [OrderDetailsController::class, 'destroy']);