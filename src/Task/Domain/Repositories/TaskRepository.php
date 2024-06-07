<?php

namespace Src\Task\Domain\Repositories;

use Src\Task\Domain\Entities\Lists\TaskEntityList;
use Src\Task\Domain\Entities\TaskEntity;

interface TaskRepository
{
    public function getTasks(int $userId): TaskEntityList;

    public function createTask(TaskEntity $task): TaskEntity;

    public function updateTask(TaskEntity $task): void;

    public function delete(int $taskId);
}
