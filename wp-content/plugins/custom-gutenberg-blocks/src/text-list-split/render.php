<?php

/**
 * Server-side rendering for Cards Grid block.
 * Passes all attributes and content to Blade view.
 */

echo \Roots\view('sections.text-list-split', [
	'attributes' => $attributes ?? [],
	'content'    => $content ?? '',
])->render();
