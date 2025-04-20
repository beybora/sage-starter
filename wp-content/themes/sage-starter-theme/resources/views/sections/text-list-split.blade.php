@php
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

<section class="text-list-split section-spacing {{ $sectionClass }}">
    <div class="container-layout">
        <div class="flex flex-col md:flex-row gap-10">

            {{-- Left Column --}}
            <div class="md:w-1/2 lg:w-2/5">
                @if (!empty($title))
                    <h2 class="h2 {{ $textColor }}">{{ $title }}</h2>
                @endif
                @if (!empty($subtitle))
                    <p class="mt-4 text-base leading-relaxed {{ $mutedColor }}">{{ $subtitle }}</p>
                @endif
            </div>

            {{-- Right Column --}}
            @if (!empty($cards))
                <div class="md:w-1/2 lg:w-3/5 space-y-6">
                    @foreach ($cards as $card)
                        <div class="border-l-3 border-primary pl-4">
                            @if (!empty($card['title']))
                                <h3 class="h4 {{ $textColor }}">{{ $card['title'] }}</h3>
                            @endif
                            @if (!empty($card['description']))
                                <p class="mt-1 text-base leading-relaxed {{ $mutedColor }}">
                                    {{ $card['description'] }}
                                </p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</section>
