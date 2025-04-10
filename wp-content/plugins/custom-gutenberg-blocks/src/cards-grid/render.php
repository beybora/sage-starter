<?php

/**
 * Server-side rendering for Cards Grid block.
 * Passes all attributes and content to Blade view.
 */

echo \Roots\view('sections.cards-grid', [
  'attributes' => $attributes ?? [],
  'content'    => $content ?? '',
])->render();
