<?php

namespace App\Providers\Shared;

use App\Providers\Shared\Storage\StorageServiceProvider;

abstract class SharedServiceProvider
{
    public static function getProviders(): array
    {
        return [
            StorageServiceProvider::class,
        ];
    }
}
