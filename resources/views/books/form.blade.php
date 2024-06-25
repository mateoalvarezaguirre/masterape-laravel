<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ (isset($book) ? 'Update ' : 'Create ' ) . __('Book') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status') === 'book-updated')
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    {{ __('The blog has been updated successfully!') }}
                </div>
            @endif
            @if (\Session::has('error'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 5000)"
                    class="p-4 mb-4 text-sm text-gray-200 rounded-lg bg-red-800 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                        {!! \Session::get('error') !!}
                </div>
            @endif
            <form method="POST"
                  action="@if(isset($book)) {{route('books.update', $book->id)}} @else {{route('books.create')}} @endif"
                  enctype="multipart/form-data"
                  class="rounded-xl shadow-md bg-neutral-900 dark:bg-custom-light overflow-hidden sm:rounded-lg p-6"
            >
                @csrf
                @if(isset($book))
                    @method('patch')
                @else
                    @method('post')
                @endif
                <div class="my-3">
                    <div class="flex justify-between items-center">
                        <div class="w-1/2">
                            <x-input-label for="book_title" :value="__('Title')" />
                            <x-text-input id="book_title" name="title" type="text" class="mt-1 block w-3/4" required
                                          value="{{isset($book) ? old('title', $book->title) : old('title') }}"/>
                            <x-input-error :messages="$errors->createBook->get('title')" class="mt-2" />
                        </div>
                        <div class="w-1/2">
                            <x-input-label for="author" :value="__('Author')" />
                            <select id="author" name="author_id" class="mt-1 w-3/4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[--custom-rose] focus:border-[--custom-rose] block p-2.5 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                                <option disabled>Choose an author</option>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}"
                                        @isset($book) @if($book->author['id'] === $author->id) selected @endif @endisset
                                    >{{$author->first_name . ' ' . $author->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="my-3 pr-3">
                    <x-input-label for="book_resume" :value="__('Resume')" />
                    <x-textarea-input id="book_resume" name="resume" type="text" class="mt-1 block w-1/2" required>
                        {{ isset($book) ? old('resume', $book->resume) : old('resume') }}
                    </x-textarea-input>
                    <x-input-error :messages="$errors->createBook->get('resume')" class="mt-2" />
                </div>
                <div class="my-3">
                    <x-input-label for="book_full_description" :value="__('Full Description')" />
                    <x-textarea-input id="book_full_description" name="full_description" type="text" class="mt-1 block w-full" required>
                        {{ isset($book) ? old('full_description', $book->full_description) : old('full_description') }}
                    </x-textarea-input>
                    <x-input-error :messages="$errors->createBook->get('full_description')" class="mt-2" />
                </div>
                <div class="my-3 mb-6 flex justify-between gap-6">
                    <div class="w-3/4">
                        <x-input-label for="book_cover" :value="__('Cover image')" />
                        <x-file-input id="book_cover" name="cover" class="mt-1 block w-3/4"
                                      value="{{ old('cover') }}"/>
                        <x-input-error :messages="$errors->createBook->get('cover')" class="mt-2" />
                        @isset($book)
                            <img src="{{asset($book->cover_path)}}" alt="{{$book->title}}" class="mt-2 w-2/5"/>
                        @endisset
                    </div>
                    <div class="w-3/4">
                        <x-input-label for="book_hero" :value="__('Hero image')" />
                        <x-file-input id="book_hero" name="hero" class="mt-1 block w-3/4" value="{{old('hero')}}"/>
                        <x-input-error :messages="$errors->createBook->get('hero')" class="mt-2" />
                        @isset($book)
                            <img src="{{asset($book->hero_path)}}" alt="{{$book->title}}" class="mt-2 w-full"/>
                        @endisset
                    </div>
                </div>
                <div class="my-3 flex gap-6 w-1/2 pr-3">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="1"
                               class="sr-only peer" name="is_featured"
                        @if(isset($book))
                            @checked($book->is_featured)
                            @endif>
                        <span class="font-semibold text-xl text-gray-300 dark:text-gray-700 leading-tight mr-3">{{__('Featured')}}</span>
                        <div
                            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-0 peer-focus:ring-[--custom-rose] dark:peer-focus:ring-[--custom-rose] rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-[--custom-rose]"></div>
                    </label>
                    <div class="w-full flex gap-3 items-center">
                        <x-input-label for="book_price" :value="__('Price')" />
                        <x-text-input id="book_price" name="price" class="mt-1 w-full" required
                                      value="{{ isset($book) ? old('price', $book->price) : old('price') }}"/>
                        <x-input-error :messages="$errors->createBook->get('price')" class="mt-2" />
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <x-primary-button class="ms-3">
                        {{ isset($book) ? __('Update') : __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
