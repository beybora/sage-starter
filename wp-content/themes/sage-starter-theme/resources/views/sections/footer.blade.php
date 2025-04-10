@php
    $siteName = get_bloginfo('name');

    $locations = get_nav_menu_locations();
    $menu_id = $locations['footer_navigation'] ?? null;
    $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
@endphp

<footer class="bg-gray-900 text-gray-300 py-12">
    <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between gap-10 items-start">

            {{-- Menü-Links --}}
            <div>
                <h4 class="h6 text-white mb-4">Links</h4>
                <ul class="space-y-2">
                    @foreach ($menu_items as $item)
                        <li>
                            <a href="{{ $item->url }}" class="link text-white hover:text-white">
                                {{ $item->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Logo + Copyright --}}
            <div class="space-y-4 text-left md:text-right">
                <div class="text-xl font-bold text-white">{{ $siteName }}</div>
                <p class="text-white">
                    © {{ date('Y') }} {{ $siteName }}<br>
                    All rights reserved
                </p>
            </div>

        </div>
    </div>
</footer>
