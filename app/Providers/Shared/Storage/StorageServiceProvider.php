<?php

namespace App\Providers\Shared\Storage;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Services\Storage\Contracts\StorageServiceManagement;
use Src\Shared\Services\Storage\StoreLocalDiskService;

class StorageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StorageServiceManagement::class, StoreLocalDiskService::class);
    }
}
