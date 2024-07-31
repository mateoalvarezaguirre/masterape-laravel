<?php

namespace Src\Cart\Infrastructure\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Src\Cart\Application\UseCases\GetCartBookListUseCaseInterface;
use Src\Shared\ValueObjects\Cart as CartObject;

class Cart extends Component
{
    public function __construct(
        private readonly GetCartBookListUseCaseInterface $useCase
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): Closure|string|View
    {
        /**
         * @var null|CartObject $cart
         */
        $cart = session('cart');

        if (! $cart || $cart->isEmpty()) {
            return view('components.cart')->with(['cart' => null]);
        }

        $books = $this->useCase->get();

        return view('components.cart')->with([
            'cart'  => session('cart'),
            'books' => $books->toObject(),
        ]);
    }
}
