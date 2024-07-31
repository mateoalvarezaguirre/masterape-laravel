<x-app-layout>
    @push('css')
        @vite('resources/css/about.css')
    @endpush
        <section id="about" class="py-12">
            <div class="text-gray-900 dark:text-[--custom-light]">
                <h1>{{__('About')}} <br>
                    <span class="font-sacramento text-[--custom-rose]" style="font-size: 5.5rem;">
                        {{__('Master Ape')}}
                    </span>
                </h1>
                <p>
                    Welcome to <strong>Master Ape</strong>, the online bookstore that takes you to a world of adventures and knowledge! At Master Ape, we believe that reading is one of the best ways to expand your horizons and enrich your life. That’s why we are committed to offering you the best selection of books online and an easy and satisfying shopping experience.
                </p>
                <p>
                    In this store, you will find a wide selection of books of all genres and topics, from the most popular bestsellers to the most innovative and original literary works. Whether you are looking for an exciting novel to read over a weekend, a business book to improve your professional skills, or a children's book to share with your kids, at Master Ape we have it all!
                </p>
                <p>
                    We take pride in offering an exceptional online shopping experience. We offer free shipping on all orders, easy returns, and exceptional customer service. Moreover, our team of book experts is here to help you find the perfect books for you, whether you are looking for something specific or need recommendations based on your tastes and preferences.
                </p>
                <p>
                    Here you will find everything you need to nurture your passion for reading and enrich your life with new ideas and knowledge. Thank you for visiting us and we hope you enjoy browsing through our selection of books!
                </p>
            </div>
            <div class="desktop">
                <div id="about_animation"></div>
            </div>
        </section>
        <script>
            window.addEventListener('load', () => {

                const bannerAnimationBox = document.getElementById('about_animation');

                bannerAnimationBox.classList.add('active');

                activateAnimation('./images/animations/about_animation.json', 'about_animation');
            });
        </script>
</x-app-layout>
