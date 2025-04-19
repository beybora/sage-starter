<?php

$attributes = $attributes ?? [];

$title    = $attributes['title'] ?? '';
$subtitle = $attributes['subtitle'] ?? '';
$variant  = $attributes['variant'] ?? 'light';
$cards    = $attributes['cards'] ?? [];

echo \Roots\view('sections.cards-section', compact(
	'title',
	'subtitle',
	'variant',
	'cards'
))->render();
