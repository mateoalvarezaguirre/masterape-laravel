<?php

use Illuminate\Support\Facades\Route;
use Src\Communication\Infrastructure\Controllers\ContactController;

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
