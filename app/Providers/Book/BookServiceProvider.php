<?php

namespace App\Providers\Book;

use Illuminate\Support\ServiceProvider;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Book\Infrastructure\Repositories\BookEloquentRepository;

class BookServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BookRepository::class, BookEloquentRepository::class);
    }
}
