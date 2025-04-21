@extends('layouts.app')

@section('content')
    <section class="bg-white section-spacing">
        <div class="container-layout">

            {{-- Page Title --}}
            <h1 class="h2 mb-6 text-center">Press Releases</h1>

            @if (have_posts())
                <div class="space-y-10">
                    @while (have_posts())
                        @php the_post() @endphp

                        {{-- Press Release Card --}}
                        <article class="border-b border-[#ddd] pb-6">
                            <h2 class="h4 mb-2 italic">
                                <a href="{{ get_permalink() }}" class="hover:underline no-underline ">
                                    {{ get_the_title() }}
                                </a>
                            </h2>

                            <div class="text-sm text-muted mb-3">
                                {{ get_the_date() }}
                            </div>

                            <p class="paragraph">
                                {{ wp_trim_words(get_the_content(), 30) }}
                            </p>
                        </article>
                    @endwhile
                </div>

                {{-- Pagination --}}
                <div class="mt-10">
                    {!! get_the_posts_navigation() !!}
                </div>
            @else
                <p class="paragraph text-muted">
                    No press releases found.
                </p>
            @endif

        </div>
    </section>
@endsection
