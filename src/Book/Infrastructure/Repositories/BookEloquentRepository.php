<?php

namespace Src\Book\Infrastructure\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\Log;
use Src\Book\Domain\Entities\BookEntity;
use Src\Book\Domain\Entities\Lists\BookList;
use Src\Book\Domain\Exceptions\FailToDeleteBook;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Book\Infrastructure\Mappers\BookMapper;
use Src\Shared\ValueObjects\Pagination;

class BookEloquentRepository implements BookRepository
{
    public function create(BookEntity $bookEntity): ?BookEntity
    {
        try {

            $bookModel = Book::create([
                'title'            => $bookEntity->getTitle(),
                'resume'           => $bookEntity->getResume(),
                'full_description' => $bookEntity->getFullDescription(),
                'author_id'        => $bookEntity->getAuthor()->getId(),
                'cover_image_path' => $bookEntity->getCover(),
                'hero_image_path'  => $bookEntity->getHero(),
                'price'            => $bookEntity->getPrice(),
                'is_featured'      => $bookEntity->isFeatured(),
            ]);

            $bookEntity->setId($bookModel->id);

            return $bookEntity;

        } catch (\Exception $e) {
            Log::error($e);

            return null;
        }
    }

    public function update(BookEntity $bookEntity): bool
    {
        try {
            return (bool) Book::find($bookEntity->getId())->update(
                $bookEntity->toUpdate()
            );
        } catch (\Exception $e) {
            Log::error($e);

            return false;
        }
    }

    /**
     * @throws FailToDeleteBook
     */
    public function delete(int $id): void
    {
        try {
            Book::destroy($id);

        } catch (\Exception $e) {
            Log::error($e);

            throw new FailToDeleteBook();
        }
    }

    public function findById(int $id): ?BookEntity
    {
        try {

            $book = Book::find($id);

            if (! $book) {
                return null;
            }

            return BookMapper::fromModelToEntity($book);

        } catch (\Exception $e) {
            Log::error($e);

            return null;
        }
    }

    public function getAll(int $page, int $limit): ?BookList
    {
        try {
            $books = Book::paginate(
                $limit,
                ['*'],
                'page',
                $page
            );

            $bookList = BookMapper::fromArrayToList($books->items());

            $bookList->setPagination(
                new Pagination(
                    $books->total(),
                    $books->perPage(),
                    $books->currentPage(),
                    $books->lastPage(),
                    $books->firstItem(),
                    $books->lastItem()
                )
            );

            return $bookList;
        } catch (\Exception $e) {
            Log::error($e);

            return null;
        }
    }
}
