<?php

namespace Src\Task\Domain\Entities;

class TaskEntity
{
    public function __construct(
        private ?int $id,
        private readonly string $title,
        private readonly ?string $description,
        private readonly bool $isDone,
        private readonly int $userId
    ) {}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function isDone(): bool
    {
        return $this->isDone;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function toArray(): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'is_done'     => $this->isDone,
        ];
    }

    public static function toCreate(
        string $title,
        string $description,
        bool $isDone,
        int $userId
    ): self {
        return new self(
            null,
            $title,
            $description,
            $isDone,
            $userId
        );
    }
}
