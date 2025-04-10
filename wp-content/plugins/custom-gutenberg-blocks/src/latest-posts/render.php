<?php

$attributes = $attributes ?? [];

$headline = $attributes['headline'] ?? '';
$subheadline = $attributes['subheadline'] ?? '';

// Fetch latest 3 posts
$latest_posts = get_posts([
    'numberposts' => 3,
    'post_status' => 'publish',
]);

echo \Roots\view('sections.latest-posts', compact(
    'headline',
    'subheadline',
    'latest_posts'
))->render();
