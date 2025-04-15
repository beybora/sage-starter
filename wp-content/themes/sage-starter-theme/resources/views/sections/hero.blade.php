@php
    $title = $title ?? 'This is the Hero Title';
    $description = $description ?? 'This is the hero description text.';
    $imageUrl = $imageUrl ?? '';
    $buttonText = $buttonText ?? 'Register';
    $buttonUrl = $buttonUrl ?? '#';
@endphp

<section class="hero bg-neutral-900 py-20">
    <div class="container max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-20 items-center">
            {{-- Text Content --}}
            <div class="text-left md:text-left">
                <h1 class="font-semibold text-[#ff0] h1 sm:text-5xl md:text-6xl">{{ $title }}</h1>
                <p class="mt-4 sm:mt-6 text-neutral-400 text-base sm:text-lg">{{ $description }}</p>

                @if (!empty($buttonText))
                    <a href="{{ $buttonUrl }}"
                        class="mt-6 inline-block bg-[#ff0] text-neutral-900 px-6 py-3 rounded-md hover:bg-yellow-400 transition font-medium">
                        {{ $buttonText }}
                    </a>
                @endif
            </div>

            {{-- Image --}}
            <div class="flex justify-center">
                @if (!empty($imageUrl))
                    <img src="{{ $imageUrl }}" alt="{{ $title }}"
                        class="w-full max-w-md h-auto object-cover rounded-md" />
                @else
                    <div
                        class="w-full max-w-md h-64 bg-neutral-800 rounded-md flex items-center justify-center text-neutral-500 text-sm">
                        Bild-Platzhalter
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
