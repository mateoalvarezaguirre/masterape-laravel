<?php

namespace Src\Purchase\Infrastructure\Controllers;

use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Src\Purchase\Application\DTO\CreatePurchaseDTO;
use Src\Purchase\Application\DTO\FindPurchaseDTO;
use Src\Purchase\Application\DTO\GetPurchaseListDTO;
use Src\Purchase\Application\UseCases\CreatePurchaseUseCase;
use Src\Purchase\Application\UseCases\FindPurchaseUseCase;
use Src\Purchase\Application\UseCases\GetPurchaseListUseCase;
use Src\Purchase\Application\UseCases\UpdatePurchaseUseCase;
use Src\Purchase\Domain\Enums\PurchaseStatusEnum;
use Src\Purchase\Domain\Exceptions\PurchaseNotFound;
use Src\Purchase\Domain\Repositories\PurchaseRepository;
use Src\Purchase\Infrastructure\Requests\UpdatePurchaseRequest;
use Src\Shared\ValueObjects\Cart;

readonly class PurchaseController
{
    public function __construct(
        private PurchaseRepository $repository,
    ) {}

    public function create(): RedirectResponse
    {
        try {
            /**
             * @var Cart $cart
             */
            $cart = session('cart');

            $dto = new CreatePurchaseDTO(
                (int) auth()->id(),
                $cart
            );

            $useCase = new CreatePurchaseUseCase(
                $dto,
                $this->repository
            );

            $result = $useCase();

            session()->forget('cart');

            return redirect()->route(
                'purchase.show',
                $result->getUuid()
            )->with('status', 'purchase-created');

        } catch (Exception $e) {
            return redirect()->back()->with('status', 'purchase-creation-failed');
        }
    }

    /**
     * @throws PurchaseNotFound
     */
    public function show(string $purchaseUuid): View
    {
        $useCase = new FindPurchaseUseCase(
            new FindPurchaseDTO($purchaseUuid),
            $this->repository
        );

        return view('purchase.show', [
            'purchase' => $useCase()->toObject(),
        ]);
    }

    public function index(): View
    {
        $useCase = new GetPurchaseListUseCase(
            new GetPurchaseListDTO((int) auth()->id()),
            $this->repository
        );

        return view('purchase.index', [
            'purchases' => $useCase()->toObject(),
        ]);
    }

    public function dashboard(): View
    {
        $useCase = new GetPurchaseListUseCase(
            new GetPurchaseListDTO(),
            $this->repository
        );

        return view('purchase.index', [
            'purchases' => $useCase()->toObject(),
            'statuses'  => PurchaseStatusEnum::cases(),
        ]);
    }

    public function update(UpdatePurchaseRequest $request, int $purchaseId): RedirectResponse
    {
        try {
            $useCase = new UpdatePurchaseUseCase(
                $request->dto($purchaseId),
                $this->repository
            );

            $useCase();

            return redirect()->back()->with('status', 'purchase-updated');
        } catch (Exception $e) {
            return redirect()->back()->with('status', 'purchase-update-failed');
        }
    }
}
