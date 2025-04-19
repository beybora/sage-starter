@php
    $title = $title ?? '';
    $subtitle = $subtitle ?? '';
    $cards = $cards ?? [];
    $variant = $variant ?? 'light';

    $sectionClass = $variant === 'dark' ? 'bg-primary text-white' : 'bg-surface text-dark';
    $textColor = $variant === 'dark' ? 'text-white' : 'text-dark';
    $mutedColor = $variant === 'dark' ? 'text-muted' : 'text-muted';
@endphp

<section class="cards-section {{ $sectionClass }} section-spacing">
    <div class="container-layout text-center">

        @if (!empty($title))
            <h2 class="h2 text-3xl md:text-4xl font-semibold {{ $textColor }}">
                {{ $title }}
            </h2>
        @endif

        @if (!empty($subtitle))
            <p class="paragraph mt-4 text-lg {{ $mutedColor }} max-w-2xl mx-auto">
                {{ $subtitle }}
            </p>
        @endif

        @if (!empty($cards))
            <div class="mt-10 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($cards as $card)
                    @php
                        $icon = $card['icon'] ?? '';
                        $headline = $card['headline'] ?? '';
                        $text = $card['text'] ?? '';
                    @endphp

                    <div class="flex flex-col items-center text-center px-4">
                        @if (!empty($icon))
                            <img src="{{ esc_url($icon) }}" alt="{{ $headline }}"
                                class="w-16 h-16 object-contain mb-4" />
                        @endif

                        @if (!empty($headline))
                            <h3 class="text-xl font-semibold {{ $textColor }}">
                                {{ $headline }}
                            </h3>
                        @endif

                        @if (!empty($text))
                            <p class="mt-2 text-base {{ $mutedColor }}">
                                {{ $text }}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>
