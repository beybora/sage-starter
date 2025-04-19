<?php

$attributes = $attributes ?? [];

$title       = $attributes['title'] ?? '';
$description = $attributes['description'] ?? '';
$imageUrl    = $attributes['imageUrl'] ?? '';
$buttonText  = $attributes['buttonText'] ?? '';
$buttonUrl   = $attributes['buttonUrl'] ?? '';
$variant     = $attributes['variant'] ?? 'light';

echo \Roots\view('sections.hero', compact(
	'title',
	'description',
	'imageUrl',
	'buttonText',
	'buttonUrl',
	'variant'
))->render();
