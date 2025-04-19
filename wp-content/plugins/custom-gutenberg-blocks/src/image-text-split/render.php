<?php

$attributes = $attributes ?? [];

$headline     = $attributes['headline'] ?? '';
$description  = $attributes['description'] ?? '';
$imageUrl     = $attributes['imageUrl'] ?? '';
$ctaText      = $attributes['ctaText'] ?? '';
$ctaUrl       = $attributes['ctaUrl'] ?? '';
$variant      = $attributes['variant'] ?? 'dark'; // <- HIER FEHLTE ES

echo \Roots\view('sections.image-text-split', compact(
	'headline',
	'description',
	'imageUrl',
	'ctaText',
	'ctaUrl',
	'variant' // <- UND HIER MUSS ES MIT REIN
))->render();
