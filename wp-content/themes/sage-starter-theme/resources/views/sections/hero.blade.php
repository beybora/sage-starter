@php
    $title = $title ?? 'This is the Hero Title';
    $description = $description ?? 'This is the hero description text.';
    $imageUrl = $imageUrl ?? '';
    $buttonText = $buttonText ?? 'Register';
    $buttonUrl = $buttonUrl ?? '#';
@endphp

<section class="hero bg-surface section-spacing">
    <div class="container-layout">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-15 items-center">

            {{-- Image --}}
            <div class="flex justify-center">
                @if (!empty($imageUrl))
                    <img src="{{ $imageUrl }}" alt="{{ $title }}"
                        class="w-full max-w-md h-auto object-cover rounded-md" />
                @else
                    <div
                        class="w-full max-w-md h-64 bg-dark rounded-md flex items-center justify-center text-muted text-sm">
                        Bild-Platzhalter
                    </div>
                @endif
            </div>

            {{-- Text Content --}}
            <div class="text-left">
                <h1 class="h1 sm:text-5xl md:text-6xl text-primary font-semibold">
                    {{ $title }}
                </h1>
                <p class="mt-4 sm:mt-6 paragraph text-muted text-base sm:text-lg">
                    {{ $description }}
                </p>

                @if (!empty($buttonText))
                    <a href="{{ $buttonUrl }}"
                        class="mt-6 inline-block bg-primary text-white px-6 py-3 rounded-md hover:opacity-90 transition font-medium">
                        {{ $buttonText }}
                    </a>
                @endif
            </div>

        </div>
    </div>
</section>
