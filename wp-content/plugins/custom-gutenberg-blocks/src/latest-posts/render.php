<?php
$attributes    = $attributes ?? [];
$headline      = $attributes['headline'] ?? '';
$subheadline   = $attributes['subheadline'] ?? '';
$post_type     = $attributes['postType'] ?? 'post';
$variant       = $attributes['variant'] ?? 'light';
$buttonLabel   = $attributes['buttonLabel'] ?? '';

$latest_posts = get_posts([
	'post_type'      => $post_type,
	'posts_per_page' => 3,
	'post_status'    => 'publish',
]);

$archive_link = $post_type === 'post' ? '/blog' : get_post_type_archive_link($post_type);

echo \Roots\view('sections.latest-posts', compact(
	'headline',
	'subheadline',
	'post_type',
	'variant',
	'buttonLabel',
	'archive_link',
	'latest_posts'
))->render();
