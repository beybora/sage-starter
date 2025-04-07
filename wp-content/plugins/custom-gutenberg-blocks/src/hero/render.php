<?php

$attributes = $attributes ?? [];

$title = $attributes['title'] ?? '';
$description = $attributes['description'] ?? '';

echo \Roots\view('sections.hero', compact('title', 'description'))->render();
