<?php

return [
    App\Providers\AppServiceProvider::class,
    ...App\Providers\Shared\SharedServiceProvider::getProviders(),
    App\Providers\Task\TaskServiceProvider::class,
    App\Providers\Book\BookServiceProvider::class,
];
