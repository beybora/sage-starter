<?php

$attributes = $attributes ?? [];

$headline = $attributes['headline'] ?? '';
$subline = $attributes['subline'] ?? '';
$variant = $attributes['variant'] ?? 'light';

// View aufrufen
echo \Roots\view('sections.mission-statement', compact(
	'headline',
	'subline',
	'variant'
))->render();
