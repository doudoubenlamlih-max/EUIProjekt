<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BidController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/products/{product}/bids', [BidController::class, 'store'])
    ->name('bids.store');