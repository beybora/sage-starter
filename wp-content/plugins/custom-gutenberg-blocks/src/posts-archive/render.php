<?php

$attributes = $attributes ?? [];

$headline = $attributes['headline'] ?? '';
$subheadline = $attributes['subheadline'] ?? '';

$posts = get_posts([
    'numberposts' => -1,
    'post_status' => 'publish',
]);

echo \Roots\view('sections.posts-archive', compact(
    'headline',
    'subheadline',
    'posts'
))->render();
