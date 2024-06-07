<?php

namespace Src\Task\Domain\Entities\Lists;

use Src\Task\Domain\Entities\TaskEntity;

class TaskEntityList
{
    /**
     * @var array<TaskEntity>
     */
    private array $tasks;

    /**
     * @param array<TaskEntity> $tasks
     */
    public function __construct(array $tasks = [])
    {
        $this->tasks = $tasks;
    }

    public function add(TaskEntity $task): void
    {
        $this->tasks[] = $task;
    }

    /**
     * @return array<TaskEntity>
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    public function toArray(): array
    {
        return array_map(
            fn (TaskEntity $task) => (object) $task->toArray(),
            $this->tasks
        );
    }
}
