@php
    $siteName = get_bloginfo('name');

    $locations = get_nav_menu_locations();
    $menu_id = $locations['primary_navigation'] ?? null;
    $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
@endphp

<header class="bg-primary shadow-sm" x-data="{ open: false }">
    <div class="header-layout">
        <div class="flex items-center justify-between h-20">

            {{-- Logo --}}
            <a href="{{ home_url('/') }}"
                class="text-xl font-bold text-white no-underline hover:opacity-90 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                aria-label="{{ __('Homepage', 'sage') }}">
                {{ $siteName }}
            </a>

            {{-- Desktop Navigation --}}
            <div class="hidden md:flex items-center gap-5">
                @include('partials.main-navigation', ['menu_items' => $menu_items])

                <x-button href="#" variant="secondary" size="lg">
                    Join us
                </x-button>
            </div>

            {{-- Hamburger Button for Mobile --}}
            <button @click="open = !open" class="md:hidden text-white focus:outline-none">
                <span class="block w-6 h-0.5 bg-white mb-1"></span>
                <span class="block w-6 h-0.5 bg-white mb-1"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    @include('partials.mobile-menu', ['menu_items' => $menu_items])
</header>
