<?php

namespace Src\Task\Application\DTO;

readonly class UpdateTaskDTO
{
    public function __construct(
        private int $id,
        private string $title,
        private string $description,
        private bool $isDone
    ) {}

    public function getId(): int
    {
        return $this->id;
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
