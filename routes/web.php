<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Src\Task\Infrastructure\Controllers\TaskController;

Route::get('/', fn () => view('home'))->name('home');
Route::get('/about', fn () => view('about'))->name('about');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/contexts/tasks/tasks.php';
require __DIR__ . '/contexts/books/books.php';
require __DIR__ . '/contexts/cart/cart.php';
require __DIR__ . '/contexts/purchase/purchase.php';
require __DIR__ . '/contexts/communication/contact.php';
