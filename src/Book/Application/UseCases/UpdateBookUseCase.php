<?php

namespace Src\Book\Application\UseCases;

use Src\Book\Application\DTO\BookDTO;
use Src\Book\Domain\Entities\AuthorEntity;
use Src\Book\Domain\Entities\BookEntity;
use Src\Book\Domain\Exceptions\BookNotFoundException;
use Src\Book\Domain\Exceptions\FailToUpdateBook;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Shared\Services\Storage\Contracts\StorageServiceManagement;
use Src\Shared\ValueObjects\Image;

readonly class UpdateBookUseCase
{
    public function __construct(
        private BookDTO $dto,
        private BookRepository $repository,
        private StorageServiceManagement $storageService,
    ) {}

    /**
     * @throws FailToUpdateBook
     * @throws BookNotFoundException
     */
    public function __invoke(): void
    {
        $originalBook = $this->repository->findById($this->dto->getId());

        if (! $originalBook) {
            throw new BookNotFoundException();
        }

        if ($this->dto->getCover()->getContent()) {
            $cover = $this->updateImage(
                $this->dto->getCover(),
                $originalBook->getCover()
            );
        }

        if ($this->dto->getHero()->getContent()) {
            $hero = $this->updateImage(
                $this->dto->getHero(),
                $originalBook->getHero()
            );
        }

        $bookEntity = new BookEntity(
            $this->dto->getTitle(),
            $this->dto->getResume(),
            $this->dto->getFullDescription(),
            AuthorEntity::toCreateBook($this->dto->getAuthorId()),
            isset($cover) ? $cover->getName() : $originalBook->getCover(),
            isset($hero) ? $hero->getName() : $originalBook->getHero(),
            $this->dto->getPrice(),
            $this->dto->isFeatured()
        );

        $bookEntity->setId($this->dto->getId());

        if (! $this->repository->update(
            $bookEntity
        )) {
            throw new FailToUpdateBook();
        }
    }

    private function updateImage(Image $image, string $name): Image
    {
        $this->storageService->delete(
            'books/images/' . $name
        );

        $name = explode('.', $name)[0];

        $imageName = $name . ".{$image->getExtension()}";

        $this->storageService->store(
            'books/images/' . $imageName,
            $image->getContent()
        );

        $image->setName($imageName);

        return $image;
    }
}
