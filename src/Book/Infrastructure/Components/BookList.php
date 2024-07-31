<?php

namespace Src\Book\Infrastructure\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Src\Book\Application\DTO\GetAllBooksDTO;
use Src\Book\Application\UseCases\GetAllBooksUseCase;
use Src\Book\Domain\Exceptions\BookNotFoundException;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Book\Domain\ValueObject\BookListSetting;
use function request;

class BookList extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private readonly BookRepository $repository,
        private readonly BookListSetting $bookListSetting
    ) {}

    /**
     * Get the view / contents that represent the component.
     * @throws BookNotFoundException
     */
    public function render(): Closure|string|View
    {
        $useCase = new GetAllBooksUseCase(
            new GetAllBooksDTO(
                ((int) request()->input('page')) ?: 1,
                $this->bookListSetting->getLimit(),
                $this->bookListSetting->isFeatured()
            ),
            $this->repository
        );

        $result = $useCase();

        return view('books.book-list', [
            'books'    => $result->toObject(),
            'paginate' => $this->bookListSetting->isPaginate() ? $result->getPagination() : null,
        ]);
    }
}
