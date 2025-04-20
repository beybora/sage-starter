<?php

register_post_type('board_member', [
    'labels' => [
        'name'               => 'Board Members',
        'singular_name'      => 'Board Member',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Board Member',
        'edit_item'          => 'Edit Board Member',
        'new_item'           => 'New Board Member',
        'view_item'          => 'View Board Member',
        'search_items'       => 'Search Board Members',
        'not_found'          => 'No Board Members found',
        'not_found_in_trash' => 'No Board Members found in Trash',
    ],
    'public'            => true,
    'has_archive'       => true,
    'menu_icon'         => 'dashicons-businessperson',
    'show_ui'           => true,
    'show_in_menu'      => true,
    'show_in_rest'      => true,
    'supports'          => ['title', 'thumbnail'],
    'rewrite' => [
        'slug' => 'board-members',
        'with_front' => true,
    ],
]);

// Taxonomy: Function
register_taxonomy('function', 'board_member', [
    'labels' => [
        'name'          => 'Functions',
        'singular_name' => 'Function',
        'add_new_item'  => 'Add New Function',
        'all_items'     => 'All Functions',
        'edit_item'     => 'Edit Function',
        'view_item'     => 'View Function',
    ],
    'public'            => true,
    'hierarchical'      => false,
    'show_ui'           => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
]);
