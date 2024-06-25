<?php

namespace Src\Book\Application\DTO;

readonly class DeleteBookDTO
{
    public function __construct(
        private int $id
    ) {}

    public function getId(): int
    {
        return $this->id;
    }
}
