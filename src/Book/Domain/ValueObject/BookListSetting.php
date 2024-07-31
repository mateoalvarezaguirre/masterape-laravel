<?php

namespace Src\Book\Domain\ValueObject;

readonly class BookListSetting
{
    public function __construct(
        private bool $featured,
        private int $limit,
        private bool $paginate,
    ) {}

    public function isFeatured(): bool
    {
        return $this->featured;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function isPaginate(): bool
    {
        return $this->paginate;
    }
}
