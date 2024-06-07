<?php

namespace Src\Task\Application\DTO;

readonly class DeleteTaskDTO
{
    public function __construct(
        private int $taskId
    ) {}

    public function getTaskId(): int
    {
        return $this->taskId;
    }
}
