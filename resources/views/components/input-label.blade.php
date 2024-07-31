@props(['value'])

<label {!! $attributes->merge(['class' => 'block font-semibold text-xl text-gray-300 dark:text-gray-700']) !!}>
    {{ $value ?? $slot }}
</label>
