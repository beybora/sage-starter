<?php

$attributes = $attributes ?? [];

$title       = $attributes['title'] ?? '';
$description = $attributes['description'] ?? '';
$address     = $attributes['address'] ?? '';
$email       = $attributes['email'] ?? '';
$phone       = $attributes['phone'] ?? '';
$mapEmbed    = $attributes['mapEmbed'] ?? '';
$variant     = $attributes['variant'] ?? 'light';

echo \Roots\view('sections.contact', compact(
	'title',
	'description',
	'address',
	'email',
	'phone',
	'mapEmbed',
	'variant'
))->render();
