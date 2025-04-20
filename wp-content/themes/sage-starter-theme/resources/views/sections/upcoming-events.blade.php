@php
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
        $mutedColor = 'text-muted';
    }
@endphp

<section class="section-upcoming-events {{ $sectionClass }} section-spacing-sm">
    <div class="container-layout">

        @if ($headline)
            <h2 class="h2 mb-2 {{ $textColor }}">
                {{ $headline }}
            </h2>
        @endif

        @if ($subheadline)
            <p class="text-lg leading-relaxed {{ $mutedColor }} mb-8">
                {{ $subheadline }}
            </p>
        @endif

        @if ($events->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach ($events as $event)
                    <x-upcoming-event-card :event="$event" :variant="$variant" />
                @endforeach
            </div>
        @else
            <p class="text-base leading-relaxed {{ $mutedColor }}">
                Aktuell sind keine Veranstaltungen geplant.
            </p>
        @endif

    </div>
</section>
