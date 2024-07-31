<?php

namespace Src\Book\Infrastructure\Controllers;

use App\Models\Author;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Src\Book\Application\DTO\DeleteBookDTO;
use Src\Book\Application\DTO\FindBookDTO;
use Src\Book\Application\UseCases\CreateBookUseCase;
use Src\Book\Application\UseCases\DeleteBookUseCase;
use Src\Book\Application\UseCases\FindBookUseCase;
use Src\Book\Application\UseCases\GetAllBooksUseCase;
use Src\Book\Application\UseCases\UpdateBookUseCase;
use Src\Book\Domain\Exceptions\BookNotFoundException;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Book\Infrastructure\Requests\CreateBookRequest;
use Src\Book\Infrastructure\Requests\GetAllBooksRequest;
use Src\Book\Infrastructure\Requests\UpdateBookRequest;
use Src\Shared\Services\Storage\Contracts\StorageServiceManagement;

readonly class BookController
{
    public function __construct(
        private BookRepository $repository,
        private StorageServiceManagement $storageService
    ) {}

    /**
     * @throws BookNotFoundException
     */
    public function index(GetAllBooksRequest $request): View
    {
        $useCase = new GetAllBooksUseCase(
            $request->dto(),
            $this->repository
        );

        $result = $useCase();

        return view('books.index', [
            'books'      => $result->toObject(),
            'pagination' => $result->getPagination()->toLengthAwarePaginator(),
        ]);
    }

    public function new(): View
    {
        $authors = Author::all();

        return view('books.form', [
            'authors' => $authors,
        ]);
    }

    public function store(CreateBookRequest $request): RedirectResponse
    {
        try {
            $useCase = new CreateBookUseCase(
                $request->dto(),
                $this->repository,
                $this->storageService
            );

            $useCase();

            return Redirect::route('books.index')->with('status', 'book-created');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit(int $bookId): RedirectResponse|View
    {
        try {
            $useCase = new FindBookUseCase(
                new FindBookDTO($bookId),
                $this->repository
            );

            $authors = Author::all();

            return view('books.form', [
                'book'    => (object) $useCase()->toArray(),
                'authors' => $authors,
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(UpdateBookRequest $request, int $bookId): RedirectResponse
    {
        try {
            $useCase = new UpdateBookUseCase(
                $request->dto($bookId),
                $this->repository,
                $this->storageService
            );

            $useCase();

            return redirect()->route('books.edit', $bookId)->with(
                'status',
                'book-updated'
            );
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(int $bookId): RedirectResponse
    {
        try {
            $useCase = new DeleteBookUseCase(
                new DeleteBookDTO($bookId),
                $this->repository,
                $this->storageService
            );

            $useCase();

            return redirect()->back()->with('status', 'book-deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @throws BookNotFoundException
     */
    public function detail(int $bookId): View
    {
        $useCase = new FindBookUseCase(
            new FindBookDTO($bookId),
            $this->repository
        );

        return view('books.detail', [
            'book' => (object) $useCase()->toArray(),
        ]);
    }
}
