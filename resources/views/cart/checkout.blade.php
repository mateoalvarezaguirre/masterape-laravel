<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-cover bg-center min-h-[70vh]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status') === 'purchase-creation-failed')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="p-4 mb-4 text-sm text-yellow-500 rounded-lg bg-yellow-500 dark:bg-gray-800 dark:text-yellow-400" role="alert">
                    {{__('We could not create your order, please try again.')}}
                </div>
            @endif
            <div class="glass-box w-1/2 flex flex-col m-auto">
                @php $totalPrice = 0 @endphp
                @foreach($books as $book)
                    @php $totalPrice += $book->price @endphp
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex justify-between items-center w-full" >
                            <div class="flex justify-center items-center gap-3">
                                <img class="w-[100px]" src="{{asset($book->cover_path)}}" alt="Cover image of {{$book->title}}." />
                                <div class="text-xl text-gray-900 dark:text-gray-200 flex flex-col gap-6">
                                    <h5 class="font-semibold">{{$book->title}}</h5>
                                    <div>$ {{$book->price}}</div>
                                </div>
                            </div>
                            <form action="{{ route('cart.remove', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <x-bi-trash-fill class="text-[--custom-light] cursor-pointer" />
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                @if(!empty($books))
                    <div class="flex justify-between items-center">
                        <div class="text-xl font-semibold text-gray-900 dark:text-gray-200">
                            Total price: $ {{$totalPrice}}
                        </div>
                        <form action="{{ route('purchase.create') }}" method="POST">
                            @csrf
                            <x-primary-button class="ms-3 self-end" type="submit">
                                {{ __('Buy') }}
                            </x-primary-button>
                        </form>
                    </div>
                @else
                    <div class="flex justify-center items-center gap-6 flex-wrap">
                        <div class="text-xl font-semibold text-gray-100 text-center">
                                {{ __("Ups! Your cart is empty, add some books here!") }}
                        </div>
                        <a href="{{route('home')}}">
                            <x-primary-button>
                                {{ __('Go to home') }}
                            </x-primary-button>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
