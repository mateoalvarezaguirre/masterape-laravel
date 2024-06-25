<?php

namespace Src\Book\Application\UseCases;

use Src\Book\Application\DTO\FindBookDTO;
use Src\Book\Domain\Entities\BookEntity;
use Src\Book\Domain\Exceptions\BookNotFoundException;
use Src\Book\Domain\Repositories\BookRepository;

readonly class FindBookUseCase
{
    public function __construct(
        private FindBookDTO $dto,
        private BookRepository $repository
    ) {}

    /**
     * @throws BookNotFoundException
     */
    public function __invoke(): BookEntity
    {
        $book = $this->repository->findById(
            $this->dto->getBookId()
        );

        if (! $book) {
            throw new BookNotFoundException();
        }

        return $book;
    }
}
