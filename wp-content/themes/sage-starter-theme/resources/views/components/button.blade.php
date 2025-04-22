@props([
    'href' => '#',
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $base =
        'inline-flex items-center justify-center font-semibold transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 button-text';

    $variants = [
        'primary' => 'bg-primary text-white hover:bg-[#C2181A]',
        'secondary' => 'bg-white text-primary border border-primary hover:bg-primary hover:text-white',
        'ghost' => 'bg-transparent text-primary hover:underline',
    ];

    $sizes = [
        'sm' => 'h-10 min-w-[160px] px-3 py-1.5 text-sm',
        'md' => 'h-12 min-w-[180px] px-4 py-2 text-base',
        'lg' => 'h-14 min-w-[200px] px-6 py-3 text-lg',
    ];
@endphp

<div>
    <a href="{{ $href }}"
        class="{{ $base }} {{ $variants[$variant] ?? $variants['primary'] }} {{ $sizes[$size] ?? $sizes['md'] }}">
        {{ $slot }}
    </a>
</div>
