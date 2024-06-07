<?php

namespace Src\Task\Application\DTO;

readonly class CreateTaskDTO
{
    public function __construct(
        private int $userId,
        private string $title,
        private string $description,
        private bool $isDone
    ) {}

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }
}
