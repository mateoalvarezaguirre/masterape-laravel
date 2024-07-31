<?php

namespace App\Providers\Purchase;

use Illuminate\Support\ServiceProvider;
use Src\Purchase\Domain\Repositories\PurchaseRepository;
use Src\Purchase\Infrastructure\Repositories\PurchaseEloquentRepository;

class PurchaseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PurchaseRepository::class,
            PurchaseEloquentRepository::class
        );
    }
}
