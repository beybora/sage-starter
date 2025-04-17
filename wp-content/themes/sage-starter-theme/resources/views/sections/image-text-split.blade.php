<section class="image-text-split py-20 bg-gray-200">
    <div class="container max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-10 items-center">

            {{-- Left Side: Image --}}
            <div class="flex justify-center md:justify-start md:w-1/2">
                @if (!empty($imageUrl))
                    <img src="{{ esc_url($imageUrl) }}" alt="{{ $headline }}"
                        class="w-full max-w-md h-auto aspect-video object-cover rounded-xl shadow border" />
                @else
                    <div
                        class="w-full max-w-md h-[250px] bg-gray-200 rounded-lg flex items-center justify-center text-gray-500 text-sm border">
                        {{ __('No Image Provided', 'custom-gutenberg-blocks') }}
                    </div>
                @endif
            </div>

            {{-- Right Side: Text Content --}}
            <div class="space-y-6 text-center md:text-left md:w-1/2">
                @if (!empty($headline))
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                        {{ $headline }}
                    </h2>
                @endif

                @if (!empty($description))
                    <p class="text-lg text-gray-700 leading-relaxed">
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
