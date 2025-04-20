<?php

$attributes = $attributes ?? [];

$title    = $attributes['title'] ?? '';
$variant  = $attributes['variant'] ?? 'light';
$links    = $attributes['links'] ?? [];

$sectionClass = '';

if ($variant === 'dark') {
	$sectionClass = 'bg-primary text-white';
} elseif ($variant === 'light-gray') {
	$sectionClass = 'bg-light text-dark';
} else {
	$sectionClass = 'bg-surface text-dark';
}

$textColor = $variant === 'dark' || $variant === 'light-gray' ? 'text-white' : 'text-dark';

echo \Roots\view('sections.button-group', compact(
	'title',
	'sectionClass',
	'textColor',
	'links'
))->render();
