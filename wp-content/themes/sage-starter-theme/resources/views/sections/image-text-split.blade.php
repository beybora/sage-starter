<section class="image-text-split bg-surface section-spacing">
    <div class="container-layout">
        <div class="flex flex-col md:flex-row gap-10 items-center">

            {{-- Image Left --}}
            <div class="flex justify-center md:justify-start md:w-1/2">
                @if (!empty($imageUrl))
                    <img src="{{ esc_url($imageUrl) }}" alt="{{ $headline }}"
                        class="w-full max-w-md h-auto aspect-video object-cover rounded-xl shadow border" />
                @else
                    <div
                        class="w-full max-w-md h-[250px] bg-dark rounded-lg flex items-center justify-center text-muted text-sm border">
                        {{ __('No Image Provided', 'custom-gutenberg-blocks') }}
                    </div>
                @endif
            </div>

            {{-- Text Right --}}
            <div class="space-y-6 text-center md:text-left md:w-1/2">
                @if (!empty($headline))
                    <h2 class="h2 md:text-4xl">
                        {{ $headline }}
                    </h2>
                @endif

                @if (!empty($description))
                    <p class="paragraph text-lg">
                        {{ $description }}
                    </p>
                @endif

                @if (!empty($ctaText) && !empty($ctaUrl))
                    <div class="pt-4">
                        <x-button :href="$ctaUrl" variant="secondary" size="md">
                            {{ $ctaText }}
                        </x-button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
