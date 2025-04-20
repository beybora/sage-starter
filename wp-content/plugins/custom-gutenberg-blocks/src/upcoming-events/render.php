<?php

if (!function_exists('get_field')) {
	return;
}

$headline     = $attributes['headline'] ?? 'Upcoming Events';
$subheadline  = $attributes['subheadline'] ?? 'Check out our upcoming events!';
$variant      = $attributes['variant'] ?? 'light';

$rawEvents = get_posts([
	'post_type'      => 'upcoming_event',
	'posts_per_page' => 4,
	'orderby'        => 'meta_value',
	'meta_key'       => 'event_date',
	'order'          => 'ASC',
	'meta_query'     => [[
		'key'     => 'event_date',
		'value'   => date('dmY'),
		'compare' => '>=',
		'type'    => 'NUMERIC',
	]],
]);

$events = collect($rawEvents)->map(function ($event) {
	return (object) [
		'id'          => $event->ID,
		'title'       => get_field('event_title', $event->ID) ?: 'No Title Available',
		'date_raw'    => get_field('event_date', $event->ID),
		'description' => get_field('event_description', $event->ID),
		'location'    => get_field('event_location', $event->ID),
		'map'         => get_field('event_map', $event->ID),
		'time'        => get_the_time('g:i A', $event),
		'post'        => $event,
	];
});


echo \Roots\view('sections.upcoming-events', [
	'headline'    => $headline,
	'subheadline' => $subheadline,
	'events'      => $events,
	'variant'     => $variant,
])->render();
