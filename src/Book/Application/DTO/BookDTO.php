<?php

namespace Src\Book\Application\DTO;

use Illuminate\Http\Request;
use Src\Shared\Helpers\FileHelper;
use Src\Shared\ValueObjects\Image;

class BookDTO
{
    private int $id;

    public function __construct(
        private readonly string $title,
        private readonly string $resume,
        private readonly string $fullDescription,
        private readonly int $authorId,
        private readonly Image $cover,
        private readonly Image $hero,
        private readonly float $price,
        private readonly bool $isFeatured
    ) {}

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
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

    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    public function getCover(): Image
    {
        return $this->cover;
    }

    public function getHero(): Image
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

    public static function fromRequest(Request $request): self
    {
        return new self(
            $request->input('title'),
            $request->input('resume'),
            $request->input('full_description'),
            (int) $request->input('author_id'),
            new Image(
                $request->file('cover')?->getContent() ?? '',
                FileHelper::getExtensionFromName(
                    $request->file('cover')?->getClientOriginalName() ?? ''
                )
            ),
            new Image(
                $request->file('hero')?->getContent() ?? '',
                FileHelper::getExtensionFromName(
                    $request->file('hero')?->getClientOriginalName() ?? ''
                )
            ),
            (float) $request->input('price'),
            (bool) $request->input('is_featured')
        );
    }
}
