@php
    $siteName = get_bloginfo('name');

    $locations = get_nav_menu_locations();
    $menu_id = $locations['footer_navigation'] ?? null;
    $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
@endphp

{{-- Menü-Links --}}
<div>
    <ul class="space-y-2 flex flex-row gap-5">
        @foreach ($menu_items as $item)
            <li>
                <a href="{{ $item->url }}" class="nav-link hover:text-accent">
                    {{ $item->title }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
