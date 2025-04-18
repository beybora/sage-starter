@php
    $title = get_the_title($post) ?: __('Untitled Post', 'textdomain');
    $permalink = get_permalink($post);
    $hasThumbnail = has_post_thumbnail($post);
@endphp

<article class="bg-surface p-6 rounded-lg shadow-sm hover:shadow-md transition flex flex-col h-full">

    {{-- Featured Image --}}
    @if ($hasThumbnail)
        {!! get_the_post_thumbnail($post, 'medium', [
            'class' => 'w-full h-52 object-cover rounded mb-4',
            'alt' => esc_attr($title),
        ]) !!}
    @else
        <div class="w-full h-52 bg-muted flex items-center justify-center text-sm text-muted rounded mb-4">
            {{ __('No image', 'textdomain') }}
        </div>
    @endif

    {{-- Content --}}
    <div class="flex flex-col justify-between flex-grow">
        <h3 class="h5 mb-4">{{ $title }}</h3>

        <a href="{{ $permalink }}"
            class="text-sm font-medium text-primary inline-flex items-center gap-1 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
            aria-label="{{ __('Read more about', 'textdomain') }} {{ $title }}">
            {{ __('Read more', 'textdomain') }} →
        </a>
    </div>

</article>
