@props([
    'href' => '#',
    'variant' => 'primary', // primary, secondary, ghost, etc.
    'size' => 'md', // sm, md, lg
])

@php
    $base =
        'inline-block font-semibold rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';
    $variants = [
        'primary' => 'bg-primary text-white hover:bg-primary-dark',
        'secondary' => 'bg-red-100 text-red-800 hover:bg-red-200',
        'ghost' => 'bg-transparent text-red-700 hover:text-primary',
    ];
    $sizes = [
        'sm' => 'px-3 py-1.5 text-sm',
        'md' => 'px-4 py-2 text-base',
        'lg' => 'px-6 py-3 text-lg',
    ];
@endphp

<a href="{{ $href }}"
    class="{{ $base }} {{ $variants[$variant] ?? $variants['primary'] }} {{ $sizes[$size] ?? $sizes['md'] }}">
    {{ $slot }}
</a>
