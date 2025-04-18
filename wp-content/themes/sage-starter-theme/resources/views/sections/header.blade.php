@php
    $locations = get_nav_menu_locations();
    $menu_id = $locations['primary_navigation'] ?? null;
    $menu = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
    $current_url = url()->current();
@endphp

<header class="bg-white shadow-sm">
    <div class="container-layout">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ home_url('/') }}"
                class="text-xl font-bold text-primary no-underline hover:opacity-90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                aria-label="{{ __('Homepage', 'sage') }}">
                {{ $siteName }}
            </a>

            {{-- Navigation --}}
            <nav class="flex items-center gap-6" role="navigation" aria-label="{{ __('Main navigation', 'sage') }}">
                @foreach ($menu as $item)
                    <a href="{{ $item->url }}"
                        class="nav-link @if ($item->url === $current_url) font-semibold text-primary @endif"
                        @if ($item->url === $current_url) aria-current="page" @endif>
                        {{ $item->title }}
                    </a>
                @endforeach
            </nav>

        </div>
    </div>
</header>
