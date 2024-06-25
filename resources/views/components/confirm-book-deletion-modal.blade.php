@props(['bookId', 'show' => false])

<x-modal name="confirm-book-deletion-{{ $bookId }}"
         :show="$show"
         focusable
         position="center"
>
    <form method="post" action="{{ route('books.destroy', $bookId) }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Are you sure you want to delete this book?') }}
        </h2>
        <div class="mt-6 flex justify-center">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Delete book') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
