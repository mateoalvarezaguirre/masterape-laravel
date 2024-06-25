<?php

namespace Src\Book\Domain\Entities;

class BookEntity
{
    private const BOOK_IMAGES_PREFIX = '/storage/books/images/';
    private ?int $id                 = null;

    public function __construct(
        private readonly string $title,
        private readonly string $resume,
        private readonly string $fullDescription,
        private readonly AuthorEntity $author,
        private readonly string $cover,
        private readonly string $hero,
        private readonly float $price,
        private readonly bool $isFeatured
    ) {}

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getResume(): string
    {
        return $this->resume;
    }

    public function getFullDescription(): string
    {
        return $this->fullDescription;
    }

    public function getAuthor(): AuthorEntity
    {
        return $this->author;
    }

    public function getCover(): string
    {
        return $this->cover;
    }

    public function getHero(): string
    {
        return $this->hero;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function isFeatured(): bool
    {
        return $this->isFeatured;
    }

    public function toArray(): array
    {
        return [
            'id'               => $this->id,
            'title'            => $this->title,
            'resume'           => $this->resume,
            'full_description' => $this->fullDescription,
            'author'           => $this->author->toArray(),
            'cover_path'       => self::BOOK_IMAGES_PREFIX . $this->cover,
            'hero_path'        => self::BOOK_IMAGES_PREFIX . $this->hero,
            'price'            => $this->price,
            'is_featured'      => $this->isFeatured,
        ];
    }

    public function toUpdate(): array
    {
        return [
            'title'            => $this->title,
            'resume'           => $this->resume,
            'full_description' => $this->fullDescription,
            'author_id'        => $this->author->getId(),
            'cover_image_path' => $this->cover,
            'hero_image_path'  => $this->hero,
            'price'            => $this->price,
            'is_featured'      => $this->isFeatured,
        ];
    }
}
