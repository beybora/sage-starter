@php
    $title = $title ?? 'This is the Hero Title';
    $description = $description ?? 'This is the hero description text.';
    $imageUrl = $imageUrl ?? '';
    $buttonText = $buttonText ?? 'Register';
    $buttonUrl = $buttonUrl ?? '#';
@endphp

<section class="bg-gray-50 py-20">
    <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        {{-- Textbereich --}}
        <div class="space-y-6">
            <h1 class="h1 text-gray-900">{{ $title }}</h1>
            <p class="paragraph">{{ $description }}</p>

            @if (!empty($buttonText))
                <a href="{{ $buttonUrl }}"
                    class="button-text inline-block bg-primary bg-blue-300 text-white px-6 py-3 rounded-md hover:bg-blue-600 transition">
                    {{ $buttonText }}
                </a>
            @endif
        </div>

        {{-- Bild --}}
        <div class="flex justify-center">
            @if (!empty($imageUrl))
                <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-[300px] h-[250px] object-cover rounded-md" />
            @else
                <div
                    class="w-[300px] h-[250px] bg-gray-300 rounded-md flex items-center justify-center text-gray-500 text-sm">
                    Bild-Platzhalter
                </div>
            @endif
        </div>

    </div>
</section>
