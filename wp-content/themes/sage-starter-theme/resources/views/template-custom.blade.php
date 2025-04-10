{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')

@section('content')
    <section class="py-20 bg-white">
        <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8 ">
            @php(the_content())
        </div>
    </section>
@endsection
