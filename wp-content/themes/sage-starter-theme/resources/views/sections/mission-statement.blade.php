@php
    $headline = $headline ?? '';
    $subline = $subline ?? '';
    $variant = $variant ?? 'light';

    $sectionClass = $variant === 'dark' ? 'bg-primary text-white' : 'bg-surface text-dark';
    $textColor = $variant === 'dark' ? 'text-white' : 'text-dark';
    $mutedColor = $variant === 'dark' ? 'text-muted' : 'text-muted';
@endphp

<section class="section-mission-statement {{ $sectionClass }} section-spacing">
    <div class="container-layout text-center max-w-3xl mx-auto">
        @if (!empty($headline))
            <h2 class="h2 text-3xl md:text-4xl font-semibold {{ $textColor }}">
                {{ $headline }}
            </h2>
        @endif

        @if (!empty($subline))
            <p class="paragraph mt-4 text-lg {{ $mutedColor }}">
                {{ $subline }}
            </p>
        @endif
    </div>
</section>
