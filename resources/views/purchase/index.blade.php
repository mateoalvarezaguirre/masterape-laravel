<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if (request()->routeIs('purchases.dashboard')) {{ __('Purchases') }} @else {{ __('Your purchases') }} @endif
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status') === 'purchase-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{__('Purchase updated successfully!')}}
                </div>
            @endif
                @if (session('status') === 'purchase-update-failed')
                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 5000)"
                        class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        {{__('We could not update your purchase, please try again.')}}
                    </div>
                @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(empty($purchases))
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("Ups! We couldn't find any task, create a new one here!") }}
                    </div>
                @else
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <table class="table-auto w-full">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td class="w-1/12 px-4 py-2 text-center">{{ $purchase->uuid }}</td>
                                    <td class="w-4/12 px-4 py-2 text-center">{{ $purchase->purchase_dates->created_at }}</td>
                                    <td class="w-4/12 px-4 py-2 text-center">
                                        <x-status-tag :status="$purchase->status === 'COMPLETED' ? 'success' : 'warning'">
                                            {{ $purchase->status}}
                                        </x-status-tag>
                                    </td>
                                    <td class="w-3/12 px-4 py-2 text-center">
                                        <a href="{{route('purchase.show', $purchase->uuid)}}">
                                            <x-primary-button>
                                                {{ __('Details') }}
                                            </x-primary-button>
                                        </a>
                                        @if (request()->routeIs('purchases.dashboard'))
                                            <x-secondary-button class="ml-2" x-on:click.prevent="$dispatch('open-modal', 'update-purchase-modal-{{ $purchase->id }}')">
                                                {{ __('Update') }}
                                            </x-secondary-button>
                                            <x-update-purchase-modal :purchase="$purchase" :statuses="$statuses" :show="$errors->updatePurchase->isNotEmpty()" />
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
