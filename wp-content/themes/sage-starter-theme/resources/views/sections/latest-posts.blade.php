<section class="latest-posts py-20 bg-white">
    <div class="container max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Headline --}}
        @if (!empty($headline))
            <h2 class="h2 mb-2">{{ $headline }}</h2>
        @endif

        {{-- Subheadline --}}
        @if (!empty($subheadline))
            <p class="subtitle mb-10">{{ $subheadline }}</p>
        @endif

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            @forelse ($latest_posts as $post)
                <article class="bg-gray-50 p-6 rounded-lg shadow-sm hover:shadow-md transition flex flex-col h-full">

                    {{-- Image --}}
                    @if (has_post_thumbnail($post))
                        {!! get_the_post_thumbnail($post, 'medium', [
                            'class' => 'w-full h-52 object-cover rounded mb-4',
                            'alt' => esc_attr(get_the_title($post)),
                        ]) !!}
                    @else
                        <div
                            class="w-full h-52 bg-gray-200 flex items-center justify-center text-sm text-gray-500 rounded mb-4">
                            {{ __('No image', 'textdomain') }}
                        </div>
                    @endif

                    {{-- Content --}}
                    <div class="flex flex-col justify-between flex-grow">
                        <h3 class="h5 mb-4 text-gray-800">
                            {{ get_the_title($post) ?: __('Untitled Post', 'textdomain') }}
                        </h3>
                        <a href="{{ get_permalink($post) }}"
                            class="text-sm font-medium text-green-600 inline-flex items-center gap-1 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-green-500"
                            aria-label="{{ __('Read more about', 'textdomain') }} {{ get_the_title($post) }}">
                            {{ __('Read more', 'textdomain') }} →
                        </a>
                    </div>

                </article>
            @empty
                <p class="col-span-3 text-gray-500">{{ __('No posts found.', 'textdomain') }}</p>
            @endforelse
        </div>

    </div>
</section>
