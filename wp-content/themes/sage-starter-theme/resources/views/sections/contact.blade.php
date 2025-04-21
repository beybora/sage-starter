@php
    $variant = $variant ?? 'dark';

    if ($variant === 'dark') {
        $sectionClass = 'bg-primary text-white';
        $textColor = 'text-white';
        $mutedColor = 'text-muted';
    } elseif ($variant === 'light-gray') {
        $sectionClass = 'bg-light text-dark';
        $textColor = 'text-dark';
        $mutedColor = 'text-dark';
    } else {
        $sectionClass = 'bg-surface text-dark';
        $textColor = 'text-dark';
        $mutedColor = 'text-muted';
    }

    // Map-Handling
    $isEmbedCode = str_contains($mapEmbed, '<iframe');
    $finalMap = $isEmbedCode
        ? $mapEmbed
        : ($mapEmbed !== ''
            ? '<iframe src="' .
                e($mapEmbed) .
                '" width="100%" height="300" style="border:0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            : null);
@endphp

<section class="section-spacing {{ $sectionClass }}">
    <div class="container-layout grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8 items-center">

        {{-- Info --}}
        <div>
            @if ($title)
                <h2 class="h2 mb-4 {{ $textColor }}">{{ $title }}</h2>
            @endif

            @if ($description)
                <p class="paragraph mb-6 {{ $textColor }}">{{ $description }}</p>
            @endif

            <div class="bg-white text-black p-6 space-y-2 rounded text-base leading-relaxed">
                @if ($address)
                    <p>{{ $address }}</p>
                @endif

                @if ($email)
                    <p>
                        <a href="mailto:{{ $email }}"
                            class="text-dark hover:text-primary no-underline transition-colors duration-200">
                            {{ $email }}
                        </a>
                    </p>
                @endif

                @if ($phone)
                    <p>
                        <a href="tel:{{ preg_replace('/\s+/', '', $phone) }}"
                            class="text-dark hover:text-primary no-underline transition-colors duration-200">
                            {{ $phone }}
                        </a>
                    </p>
                @endif
            </div>
        </div>

        {{-- Map --}}
        @if ($finalMap)
            <div class="w-full">
                {!! $finalMap !!}
            </div>
        @else
            <div class="w-full bg-gray-200 text-gray-600 flex items-center justify-center aspect-[4/3] text-sm">
                {{ __('Keine Karte verfügbar', 'textdomain') }}
            </div>
        @endif


    </div>
</section>
