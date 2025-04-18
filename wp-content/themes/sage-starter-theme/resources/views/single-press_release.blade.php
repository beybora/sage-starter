@extends('layouts.app')

@section('content')
    <section class="bg-white py-20">
        <div class="container max-w-5xl mx-auto px-6">
            {{-- Titel (ACF oder Fallback) --}}
            <h1 class="text-3xl font-bold mb-4">
                {{ get_field('press_title') ?: get_the_title() }}
            </h1>

            {{-- Untertitel --}}
            @if ($subtitle = get_field('press_subtitle'))
                <p class="text-lg text-gray-600 mb-6">{{ $subtitle }}</p>
            @endif

            {{-- Beitragsbild --}}
            @if (has_post_thumbnail())
                <div class="mb-6">
                    {!! get_the_post_thumbnail(null, 'large', ['class' => 'rounded-lg w-full']) !!}
                </div>
            @endif

            {{-- Textfeld (ACF WYSIWYG) --}}
            @if ($text = get_field('press_text'))
                <div class="prose max-w-none">
                    {!! $text !!}
                </div>
            @else
                {{-- Fallback: normalen Content anzeigen --}}
                <div class="prose max-w-none">
                    {!! nl2br(get_the_content()) !!}
                </div>
            @endif
        </div>
    </section>
@endsection
