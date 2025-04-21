@php
    $mapEmbed = $mapEmbed ?? '';
    $isEmbedCode = str_contains($mapEmbed, '<iframe');

    $finalMap = $isEmbedCode
        ? $mapEmbed
        : ($mapEmbed !== ''
            ? '<iframe src="' .
                e($mapEmbed) .
                '" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            : null);
@endphp

<section class="section-spacing bg-{{ $variant }}">
    <div class="container-layout grid grid-cols-1 md:grid-cols-2 gap-8 items-center">

        {{-- Map --}}
        @if ($finalMap)
            <div class="w-full aspect-[4/3]">
                {!! $finalMap !!}
            </div>
        @else
            <div class="w-full bg-gray-200 text-gray-600 flex items-center justify-center aspect-[4/3] text-sm">
                {{ __('Keine Karte verfügbar', 'textdomain') }}
            </div>
        @endif

        {{-- Info --}}
        <div>
            @if ($title)
                <h2 class="h2 mb-4 text-white">{{ $title }}</h2>
            @endif

            @if ($description)
                <p class="paragraph text-white mb-6">{{ $description }}</p>
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
    </div>
</section>
