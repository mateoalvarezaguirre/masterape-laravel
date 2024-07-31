<?php

namespace Src\Purchase\Application\UseCases;

use Src\Purchase\Application\DTO\GetPurchaseListDTO;
use Src\Purchase\Domain\Entities\Lists\PurchaseEntityList;
use Src\Purchase\Domain\Repositories\PurchaseRepository;

readonly class GetPurchaseListUseCase
{
    public function __construct(
        private GetPurchaseListDTO $dto,
        private PurchaseRepository $repository
    ) {}

    public function __invoke(): PurchaseEntityList
    {
        if ($userId = $this->dto->getUserId()) {
            return $this->repository->getAllByUserId($userId);
        }

        return $this->repository->getAll();
    }
}
