<?php

namespace Src\Task\Application\DTO;

readonly class GetAllTaskDTO
{
    public function __construct(
        private int $userId
    ) {}

    public function getUserId(): int
    {
        return $this->userId;
    }
}
