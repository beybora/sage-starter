@extends('layouts.app')

@section('content')
    <section class="bg-white py-10">
        <div class="container max-w-5xl mx-auto px-6">
            <h1 class="text-3xl font-bold mb-8 text-center">Unsere Vertreter:innen</h1>

            @php
                // Hole alle Bezirke
                $terms = get_terms([
                    'taxonomy' => 'bezirk',
                    'hide_empty' => false,
                ]);
            @endphp

            @foreach ($terms as $term)
                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-4">{{ $term->name }}</h2>

                    @php
                        $query = new WP_Query([
                            'post_type' => 'representative',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'bezirk',
                                    'field' => 'term_id',
                                    'terms' => $term->term_id,
                                ],
                            ],
                        ]);
                    @endphp

                    @if ($query->have_posts())
                        <ul class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            @while ($query->have_posts())
                                @php($query->the_post())
                                <li class="p-4 border rounded-lg text-center shadow-sm bg-white">
                                    <h3 class="text-lg font-bold mb-1">{{ get_field('representative_name') }} </h3>
                                    <p> {{ get_field('representative_position') }} </p>
                                </li>
                            @endwhile
                            @php(wp_reset_postdata())
                        </ul>
                    @else
                        <p class="text-gray-500">Noch keine Vertreter:innen in {{ $term->name }}.</p>
                    @endif
                </section>
            @endforeach
        </div>
    </section>
@endsection
