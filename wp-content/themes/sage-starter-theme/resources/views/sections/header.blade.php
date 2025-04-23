@php
    $siteName = get_bloginfo('name');

    $locations = get_nav_menu_locations();
    $menu_id = $locations['primary_navigation'] ?? null;
    $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];

    $ctaText = get_theme_mod('header_button_text', __('Join us', 'sage'));
    $ctaUrl = get_theme_mod('header_button_url', '#');
@endphp

{{-- ❗ x-data wandert ins Layout-Wrapper (nicht hier!) --}}
<header class="bg-primary shadow-sm">
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

                <x-button href="{{ $ctaUrl }}" variant="secondary" size="sm">
                    {{ $ctaText }}
                </x-button>
            </div>

            {{-- Burger für Mobile --}}
            <button @click="open = !open" class="md:hidden text-white focus:outline-none">
                <span class="block w-6 h-0.5 bg-white mb-1"></span>
                <span class="block w-6 h-0.5 bg-white mb-1"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
            </button>
        </div>
    </div>
</header>

{{-- Mobile-Menü wird separat eingebunden – außerhalb vom header, aber innerhalb von x-data! --}}
@include('partials.mobile-menu', [
    'menu_items' => $menu_items,
    'ctaText' => $ctaText,
    'ctaUrl' => $ctaUrl,
])
