<?php

namespace App\Providers\Cart;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Src\Cart\Infrastructure\Components\Cart;

class CartServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Blade::component('cart', Cart::class);
    }
}
