@php
    $variant = $variant ?? 'light';

    if ($variant === 'dark') {
        $sectionClass = 'bg-primary text-white';
        $textColor = 'text-white';
    } elseif ($variant === 'light-gray') {
        $sectionClass = 'bg-light text-dark';
        $textColor = 'text-white';
    } else {
        $sectionClass = 'bg-surface text-dark';
        $textColor = 'text-dark';
    }
@endphp

<section class="download-links {{ $sectionClass }} section-spacing">
    <div class="container-layout">
        <h2 class="h2 mb-10 text-center {{ $textColor }}">
            {{ $title }}
        </h2>

        <div class="download-buttons flex flex-col sm:flex-row sm:justify-center sm:gap-8 gap-4">
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
