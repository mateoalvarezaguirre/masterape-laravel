<?php

namespace Src\Purchase\Infrastructure\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Src\Purchase\Application\DTO\UpdatePurchaseDTO;
use Src\Purchase\Domain\Enums\PurchaseStatusEnum;

class UpdatePurchaseRequest extends FormRequest
{
    protected $errorBag = 'updatePurchase';

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'purchase_status' => 'required|integer|in:' . implode(',', PurchaseStatusEnum::toArray()),
        ];
    }

    public function dto(int $purchaseId): UpdatePurchaseDTO
    {
        return new UpdatePurchaseDTO(
            $purchaseId,
            PurchaseStatusEnum::from($this->input('purchase_status'))
        );
    }
}
