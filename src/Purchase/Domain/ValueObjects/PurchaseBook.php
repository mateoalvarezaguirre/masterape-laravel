<?php

namespace Src\Purchase\Domain\ValueObjects;

readonly class PurchaseBook
{
    private const BOOK_IMAGES_PREFIX = '/storage/books/images/';

    public function __construct(
        private int     $id,
        private ?float  $price = null,
        private ?string $title = null,
        private ?string $cover = null,
        private ?string $resume = null,
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function toArray(): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'cover_path'  => self::BOOK_IMAGES_PREFIX . $this->cover,
            'price'       => $this->price,
            'resume' => $this->resume,
        ];
    }

    public function toObject(): object
    {
        return (object) $this->toArray();
    }
}
