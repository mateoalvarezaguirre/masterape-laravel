<?php

namespace Src\Book\Application\UseCases;

use Src\Book\Application\DTO\GetAllBooksDTO;
use Src\Book\Domain\Entities\Lists\BookList;
use Src\Book\Domain\Exceptions\BookNotFoundException;
use Src\Book\Domain\Repositories\BookRepository;

readonly class GetAllBooksUseCase
{

    private const BOOKS_PER_PAGE = 6;

    public function __construct(
        private GetAllBooksDTO $dto,
        private BookRepository $bookRepository
    ) {}

    /**
     * @throws BookNotFoundException
     */
    public function __invoke(): BookList
    {
        $bookList = $this->bookRepository->getAll(
            $this->dto->getPage(),
            self::BOOKS_PER_PAGE
        );

        if (!$bookList) {
            throw new BookNotFoundException();
        }

        return $bookList;
    }
}
