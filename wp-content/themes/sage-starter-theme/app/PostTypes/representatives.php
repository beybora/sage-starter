<?php

add_action('init', function () {
    // Custom Post Type: representative
    register_post_type('representative', [
        'labels' => [
            'name'               => 'Representatives',
            'singular_name'      => 'Representative',
            'add_new'            => 'Add New',
            'add_new_item'       => 'Add New Representative',
            'edit_item'          => 'Edit Representative',
            'new_item'           => 'New Representative',
            'view_item'          => 'View Representative',
            'search_items'       => 'Search Representatives',
            'not_found'          => 'No Representatives found',
            'not_found_in_trash' => 'No Representatives found in Trash',
        ],
        'public'            => true,
        'has_archive'       => true,
        'menu_icon'         => 'dashicons-groups',
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_rest'      => true,
        'supports'          => ['title'],
        'rewrite' => [
            'slug' => 'representatives',
            'with_front' => true,
        ],
    ]);

    // Taxonomy: bezirk
    register_taxonomy('bezirk', 'representative', [
        'labels' => [
            'name'          => 'Bezirke',
            'singular_name' => 'Bezirk',
            'add_new_item'  => 'Neuen Bezirk hinzufügen',
            'all_items'     => 'Alle Bezirke',
            'edit_item'     => 'Bezirk bearbeiten',
            'view_item'     => 'Bezirk ansehen',
        ],
        'public'            => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
    ]);
});
