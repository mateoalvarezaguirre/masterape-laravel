<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Purchase') . ' #' . $purchase->uuid }}
        </h2>
    </x-slot>
    <div class="py-12 min-h-[60vh]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status') === 'purchase-created')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{__('Order created successfully!')}}
                </div>
            @endif
            <div class="glass-box w-3/4 flex flex-col m-auto">
                @php $totalPrice = 0 @endphp
                @foreach($purchase->books as $book)
                    @php $book = $book->toObject() @endphp
                    @php $totalPrice += $book->price @endphp
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex justify-between items-center w-full" >
                            <div class="flex justify-center items-center gap-3">
                                <img class="w-[100px]" src="{{asset($book->cover_path)}}" alt="Cover image of {{$book->title}}." />
                                <div class="text-xl text-gray-900 dark:text-gray-100 flex flex-col gap-6">
                                    <h5 class="font-semibold">{{$book->title}}</h5>
                                    <div class="text-sm">{{$book->resume}}</div>
                                    <div>$ {{$book->price}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="flex justify-between items-center">
                    <div class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Date: {{$purchase->purchase_dates->created_at}}
                    </div>
                    <div class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                        Total price: $ {{$totalPrice}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
