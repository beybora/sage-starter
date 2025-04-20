@php
    $title = $title ?? 'This is the Hero Title';
    $description = $description ?? 'This is the hero description text.';
    $imageUrl = $imageUrl ?? '';
    $buttonText = $buttonText ?? 'Register';
    $buttonUrl = $buttonUrl ?? '#';
    $variant = $variant ?? 'light';

    $hasImage = !empty($imageUrl);

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
        $mutedColor = 'text-dark';
    }
@endphp

<section class="hero {{ $sectionClass }} hero-spacing">
    <div class="container-layout">
        <div class="grid {{ $hasImage ? 'grid-cols-1 md:grid-cols-2 items-center gap-15' : '' }}">

            {{-- Image --}}
            @if ($hasImage)
                <div class="flex justify-center">
                    <img src="{{ $imageUrl }}" alt="{{ $title }}" class="w-full max-w-md h-auto object-cover" />
                </div>
            @endif

            {{-- Text Content --}}
            <div class="{{ $hasImage ? 'text-center md:text-left' : 'text-center max-w-2xl mx-auto' }}">
                <h1 class="h1 sm:text-5xl md:text-6xl {{ $textColor }} font-semibold">
                    {{ $title }}
                </h1>
                <p class="mt-4 sm:mt-6 paragraph text-base sm:text-lg {{ $mutedColor }}">
                    {{ $description }}
                </p>

                @if (!empty($buttonText))
                    <div class="mt-6">
                        <x-button :href="$buttonUrl" variant="primary" size="lg">
                            {{ $buttonText }}
                        </x-button>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
