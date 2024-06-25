<?php

use Illuminate\Support\Facades\Route;
use Src\Book\Infrastructure\Controllers\BookController;

Route::middleware(['auth', 'check.role:2'])->group(function () {
    Route::get('/books-dashboard', [BookController::class, 'index'])->name('books.index');

    Route::get('/books/new', [BookController::class, 'new'])->name('books.new');
    Route::post('/books/new', [BookController::class, 'store'])->name('books.create');

    Route::get('/books/{book}', [BookController::class, 'edit'])->name('books.edit');
    Route::patch('/books/{book}', [BookController::class, 'update'])->name('books.update');

    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});
