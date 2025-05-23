@php
    $locations = get_nav_menu_locations();
    $menu_id = $locations['social_media_links'] ?? null;
    $menu = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
@endphp

{{-- Social Icons --}}
<div class="flex gap-5 items-center md:justify-end justify-center" style="gap: 1.25rem;">
    @foreach ($menu as $item)
        @php
            $title = strtolower($item->title);
        @endphp
        <a href="{{ $item->url }}" target="_blank" rel="noopener" class="text-gray-400 hover:text-white transition">
            @includeIf('partials.icons.' . $title)
            <span class="sr-only">{{ $item->title }}</span>
        </a>
    @endforeach
</div>
