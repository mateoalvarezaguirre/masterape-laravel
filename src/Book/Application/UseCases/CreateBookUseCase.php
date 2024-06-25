<?php

namespace Src\Book\Application\UseCases;

use Src\Book\Application\DTO\BookDTO;
use Src\Book\Domain\Entities\AuthorEntity;
use Src\Book\Domain\Entities\BookEntity;
use Src\Book\Domain\Exceptions\FailToCreateBook;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Shared\Services\Storage\Contracts\StorageServiceManagement;
use Src\Shared\ValueObjects\Image;

readonly class CreateBookUseCase
{
    public function __construct(
        private BookDTO $dto,
        private BookRepository $repository,
        private StorageServiceManagement $storageService
    ) {}

    /**
     * @throws FailToCreateBook
     */
    public function __invoke(): void
    {
        $coverImage = $this->saveImage(
            $this->dto->getCover()
        );

        $heroImage = $this->saveImage(
            $this->dto->getHero()
        );

        $bookEntity = new BookEntity(
            $this->dto->getTitle(),
            $this->dto->getResume(),
            $this->dto->getFullDescription(),
            AuthorEntity::toCreateBook($this->dto->getAuthorId()),
            $coverImage,
            $heroImage,
            $this->dto->getPrice(),
            $this->dto->isFeatured()
        );

        if (! $this->repository->create($bookEntity)) {
            throw new FailToCreateBook();
        }
    }

    private function saveImage(Image $image): string
    {
        $imageName = uniqid() . '.' . $image->getExtension();

        $this->storageService->store(
            'books/images/' . $imageName,
            $image->getContent()
        );

        return $imageName;
    }
}
