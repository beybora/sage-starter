@extends('layouts.app')

@section('content')
    <section class="bg-white section-spacing">
        <div class="container-layout">

            {{-- Headline (ACF-Feld oder Fallback auf Titel) --}}
            <h1 class="h1 mb-4">
                {{ get_field('press_title') ?: get_the_title() }}
            </h1>

            {{-- Subheadline --}}
            @if ($subtitle = get_field('press_subtitle'))
                <p class="paragraph mb-6 text-muted">
                    {{ $subtitle }}
                </p>
            @endif

            {{-- Featured Image --}}
            @if (has_post_thumbnail())
                <div class="mb-8">
                    {!! get_the_post_thumbnail(null, 'medium', ['class' => 'w-[50%] h-auto ']) !!}
                </div>
            @endif

            {{-- Press Text --}}
            @if ($text = get_field('press_text'))
                <div class="prose max-w-none text-body">
                    {!! $text !!}
                </div>
            @else
                {{-- Fallback: normaler Content --}}
                <div class="prose max-w-none text-body">
                    {!! nl2br(get_the_content()) !!}
                </div>
            @endif

        </div>
    </section>
@endsection
