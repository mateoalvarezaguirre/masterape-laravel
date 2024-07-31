<div class="book_box_container">
    @push('css')
        @vite('resources/css/books/bookList.css')
    @endpush
    @foreach($books as $book)
            <div class="book_box" :class="darkMode ? 'dark' : 'light'">
                <div class="book_image">
                    <img src="{{asset($book->cover_path)}}" alt="Cover image of {{$book->title}}.">
                </div>
                <div class="book_description">
                    <div class="book_title"><strong>{{$book->title}}</strong></div>
                    {{$book->resume}}
                    <div class="book_buttons">
                        <a href="{{route('books.detail', $book->id)}}">
                            <div class="show_more_btn">Show more</div>
                        </a>
                    </div>
                </div>
            </div>
    @endforeach
</div>
