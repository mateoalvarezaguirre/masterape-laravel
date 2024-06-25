<?php

namespace Src\Book\Application\DTO;

readonly class GetAllBooksDTO
{
    public function __construct(
        private int $page
    ) {}

    public function getPage(): int
    {
        return $this->page;
    }
}
