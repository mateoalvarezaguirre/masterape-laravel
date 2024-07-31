<x-app-layout>
    @push('css')
        @vite('resources/css/home.css')
    @endpush
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:text-gray-200">
            <section class="welcome_bg">
                <div class="welcome_container" style="overflow: visible;">
                    <div class="welcome_text">
                        <h1><strong>We are <br><span class="welcome_text_span">Master Ape</span></strong></h1>
                        <h5>¡Explore a world of knowledge and literary adventure in our online bookstore!</h5>
                        <a href="#contact">
                            <div class="button welcome_btn">See more</div>
                        </a>
                    </div>
                    <div id="home_header_animation"></div>
                </div>
            </section>
            <section class="books_box">
                @php
                    $bookSettings = new \Src\Book\Domain\ValueObject\BookListSetting(
                        true,
                        6,
                        false
                    );
                @endphp
                <x-book-list :bookListSetting="$bookSettings"/>
            </section>
            <section id="contact">
                @if(session('status') !== 'message-sent')
                <div class="flex justify-between items-center">
                    <div class="w-1/2 desktop">
                        <div id="home_contact_animation"></div>
                    </div>
                    <div class="w-2/5">
                        <h5 class="font-bold text-3xl text-[--custom-rose]">{{__('Contact')}}</h5>
                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="my-3">
                                <label for="name" class="block font-semibold text-xl dark:text-gray-200" >{{__('Your name')}}</label>
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full text-gray-900 dark:text-gray-200" required />
                                <x-input-error :messages="$errors->saveContact->get('name')" class="mt-2" />
                            </div>
                            <div class="my-3">
                                <label for="email" class="block font-semibold text-xl dark:text-gray-200" >{{__('Your email')}}</label>
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full text-gray-900 dark:text-gray-200" required />
                                <x-input-error :messages="$errors->saveContact->get('email')" class="mt-2" />
                            </div>
                            <div class="my-3">
                                <label for="message" class="block font-semibold text-xl dark:text-gray-200" >{{__('Your message')}}</label>
                                <x-textarea-input id="message" name="message" class="mt-1 block w-full text-gray-900 dark:text-gray-200" required />
                                <x-input-error :messages="$errors->saveContact->get('message')" class="mt-2" />
                            </div>
                            <div class="flex w-full justify-end">
                                <x-primary-button type="submit" class="mt-3">
                                    {{__('Send')}}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="flex justify-between items-center" id="contact-success">
                    <div class="w-1/2 desktop">
                        <img src="{{asset('/images/message-received.svg')}}" alt="Message received illustration.">
                    </div>
                    <div class="w-2/5">
                        <h5 class="font-bold text-3xl text-[--custom-rose]">{{__('We have received your message!')}}</h5>
                        <h6 class="text-lg text-gray-900 dark:text-[--custom-light]">{{__('We will contact you soon!')}}</h6>
                    </div>
                </div>
                @endif
            </section>
        </div>
    </div>
    <script>
        window.addEventListener('load', () => {

            const bannerAnimationBox = document.getElementById('home_header_animation');

            bannerAnimationBox.classList.add('active');

            activateAnimation('./images/animations/home_animation.json', 'home_header_animation', false, 1.2);
            activateAnimation('./images/animations/contact_animation.json', 'home_contact_animation', true, 0.5);
        });
    </script>
</x-app-layout>
