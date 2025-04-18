<?php

$attributes    = $attributes ?? [];
$headline      = $attributes['headline'] ?? '';
$subheadline   = $attributes['subheadline'] ?? '';
$post_type     = $attributes['postType'] ?? 'post';

$latest_posts = get_posts([
	'post_type'      => $post_type,
	'posts_per_page' => 3,
	'post_status'    => 'publish',
]);

echo \Roots\view('sections.latest-posts', compact(
	'headline',
	'subheadline',
	'post_type',
	'latest_posts'
))->render();
