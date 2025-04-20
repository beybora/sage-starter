@php
    $variant = $variant ?? 'light';
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

<section class="latest-posts {{ $sectionClass }} section-spacing">
    <div class="container-layout">

        {{-- Headline & Subheadline --}}
        <div class="mb-10 text-center">
            @if (!empty($headline))
                <h2 class="h2 mb-2 {{ $textColor }}">{{ $headline }}</h2>
            @endif

            @if (!empty($subheadline))
                <p class="subtitle {{ $mutedColor }}">{{ $subheadline }}</p>
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
