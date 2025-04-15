@php
    $headline = $headline ?? 'Featured Posts';
    $subheadline = $subheadline ?? 'Discover our most popular articles';

    // Determine grid columns based on post count
    $count = count($latest_posts ?? []);
    $gridColumns = 'grid-cols-1';
    if ($count === 2) {
        $gridColumns = 'grid-cols-1 lg:grid-cols-2';
    } elseif ($count >= 3) {
        $gridColumns = 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3';
    }
@endphp

<section class="posts-section bg-white py-7 sm:py-10 lg:py-12">
    <div class="container max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-8">
            @if (!empty($headline))
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ $headline }}</h2>
            @endif

            @if (!empty($subheadline))
                <p class="mt-3 text-lg text-gray-600">{{ $subheadline }}</p>
            @endif
        </div>

        @if (!empty($latest_posts) && count($latest_posts) > 0)
            <div
                class="grid {{ $gridColumns }} items-center gap-6 border-neutral-700 divide-y lg:divide-y-0 lg:divide-x divide-neutral-700 rounded-xl">
                @foreach ($latest_posts as $post)
                    @include('components.post-card-black', [
                        'title' => get_the_title($post) ?: __('Untitled Post', 'textdomain'),
                        'subtitle' => get_the_category_list(', ', '', $post->ID) ?: '',
                        'description' => wp_trim_words(get_the_excerpt($post), 20, '...'),
                        'label' => __('Read more', 'textdomain'),
                        'slug' => get_permalink($post),
                        'icon' => null,
                    ])
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500">{{ __('No featured posts available.', 'textdomain') }}</p>
            </div>
        @endif
    </div>
</section>
