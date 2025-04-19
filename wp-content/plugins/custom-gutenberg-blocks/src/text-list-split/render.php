<?php

$attributes = $attributes ?? [];
$title = $attributes['title'] ?? '';
$subtitle = $attributes['subtitle'] ?? '';
$cards = $attributes['cards'] ?? [];
$variant = $attributes['variant'] ?? 'light';

echo \Roots\view('sections.text-list-split', compact(
	'title',
	'subtitle',
	'cards',
	'variant'
))->render();
