@php
    $headline = $headline ?? '';
    $subline = $subline ?? '';
    $variant = $variant ?? 'light';

    if ($variant === 'dark') {
        $sectionClass = 'bg-primary text-white';
        $textColor = 'text-white';
        $mutedColor = 'text-white';
    } elseif ($variant === 'light-gray') {
        $sectionClass = 'bg-light text-dark';
        $textColor = 'text-dark';
        $mutedColor = 'text-dark';
    } else {
        $sectionClass = 'bg-surface text-dark';
        $textColor = 'text-dark';
        $mutedColor = 'text-dark';
    }
@endphp

<section class="section-mission-statement {{ $sectionClass }} section-spacing">
    <div class="container-layout text-center max-w-3xl mx-auto">
        @if (!empty($headline))
            <h2 class="h3 text-3xl md:text-4xl font-semibold {{ $textColor }}">
                {{ $headline }}
            </h2>
        @endif

        @if (!empty($subline))
            <p class="subtitle mt-4 text-lg {{ $mutedColor }}">
                {{ $subline }}
            </p>
        @endif
    </div>
</section>
