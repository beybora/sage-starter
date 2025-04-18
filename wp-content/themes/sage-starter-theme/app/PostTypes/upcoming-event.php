<?php

register_post_type('upcoming_event', [
    'labels' => [
        'name' => 'Upcoming Events',
        'singular_name' => 'Upcoming Event',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'new_item' => 'New Event',
        'view_item' => 'View Event',
        'search_items' => 'Search Events',
    ],
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-calendar',
    'supports' => ['title'],
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_rest' => true,
    'show_in_nav_menus'  => true,
    'rewrite' => [
        'slug' => 'upcoming-event',
        'with_front' => true
    ],
]);
