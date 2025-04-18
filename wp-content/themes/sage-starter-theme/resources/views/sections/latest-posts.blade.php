<section class="latest-posts bg-surface section-spacing">
    <div class="container-layout">

        {{-- Headline & Subheadline --}}
        <div class="mb-10 text-center">
            @if (!empty($headline))
                <h2 class="h2 mb-2">{{ $headline }}</h2>
            @endif

            @if (!empty($subheadline))
                <p class="subtitle">{{ $subheadline }}</p>
            @endif
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            @forelse ($latest_posts as $post)
                <article class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition flex flex-col h-full">

                    {{-- Featured Image --}}
                    @if (has_post_thumbnail($post))
                        {!! get_the_post_thumbnail($post, 'medium', [
                            'class' => 'w-full h-52 object-cover rounded mb-4',
                            'alt' => esc_attr(get_the_title($post)),
                        ]) !!}
                    @else
                        <div
                            class="w-full h-52 bg-surface flex items-center justify-center text-sm text-muted rounded mb-4">
                            {{ __('No image', 'textdomain') }}
                        </div>
                    @endif

                    {{-- Post Content --}}
                    <div class="flex flex-col justify-between flex-grow">
                        <h3 class="h5 mb-4">
                            {{ get_the_title($post) ?: __('Untitled Post', 'textdomain') }}
                        </h3>

                        <a href="{{ get_permalink($post) }}"
                            class="text-sm font-medium text-primary inline-flex items-center gap-1 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                            aria-label="{{ __('Read more about', 'textdomain') }} {{ get_the_title($post) }}">
                            {{ __('Read more', 'textdomain') }} →
                        </a>
                    </div>

                </article>
            @empty
                <p class="col-span-3 text-muted">{{ __('No posts found.', 'textdomain') }}</p>
            @endforelse
        </div>

    </div>
</section>
