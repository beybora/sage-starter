@extends('layouts.app')

@section('content')
    @php
        $date_raw = get_field('event_date');
        $date_obj = $date_raw ? DateTime::createFromFormat('d/m/Y', $date_raw) : null;
        $day = $date_obj ? $date_obj->format('d') : '';
        $month = $date_obj ? strtoupper($date_obj->format('M')) : '';
        $title = get_the_title();
        $description = get_field('event_description');
        $location = get_field('event_location');
        $time = get_the_time('g:i A');
    @endphp

    <section class="bg-white py-20">
        <div class="container max-w-3xl mx-auto px-6">

        </div>
    </section>
@endsection
