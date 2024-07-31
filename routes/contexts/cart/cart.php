<?php

use Illuminate\Support\Facades\Route;
use Src\Cart\Infrastructure\Controllers\CartController;

Route::get('/cart', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/add/{bookId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{bookId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
