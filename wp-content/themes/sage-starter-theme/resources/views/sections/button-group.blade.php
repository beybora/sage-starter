<?php

$variant = $attributes['variant'] ?? 'light';
$sectionClass = '';

if ($variant === 'dark') {
    $sectionClass = 'bg-primary text-white';
} elseif ($variant === 'light-gray') {
    $sectionClass = 'bg-light text-dark';
} else {
    $sectionClass = 'bg-surface text-dark';
}

$textColor = $variant === 'dark' || $variant === 'light-gray' ? 'text-white' : 'text-dark';
?>

<section class="download-links {{ $sectionClass }} section-spacing">
    <div class="container-layout">
        <h2 class="h2 mb-10 text-center {{ $textColor }}">
            {{ $title }}
        </h2>

        <div class="download-buttons space-y-4 center">
            @foreach ($links as $link)
                <x-button href="{{ esc_url($link['url']) }}"
                    variant="{{ $variant === 'light' ? 'primary' : ($variant === 'dark' ? 'primary' : 'secondary') }}"
                    size="lg" download>
                    {{ esc_html($link['label']) }}
                </x-button>
            @endforeach
        </div>
    </div>
</section>
