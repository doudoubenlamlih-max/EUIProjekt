<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BidController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);

Route::post('/products/{product}/bids', [BidController::class, 'store'])
    ->name('bids.store');

    Route::post('/products/{product}/buy', [OrderController::class, 'store'])
    ->name('orders.store');