<?php

add_action('customize_register', function ($wp_customize) {
    // Section
    $wp_customize->add_section('header_cta', [
        'title'    => __('Header Button', 'sage'),
        'priority' => 30,
    ]);

    // Text Setting
    $wp_customize->add_setting('header_button_text', [
        'default'           => __('Join us', 'sage'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('header_button_text', [
        'label'   => __('Button Text', 'sage'),
        'section' => 'header_cta',
        'type'    => 'text',
    ]);

    // URL Setting
    $wp_customize->add_setting('header_button_url', [
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('header_button_url', [
        'label'   => __('Button URL', 'sage'),
        'section' => 'header_cta',
        'type'    => 'url',
    ]);
});
