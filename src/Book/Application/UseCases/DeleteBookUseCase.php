<?php

namespace Src\Book\Application\UseCases;

use Src\Book\Application\DTO\DeleteBookDTO;
use Src\Book\Domain\Exceptions\BookNotFoundException;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Shared\Services\Storage\Contracts\StorageServiceManagement;

readonly class DeleteBookUseCase
{
    public function __construct(
        private DeleteBookDTO $dto,
        private BookRepository $repository,
        private StorageServiceManagement $storageService
    ) {}

    /**
     * @throws BookNotFoundException
     */
    public function __invoke(): void
    {
        $book = $this->repository->findById(
            $this->dto->getId()
        );

        if (! $book) {
            throw new BookNotFoundException();
        }

        $this->deleteImage($book->getCover());
        $this->deleteImage($book->getHero());

        $this->repository->delete($this->dto->getId());
    }

    private function deleteImage(string $imageName): void
    {
        $this->storageService->delete('books/images/' . $imageName);
    }
}
