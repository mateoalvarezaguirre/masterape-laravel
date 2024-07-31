<x-app-layout>
    @push('css')
        @vite('resources/css/books/bookDetail.css')
    @endpush
    <section class="book_details_container overflow-hidden">
        <img class="absolute top-0 left-0 w-[100vw] max-h-[450px] hero_image" src="{{asset($book->hero_path)}}" alt="Image of {{$book->title}}.">
        <div class="max-w-6xl book_detail mb-40">
            <img class="cover_image" src="{{asset($book->cover_path)}}" alt="Imagen de la portada de {{$book->title}}.">
            <div class="glass-box book_detail_text dark:text-gray-200 ">
                <div class="book_title">
                    <h1>{{$book->title}}</h1>
                </div>
                <div class="description">{{$book->full_description}}</div>
                <div class="author">
                    Autor: <span class="author_name">{{$book->author['full_name']}}</span>
                </div>
                <div class="actions">
                    <div class="price">$ {{$book->price}}</div>
                    @if($cart = session('cart') && in_array($book->id, session('cart')->getList()))
                        <form action="{{ route('cart.remove', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-secondary-button class="ms-3" type="submit">
                                {{ __('Remove from cart') }}
                            </x-secondary-button>
                        </form>
                    @else
                        <form action="{{ route('cart.add', $book->id) }}" method="POST">
                            @csrf
                            <x-primary-button class="ms-3" type="submit">
                                {{ __('Add to cart') }}
                            </x-primary-button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
