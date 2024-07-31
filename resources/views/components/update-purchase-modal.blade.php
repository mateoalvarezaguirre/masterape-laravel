@php use Src\Purchase\Domain\Enums\PurchaseStatusEnum; @endphp
@props(['purchase', 'statuses', 'show' => false])

<x-modal name="update-purchase-modal-{{ $purchase->id }}"
         :show="$show"
         focusable
>
    <form method="post" action="{{ route('purchase.update', $purchase->id) }}"
          class="p-6 text-left bg-gray-800 dark:bg-gray-200">
        @csrf
        @method('put')
        <h2 class="text-lg font-medium text-gray-100 dark:text-gray-900">
            {{ __('Update purchase') }}
        </h2>

        @if ($errors->updatePurchase->isNotEmpty())
            <div
                class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-red-800 dark:text-red-400" role="alert">
                @foreach($errors->updatePurchase->all() as $updatePurchaseError)
                    <div>{{ $updatePurchaseError }}</div>
                @endforeach
            </div>
        @endif

        <div class="my-3">
            <x-input-label for="purchase_status" :value="__('Status')"/>
            <select name="purchase_status" id="purchase_status" class="mt-2 rounded-md cursor-pointer text-gray-900">
                @foreach ($statuses as $status)
                    @php
                        $purchaseStatus = PurchaseStatusEnum::fromName($purchase->status);

                    @endphp
                    <option
                        value="{{ $status->value }}" @selected(old('purchase_status', $purchaseStatus->value) == $status->value)>
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mt-6 flex justify-end">
            <x-primary-button x-on:click="$dispatch('close')" type="button">
                {{ __('Cancel') }}
            </x-primary-button>

            <x-secondary-button class="ms-3" type="submit">
                {{ __('Update') }}
            </x-secondary-button>
        </div>
    </form>
</x-modal>
