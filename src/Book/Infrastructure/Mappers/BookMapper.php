<?php

namespace Src\Book\Infrastructure\Mappers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Src\Book\Domain\Entities\BookEntity;
use Src\Book\Domain\Entities\Lists\BookList;
use Src\Shared\ValueObjects\Pagination;

abstract class BookMapper
{
    /**
     * @param array<Book> $collection
     * @return BookList
     */
    public static function fromArrayToList(array $booksArray): BookList
    {
        $books = new BookList();

        foreach ($booksArray as $book) {
            $books->add(self::fromModelToEntity($book));
        }

        return $books;
    }

    public static function fromModelToEntity(Book $book): BookEntity
    {
        $bookEntity = new BookEntity(
            $book->title,
            $book->resume,
            $book->full_description,
            AuthorMapper::fromModelToEntity($book->author),
            $book->cover_image_path,
            $book->hero_image_path,
            $book->price,
            (bool) $book->is_featured
        );

        $bookEntity->setId($book->id);

        return $bookEntity;
    }
}
