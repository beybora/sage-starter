@php
  $title = $attributes['title'] ?? '';
  $subtitle = $attributes['subtitle'] ?? '';
  $cards = $attributes['cards'] ?? [];
@endphp

<section class="py-20 bg-gray-50">
  <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 text-center">

    {{-- Section Heading --}}
    @if (!empty($title))
      <h2 class="h2 mb-2">{{ $title }}</h2>
    @endif

    @if (!empty($subtitle))
      <p class="subtitle mb-10">{{ $subtitle }}</p>
    @endif

    {{-- Cards --}}
    @if (!empty($cards))
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach ($cards as $card)
          @php
            $image = $card['imageUrl'] ?? null;
            $cardTitle = $card['title'] ?? '';
            $cardText = $card['description'] ?? '';
          @endphp

          <div class="bg-white p-6 rounded-lg shadow-sm text-center">

            {{-- Icon/Image --}}
            @if ($image)
              <div class="mb-4 flex justify-center">
                <img src="{{ $image }}" alt="{{ $cardTitle }}" class="w-12 h-12 object-contain" />
              </div>
            @endif

            {{-- Card Title --}}
            @if (!empty($cardTitle))
              <h3 class="h4 mb-2">{{ $cardTitle }}</h3>
            @endif

            {{-- Card Text --}}
            @if (!empty($cardText))
              <p class="paragraph text-sm text-gray-600">
                {{ $cardText }}
              </p>
            @endif
          </div>
        @endforeach
      </div>
    @endif

  </div>
</section>
