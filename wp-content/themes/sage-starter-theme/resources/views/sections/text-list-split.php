@php
$title = $attributes['title'] ?? '';
$subtitle = $attributes['subtitle'] ?? '';
$cards = $attributes['cards'] ?? [];
@endphp

<section class="text-list-split section-spacing bg-surface">
  <div class="container-layout">

    {{-- Flex Container --}}
    <div class="flex flex-col md:flex-row gap-10">

      {{-- Left Column --}}
      <div class="md:w-1/2 lg:w-2/5">
        @if (!empty($title))
        <h2 class="h2">{{ $title }}</h2>
        @endif

        @if (!empty($subtitle))
        <p class="mt-4 text-base leading-relaxed text-muted">
          {{ $subtitle }}
        </p>
        @endif
      </div>
      {{-- End Left Column --}}

      {{-- Right Column --}}
      @if (!empty($cards))
      <div class="md:w-1/2 lg:w-3/5 space-y-6">
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
            <img src="{{ $image }}" alt="{{ $cardTitle }}" class="w-12 h-12 object-contain" />
          </div>
          @endif

          {{-- Card Content --}}
          <div class="flex-grow">
            @if (!empty($cardTitle))
            <h3 class="h5">{{ $cardTitle }}</h3>
            @endif

            @if (!empty($cardText))
            <p class="mt-1 text-base leading-relaxed text-muted">
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
    {{-- End Flex Container --}}

  </div>
</section>