<?php

use Illuminate\Support\Facades\Route;
use Src\Purchase\Infrastructure\Controllers\PurchaseController;

Route::middleware(['auth'])->group(function () {
    Route::post(
        'purchase', [PurchaseController::class, 'create']
    )->name('purchase.create');

    Route::get(
        'purchase/{purchaseId}', [PurchaseController::class, 'show']
    )->name('purchase.show');

    Route::get(
        'purchases', [PurchaseController::class, 'index']
    )->name('purchases.index');

    Route::get(
        'purchases-dashboard', [PurchaseController::class, 'dashboard']
    )->name('purchases.dashboard')->middleware('check.role:2');

    Route::put(
        'purchase/{purchaseId}', [PurchaseController::class, 'update']
    )->name('purchase.update')->middleware('check.role:2');
});
