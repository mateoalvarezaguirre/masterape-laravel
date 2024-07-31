<?php

namespace Src\Book\Infrastructure\Mappers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Src\Book\Domain\Entities\BookEntity;
use Src\Book\Domain\Entities\Lists\BookList;
use Src\Cart\Domain\ValueObjects\CartBook;
use Src\Cart\Domain\ValueObjects\List\CartBookList;
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

    /**
     * @param Collection<Book> $books
     * @return CartBookList
     */
    public static function fromCollectionToCartBookList(Collection $books): CartBookList
    {
        $cartBookList = new CartBookList();

        foreach ($books as $book) {
            $cartBookList->add(self::fromModelToCartBook($book));
        }

        return $cartBookList;
    }

    public static function fromModelToCartBook(Book $book): CartBook
    {
        return new CartBook(
            $book->id,
            $book->title,
            $book->cover_image_path,
            $book->price
        );
    }
}
