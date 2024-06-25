<?php

namespace Src\Book\Application\DTO;

readonly class FindBookDTO
{
    public function __construct(
        private int $bookId
    ) {}

    public function getBookId(): int
    {
        return $this->bookId;
    }
}
