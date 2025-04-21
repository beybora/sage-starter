@php
    function build_menu_tree($items, $parent_id = 0)
    {
        $branch = [];
        foreach ($items as $item) {
            if ((int) $item->menu_item_parent === $parent_id) {
                $children = build_menu_tree($items, $item->ID);
                if ($children) {
                    $item->children = $children;
                }
                $branch[] = $item;
            }
        }
        return $branch;
    }

    $menu_tree = build_menu_tree($menu_items);
@endphp

<ul class="flex gap-5 items-center">
    @foreach ($menu_tree as $item)
        <li class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
            <a href="{{ $item->url }}"
                class="nav-link text-white no-underline hover:underline hover:text-accent transition">
                {{ $item->title }}
            </a>

            {{-- Dropdown-Menü --}}
            @if (!empty($item->children))
                <ul x-show="open" x-transition:enter="transition ease-out duration-200"
                    x-transition:leave="transition ease-in duration-150"
                    class="absolute top-full left-0 mt-2 bg-white text-black shadow-lg z-50 min-w-[200px]">
                    @foreach ($item->children as $child)
                        <li>
                            <a href="{{ $child->url }}"
                                class="block px-4 py-2 no-underline hover:underline hover:bg-gray-100 transition">
                                {{ $child->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
</ul>
