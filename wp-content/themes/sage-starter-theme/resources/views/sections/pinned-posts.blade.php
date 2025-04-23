@php
    $variant = $variant ?? 'light';

    if ($variant === 'dark') {
        $sectionClass = 'bg-primary text-white';
        $textColor = 'text-white';
        $pinColor = 'bg-white';
    } elseif ($variant === 'light-gray') {
        $sectionClass = 'bg-light text-dark';
        $textColor = 'text-dark';
        $pinColor = 'bg-primary';
    } else {
        $sectionClass = 'bg-surface text-dark';
        $textColor = 'text-dark';
        $pinColor = 'bg-primary';
    }
@endphp

<section class="pinned-posts {{ $sectionClass }} section-spacing">
    <div class="container-layout">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($posts as $post)
                <div class="relative border rounded-xl p-6 shadow-sm bg-white text-dark">
                    <span
                        class="absolute -top-3 -right-3 w-8 h-8 rounded-full {{ $pinColor }} shadow-md flex items-center justify-center text-xs font-bold rotate-12">
                        <svg fill="#000000" height="200px" width="200px" version="1.1" id="Capa_1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 297 297" xml:space="preserve" transform="rotate(18)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M234.067,85.715C234.067,38.451,195.682,0,148.5,0S62.933,38.451,62.933,85.715c0,34.744,20.755,64.703,50.486,78.15 l24.91,124.794c0.968,4.851,5.225,8.342,10.171,8.342c4.944,0,9.203-3.492,10.171-8.341l24.911-124.795 C213.313,150.417,234.067,120.459,234.067,85.715z M148.5,233.643l-12.605-63.149c4.115,0.611,8.323,0.938,12.605,0.938 s8.49-0.326,12.605-0.938L148.5,233.643z M148.5,150.686c-35.744,0-64.823-29.146-64.823-64.972s29.079-64.972,64.823-64.972 s64.823,29.146,64.823,64.972S184.244,150.686,148.5,150.686z">
                                </path>
                            </g>
                        </svg>
                    </span>
                    <h3 class="h4 mb-2">{{ get_the_title($post) }}</h3>
                    <p class="paragraph">{!! get_the_excerpt($post) !!}</p>
                    <a href="{{ get_permalink($post) }}" class="link mt-4 inline-flex items-center gap-1">
                        Mehr erfahren
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
