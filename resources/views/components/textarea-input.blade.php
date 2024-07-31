@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[--custom-rose] dark:focus:border-[--custom-rose] focus:ring-[--custom-rose] dark:focus:ring-[--custom-rose] rounded-md shadow-sm']) !!}>
{{$slot}}
</textarea>
