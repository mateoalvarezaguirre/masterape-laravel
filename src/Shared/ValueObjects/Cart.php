<?php

namespace Src\Shared\ValueObjects;

class Cart
{
    public function __construct(
        private array $bookArray = []
    ) {}

    public function addBook(int $bookId): void
    {
        if (! in_array($bookId, $this->bookArray)) {
            $this->bookArray[] = $bookId;
        }
    }

    public function removeBook(int $bookId): void
    {
        $this->bookArray = array_filter($this->bookArray, fn ($id) => $id !== $bookId);
    }

    public function getList(): array
    {
        return $this->bookArray;
    }

    public function isEmpty(): bool
    {
        return empty($this->bookArray);
    }

    public function count(): int
    {
        return count($this->bookArray);
    }
}
