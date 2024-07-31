<?php

namespace Src\Cart\Domain\ValueObjects;

class CartBook
{
    private const BOOK_IMAGES_PREFIX = '/storage/books/images/';

    public function __construct(
        private readonly int $id,
        private readonly string $title,
        private readonly string $cover,
        private readonly float $price
    ) {}

    public function toArray(): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'cover_path' => self::BOOK_IMAGES_PREFIX . $this->cover,
            'price'      => $this->price,
        ];
    }
}
