<?php

namespace App\Providers\Book;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Src\Book\Application\UseCases\GetCartBookListBookListUseCase;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Book\Infrastructure\Components\BookList;
use Src\Book\Infrastructure\Repositories\BookEloquentRepository;
use Src\Cart\Application\UseCases\GetCartBookListUseCaseInterface;

class BookServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(BookRepository::class, BookEloquentRepository::class);
        $this->app->bind(GetCartBookListUseCaseInterface::class, GetCartBookListBookListUseCase::class);
    }

    public function boot(): void
    {
        Blade::component('book-list', BookList::class);
    }
}
