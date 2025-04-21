@php
    $location = $location ?? 'footer_navigation';

    $locations = get_nav_menu_locations();
    $menu_id = $locations[$location] ?? null;
    $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
@endphp

@if (!empty($menu_items))
    <div>
        <ul class="space-y-2">
            @foreach ($menu_items as $item)
                <li>
                    <a href="{{ $item->url }}" class="nav-link text-white hover:text-primary transition">
                        {{ $item->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
