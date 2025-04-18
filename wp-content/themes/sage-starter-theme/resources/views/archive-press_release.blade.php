@extends('layouts.app')

@section('content')
    <section class="bg-white py-10">
        <div class="container max-w-5xl mx-auto px-6">
            <h1 class="text-3xl font-bold mb-6">Press Releases</h1>
            @if (have_posts())
                <div class="space-y-8">
                    @while (have_posts())
                        @php the_post() @endphp
                        <article class="border-b pb-6">
                            <h2 class="text-2xl font-semibold">
                                <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
                            </h2>
                            <div class="text-gray-600">
                                {{ get_the_date() }}
                            </div>
                            <p>{{ wp_trim_words(get_the_content(), 30) }}</p>
                        </article>
                    @endwhile
                </div>

                {!! get_the_posts_navigation() !!}
            @else
                <p>No press releases found.</p>
            @endif
        </div>
    </section>
@endsection
