@extends('layouts.app')

@section('content')
    @while (have_posts())
        @php(the_post())
        <section class="py-20 bg-white">
            <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 ">
                @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
            </div>
        </section>
    @endwhile
@endsection
