<?php

namespace Src\Book\Application\UseCases;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Src\Book\Domain\Repositories\BookRepository;
use Src\Cart\Application\UseCases\GetCartBookListUseCaseInterface;
use Src\Cart\Domain\ValueObjects\List\CartBookList;
use Src\Shared\ValueObjects\Cart;

readonly class GetCartBookListBookListUseCase implements GetCartBookListUseCaseInterface
{
    public function __construct(
        private BookRepository $bookRepository
    ) {}

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function get(): CartBookList
    {
        /**
         * @var null|Cart $cart
         */
        $cart = session()->get('cart');

        if (! $cart) {
            return new CartBookList();
        }

        return $this->bookRepository->getCartBookList(
            $cart
        );
    }
}
