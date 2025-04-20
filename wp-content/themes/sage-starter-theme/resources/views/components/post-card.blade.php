@php
    $title = get_the_title($post) ?: __('Untitled Post', 'textdomain');
    $permalink = get_permalink($post);
    $hasThumbnail = has_post_thumbnail($post);

    $variant = $variant ?? 'light';

    $bgColor = $variant === 'light' ? 'bg-dark text-white' : 'bg-white text-dark';
    $linkColor = $variant === 'light' ? 'text-white hover:underline' : 'text-primary hover:underline';
@endphp

<article class="{{ $bgColor }} shadow-sm hover:shadow-md transition p-6 flex flex-col h-full">

    {{-- Featured Image --}}
    @if ($hasThumbnail)
        {!! get_the_post_thumbnail($post, 'medium', [
            'class' => 'w-full h-52 object-cover mb-4',
            'alt' => esc_attr($title),
        ]) !!}
    @else
        <div class="w-full h-52 bg-surface flex items-center justify-center text-sm text-muted mb-4">
            {{ __('No image', 'textdomain') }}
        </div>
    @endif

    {{-- Content --}}
    <div class="flex flex-col justify-between flex-grow">
        <h3 class="h5 mb-4">{{ $title }}</h3>

        <a href="{{ $permalink }}"
            class="text-sm font-medium inline-flex items-center gap-1 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary {{ $linkColor }}"
            aria-label="{{ __('Read more about', 'textdomain') }} {{ $title }}">
            {{ __('Read more', 'textdomain') }} →
        </a>
    </div>
</article>
