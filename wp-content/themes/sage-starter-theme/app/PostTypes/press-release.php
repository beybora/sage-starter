<?php
register_post_type('press_release', [
    'labels' => [
        'name' => 'Press Releases',
        'singular_name' => 'Press Release',
        'add_new_item' => 'Add New Press Release',
        'edit_item' => 'Edit Press Release',
        'new_item' => 'New Press Release',
        'view_item' => 'View Press Release',
        'search_items' => 'Search Press Releases',
    ],
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-media-document',
    'supports' => ['title', 'thumbnail'],
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'show_in_nav_menus'  => true,
    'rewrite' => [
        'slug' => 'press-release',
        'with_front' => true
    ],
]);
