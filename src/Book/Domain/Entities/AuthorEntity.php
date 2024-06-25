<?php

namespace Src\Book\Domain\Entities;

readonly class AuthorEntity
{
    public function __construct(
        private int $id,
        private string $firstName,
        private string $lastName
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public static function toCreateBook(int $id): self
    {
        return new self($id, '', '');
    }

    public function toArray(): array
    {
        return [
            'id'        => $this->id,
            'full_name' => $this->getFullName(),
        ];
    }
}
