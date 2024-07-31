<?php

namespace Src\Book\Application\DTO;

readonly class GetAllBooksDTO
{
    public function __construct(
        private int $page,
        private ?int $limit = null,
        private ?bool $featured = null,
    ) {}

    public function getPage(): int
    {
        return $this->page;
    }

    public function getLimit(): ?int
    {
        return $this->limit;
    }

    public function getFeatured(): ?bool
    {
        return $this->featured;
    }
}
