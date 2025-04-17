<?php

if (!function_exists('get_field')) {
	return;
}

$headline = $attributes['headline'] ?? '';
$subheadline = $attributes['subheadline'] ?? '';

$rawEvents = get_posts([
	'post_type' => 'upcoming-event',
	'posts_per_page' => 4,
	'orderby' => 'meta_value',
	'meta_key' => 'event_date',
	'order' => 'ASC',
	'meta_query' => [[
		'key' => 'event_date',
		'value' => date('Ymd'),
		'compare' => '>=',
		'type' => 'NUMERIC'
	]],
]);

$events = collect($rawEvents)->map(function ($event) {
	return (object) [
		'id' => $event->ID,
		'title' => get_field('event_title', $event->ID),
		'date_raw' => get_field('event_date', $event->ID),
		'description' => get_field('event_description', $event->ID),
		'location' => get_field('event_location', $event->ID),
		'map' => get_field('event_map', $event->ID),
		'time' => get_the_time('g:i A', $event),
		'post' => $event,
	];
});

echo \Roots\view('sections.upcoming-events', [
	'headline' => $headline,
	'subheadline' => $subheadline,
	'events' => $events,
])->render();
