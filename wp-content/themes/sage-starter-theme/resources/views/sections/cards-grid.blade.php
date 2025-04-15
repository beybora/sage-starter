@php
    $title = $attributes['title'] ?? '';
    $subtitle = $attributes['subtitle'] ?? '';
    $cards = $attributes['cards'] ?? [];
@endphp

<section class="py-20">
    <div class="container max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Grid --}}
        <div class="grid md:grid-cols-2 gap-8">
            {{-- Left Column --}}
            <div class="lg:w-3/4">
                @if (!empty($title))
                    <h2 class="h2 dark:text-white">
                        {{ $title }}
                    </h2>
                @endif

                @if (!empty($subtitle))
                    <p class="mt-4 dark:text-neutral-400">
                        {{ $subtitle }}
                    </p>
                @endif
            </div>
            {{-- End Left Column --}}

            {{-- Right Column --}}
            @if (!empty($cards))
                <div class="space-y-6">
                    @foreach ($cards as $card)
                        @php
                            $image = $card['imageUrl'] ?? null;
                            $cardTitle = $card['title'] ?? '';
                            $cardText = $card['description'] ?? '';
                        @endphp

                        <div class="flex items-start gap-4">
                            {{-- Icon/Image --}}
                            @if ($image)
                                <div class="flex-shrink-0">
                                    <img src="{{ $image }}" alt="{{ $cardTitle }}"
                                        class="w-12 h-12 object-contain" />
                                </div>
                            @endif

                            <div>
                                {{-- Card Title --}}
                                @if (!empty($cardTitle))
                                    <h3 class="h5 dark:text-white">{{ $cardTitle }}</h3>
                                @endif

                                {{-- Card Text --}}
                                @if (!empty($cardText))
                                    <p class="mt-1 dark:text-neutral-400">
                                        {{ $cardText }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            {{-- End Right Column --}}
        </div>
        {{-- End Grid --}}
    </div>
</section>
