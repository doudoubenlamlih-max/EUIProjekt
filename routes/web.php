<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\BidController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);

Route::post('/products/{product}/bids', [BidController::class, 'store'])
    ->name('bids.store');