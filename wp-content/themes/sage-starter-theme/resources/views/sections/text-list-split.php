@php
$title = $attributes['title'] ?? '';
$subtitle = $attributes['subtitle'] ?? '';
$cards = $attributes['cards'] ?? [];
@endphp

<section class="text-icon-split py-20">
  <div class="container max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    {{-- Flex Container --}}
    <div class="flex flex-col md:flex-row gap-10">
      {{-- Left Column --}}
      <div class="md:w-1/2 lg:w-2/5">
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
            <img src="{{ $image }}" alt="{{ $cardTitle }}"
              class="w-12 h-12 object-contain" />
          </div>
          @endif

          <div class="flex-grow">
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
    {{-- End Flex Container --}}
  </div>
</section>