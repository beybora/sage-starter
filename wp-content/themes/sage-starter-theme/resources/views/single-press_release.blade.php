{{-- ✅ Template: single-press_release.blade.php --}}
@extends('layouts.app')

@section('content')
    <section class="bg-white py-20">
        <div class="container max-w-3xl mx-auto px-6">
            <h1 class="text-3xl font-bold mb-4">{{ get_the_title() }}</h1>

            <div class="prose mb-8">
                {!! nl2br(get_the_content()) !!}
            </div>

            @if (has_post_thumbnail())
                <div class="mb-6">
                    {!! get_the_post_thumbnail(null, 'large', ['class' => 'rounded']) !!}
                </div>
            @endif
        </div>
    </section>
@endsection
