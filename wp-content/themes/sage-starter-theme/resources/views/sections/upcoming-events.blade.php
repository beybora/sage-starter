<section class="bg-gray-100 py-16">
    <div class="container max-w-5xl mx-auto px-6">
        @if ($headline)
            <h2 class="text-3xl font-bold mb-2">{{ $headline }}</h2>
        @endif

        @if ($subheadline)
            <p class="text-lg text-gray-700 mb-8">{{ $subheadline }}</p>
        @endif

        @if ($events->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach ($events as $event)
                    <x-upcoming-event-card :event="$event" />
                @endforeach
            </div>
        @else
            <p class="text-gray-500">Aktuell sind keine Veranstaltungen geplant.</p>
        @endif
    </div>
</section>
