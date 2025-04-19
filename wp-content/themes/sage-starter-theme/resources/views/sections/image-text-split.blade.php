@php
    $variant = $variant ?? 'dark';

    // Dynamische Klassen basierend auf Variante
    $sectionClass = $variant === 'dark' ? 'bg-primary text-white' : 'bg-surface text-dark';
    $textColor = $variant === 'dark' ? 'text-white' : 'text-dark';
    $mutedColor = $variant === 'dark' ? 'text-muted' : 'text-muted';
    $buttonVariant = $variant === 'dark' ? 'secondary' : 'primray';
@endphp

<section class="image-text-split {{ $sectionClass }} section-spacing">
    <div class="container-layout">
        <div class="flex flex-col md:flex-row gap-10 items-center">

            {{-- Image Left --}}
            <div class="flex justify-center md:justify-start md:w-1/2">
                @if (!empty($imageUrl))
                    <img src="{{ esc_url($imageUrl) }}" alt="{{ $headline }}"
                        class="w-full max-w-md h-auto aspect-video object-cover shadow" />
                @else
                    <div
                        class="w-full max-w-md h-[250px] bg-dark flex items-center justify-center text-sm {{ $mutedColor }} border">
                        {{ __('No Image Provided', 'custom-gutenberg-blocks') }}
                    </div>
                @endif
            </div>

            {{-- Text Right --}}
            <div class="space-y-4 text-center md:text-left md:w-1/2">
                @if (!empty($headline))
                    <h2 class="h2 md:text-4xl {{ $textColor }}">
                        {{ $headline }}
                    </h2>
                @endif

                @if (!empty($description))
                    <p class="paragraph text-lg {{ $textColor }}">
                        {{ $description }}
                    </p>
                @endif

                @if (!empty($ctaText) && !empty($ctaUrl))
                    <div class="pt-2">
                        <x-button :href="$ctaUrl" :variant="$buttonVariant" size="lg">
                            {{ $ctaText }}
                        </x-button>
                    </div>
                @endif
            </div>

        </div>
    </div>
</section>
