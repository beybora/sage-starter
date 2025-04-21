@extends('layouts.app')

@section('content')
    <section class="bg-white section-spacing">
        <div class="container-layout">

            {{-- Page Headline --}}
            <h1 class="h2 mb-10 text-center">Unsere Vorstandsmitglieder</h1>

            @php
                $terms = get_terms([
                    'taxonomy' => 'function',
                    'hide_empty' => false,
                ]);
            @endphp

            @foreach ($terms as $term)
                {{-- Term Section --}}
                <section class="mb-16">
                    <h2 class="h4 mb-6">{{ $term->name }}</h2>

                    @php
                        $query = new WP_Query([
                            'post_type' => 'board_member',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'function',
                                    'field' => 'term_id',
                                    'terms' => $term->term_id,
                                ],
                            ],
                        ]);
                    @endphp

                    @if ($query->have_posts())
                        <ul class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            @while ($query->have_posts())
                                @php($query->the_post())
                                <li class="bg-surface p-4 border shadow-sm text-center">
                                    <h3 class="h5 mb-1">{{ get_field('board_member_name') }}</h3>
                                    <p class="above-title text-muted">
                                        {{ get_field('board_member_position') }}
                                    </p>
                                </li>
                            @endwhile
                            @php(wp_reset_postdata())
                        </ul>
                    @else
                        <p class="paragraph text-muted">
                            Noch keine Vorstandsmitglieder in der Position {{ $term->name }}.
                        </p>
                    @endif
                </section>
            @endforeach

        </div>
    </section>
@endsection
