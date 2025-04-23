<?php
$attributes = $attributes ?? [];
$pinnedPost1 = $attributes['pinnedPost1'] ?? 0;
$pinnedPost2 = $attributes['pinnedPost2'] ?? 0;
$variant = $attributes['variant'] ?? 'light';

$posts = get_posts([
	'post_type' => 'any',
	'post__in' => [$pinnedPost1, $pinnedPost2],
	'orderby' => 'post__in',
]);

echo \Roots\view('sections.pinned-posts', compact('posts', 'variant'))->render();
