<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <div class="relative">
            <x-bi-cart class="dark:text-[--custom-light] cursor-pointer"/>
            @if($cart)
                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-[--custom-rose] border-2 border-white rounded-full -top-4 -end-4 dark:border-gray-900">
                    {{$cart->count()}}
                </div>
            @endif
        </div>

    </x-slot>

    <x-slot name="content">
        <div class="p-4">
            <h3 class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                @if($cart) Your cart @else Your cart is empty! @endif
            </h3>
            @isset($books)
                <div class="mt-4">
                    @foreach($books as $book)
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex justify-between items-center w-full" >
                                <div class="flex justify-center items-center gap-3">
                                    <img class="w-[30px]" src="{{asset($book->cover_path)}}" alt="Cover image of {{$book->title}}." />
                                    <div class="text-xs text-gray-900 dark:text-gray-100">
                                        <h5 class="font-semibold">{{$book->title}}</h5>
                                        <div>$ {{$book->price}}</div>
                                    </div>
                                </div>
                                <form action="{{ route('cart.remove', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <x-bi-trash-fill class="dark:text-[--custom-light] cursor-pointer" />
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="mt-2">
                    <a href="{{route('cart.checkout')}}" class="text-sm font-semibold text-[--custom-rose] dark:text-[--custom-light]">Checkout</a>
                </div>
            @endisset
        </div>
    </x-slot>
</x-dropdown>
