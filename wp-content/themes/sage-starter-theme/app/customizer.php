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

    $wp_customize->add_setting('header_button_url', [
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('header_button_url', [
        'label'   => __('Button URL', 'sage'),
        'section' => 'header_cta',
        'type'    => 'url',
    ]);

    $wp_customize->add_section('vorstand_section', [
        'title' => __('Vorstand', 'sage'),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('vorstand_headline', [
        'default' => __('Unsere Vorstandsmitglieder', 'sage'),
        'type' => 'theme_mod',
    ]);

    $wp_customize->add_control('vorstand_headline', [
        'label' => __('Headline auf der Vorstand-Seite', 'sage'),
        'section' => 'vorstand_section',
        'type' => 'text',
    ]);

    $wp_customize->add_section('district_representatives_section', [
        'title' => __('District Representatives', 'sage'),
        'priority' => 31,
    ]);

    // Headline
    $wp_customize->add_setting('district_representatives_headline', [
        'default' => __('Unsere Vertreter:innen', 'sage'),
        'type' => 'theme_mod',
    ]);

    $wp_customize->add_control('district_representatives_headline', [
        'label' => __('Headline auf der Vertreter:innen-Seite', 'sage'),
        'section' => 'district_representatives_section',
        'type' => 'text',
    ]);
});
