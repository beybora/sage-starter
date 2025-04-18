<section class="posts-archive section-spacing bg-surface">
    <div class="container-layout">

        {{-- Headline --}}
        @if (!empty($headline))
            <h2 class="h2 text-center mb-6">{{ $headline }}</h2>
        @endif

        {{-- Subheadline --}}
        @if (!empty($subheadline))
            <p class="subtitle text-center mb-10">{{ $subheadline }}</p>
        @endif

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <p class="col-span-3 text-muted text-center">
                    {{ __('No blog posts found.', 'textdomain') }}
                </p>
            @endforelse
        </div>

    </div>
</section>
