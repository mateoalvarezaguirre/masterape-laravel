<?php

namespace Src\Cart\Infrastructure\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Src\Cart\Application\UseCases\GetCartBookListUseCaseInterface;
use Src\Shared\ValueObjects\Cart;

class CartController
{
    public function __construct(
        private GetCartBookListUseCaseInterface $useCase
    ) {}

    public function addToCart(int $bookId): RedirectResponse
    {
        /**
         * @var null|Cart $cart
         */
        $cart = Session::get('cart');

        if ($cart) {
            $cart->addBook($bookId);
        } else {
            $cart = new Cart([$bookId]);
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Book added to cart');
    }

    public function removeFromCart(int $bookId): RedirectResponse
    {
        /**
         * @var null|Cart $cart
         */
        $cart = Session::get('cart');

        $cart?->removeBook($bookId);

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Book removed from cart');
    }

    public function checkout(): View
    {
        return view('cart.checkout')->with([
            'books' => $this->useCase->get()->toObject(),
        ]);
    }
}
