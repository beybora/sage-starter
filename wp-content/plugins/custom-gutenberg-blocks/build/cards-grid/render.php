<?php

echo \Roots\view('sections.cards-grid', [
  'attributes' => $attributes ?? [],
  'content' => $content ?? '',
])->render();
