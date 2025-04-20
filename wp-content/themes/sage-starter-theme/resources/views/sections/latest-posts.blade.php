@php
    $variant = $variant ?? 'light';

    $sectionClass = $variant === 'dark' ? 'bg-primary text-white' : 'bg-surface text-dark';
@endphp

<section class="latest-posts {{ $sectionClass }} section-spacing">
    <div class="container-layout">

        {{-- Headline & Subheadline --}}
        <div class="mb-10 text-center">
            @if (!empty($headline))
                <h2 class="h2 mb-2 {{ $variant === 'dark' ? 'text-white' : 'text-dark' }}">{{ $headline }}</h2>
            @endif

            @if (!empty($subheadline))
                <p class="subtitle {{ $variant === 'dark' ? 'text-white' : 'text-dark' }}">{{ $subheadline }}</p>
            @endif
        </div>

        {{-- Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            @forelse ($latest_posts as $post)
                @include('components.post-card', [
                    'post' => $post,
                    'variant' => $variant,
                ])
            @empty
                <p class="col-span-3 text-muted">{{ __('No posts found.', 'textdomain') }}</p>
            @endforelse
        </div>

    </div>
</section>
