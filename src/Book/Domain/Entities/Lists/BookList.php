<?php

namespace Src\Book\Domain\Entities\Lists;

use Src\Book\Domain\Entities\BookEntity;
use Src\Shared\ValueObjects\Pagination;

class BookList
{
    private array $books;
    private Pagination $pagination;

    /**
     * @param array<BookEntity> $books
     */
    public function __construct(array $books = [])
    {
        $this->books = $books;
    }

    public function getPagination(): Pagination
    {
        return $this->pagination;
    }

    public function setPagination(Pagination $pagination): void
    {
        $this->pagination = $pagination;
    }

    public function add(BookEntity $book): void
    {
        $this->books[] = $book;
    }

    public function getBooks(): array
    {
        return $this->books;
    }

    public function toArray(): array
    {
        return array_map(fn (BookEntity $book) => $book->toArray(), $this->books);
    }

    public function toObject(): array
    {
        return array_map(fn (BookEntity $book) => (object) $book->toArray(), $this->books);
    }
}
