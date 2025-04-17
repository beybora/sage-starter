<?php

$attributes = $attributes ?? [];

$headline     = $attributes['headline'] ?? '';
$description  = $attributes['description'] ?? '';
$imageUrl     = $attributes['imageUrl'] ?? '';
$ctaText      = $attributes['ctaText'] ?? '';
$ctaUrl       = $attributes['ctaUrl'] ?? '';

echo \Roots\view('sections.image-text-split', compact(
	'headline',
	'description',
	'imageUrl',
	'ctaText',
	'ctaUrl'
))->render();
