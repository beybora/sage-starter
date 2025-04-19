@php
    $locations = get_nav_menu_locations();
    $menu_id = $locations['primary_navigation'] ?? null;
    $menu = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
    $current_url = url()->current();
@endphp

<header class="bg-primary shadow-sm">
    <div class="container-layout">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ home_url('/') }}"
                class="text-xl font-bold text-white no-underline hover:opacity-90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                aria-label="{{ __('Homepage', 'sage') }}">
                {{ $siteName }}
            </a>

            {{-- Navigation --}}
            @include('partials.main-navigation')

            {{-- Hamburger Menu for Mobile --}}

        </div>
    </div>
</header>
