<?php

namespace App\Providers\Task;

use Illuminate\Support\ServiceProvider;
use Src\Task\Domain\Repositories\TaskRepository;
use Src\Task\Infrastructure\Repositories\TaskEloquentRepository;

class TaskServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TaskRepository::class, TaskEloquentRepository::class);
    }
}
