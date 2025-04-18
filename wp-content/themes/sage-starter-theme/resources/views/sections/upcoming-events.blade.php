<section class="bg-surface section-spacing">
    <div class="container-layout">

        {{-- Headline --}}
        @if ($headline)
            <h2 class="h2 mb-2">{{ $headline }}</h2>
        @endif

        {{-- Subheadline --}}
        @if ($subheadline)
            <p class="text-lg leading-relaxed text-muted mb-8">
                {{ $subheadline }}
            </p>
        @endif

        {{-- Event Grid --}}
        @if ($events->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach ($events as $event)
                    <x-upcoming-event-card :event="$event" />
                @endforeach
            </div>
        @else
            <p class="text-base leading-relaxed text-muted">
                Aktuell sind keine Veranstaltungen geplant.
            </p>
        @endif

    </div>
</section>
