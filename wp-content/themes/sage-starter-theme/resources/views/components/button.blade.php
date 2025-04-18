@props([
    'href' => '#',
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $base =
        'inline-block font-semibold rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 button-text';

    $variants = [
        'primary' => 'bg-primary text-white hover:bg-primary/90',
        'secondary' => 'bg-surface text-primary border border-primary hover:bg-primary hover:text-white',
        'ghost' => 'bg-transparent text-primary hover:underline',
    ];

    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];
@endphp

<a href="{{ $href }}"
    class="text-dark {{ $base }} {{ $variants[$variant] ?? $variants['primary'] }} {{ $sizes[$size] ?? $sizes['md'] }}">
    {{ $slot }}
</a>
