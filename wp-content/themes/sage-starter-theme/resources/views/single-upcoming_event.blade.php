@extends('layouts.app')

@section('content')
    @php
        $title = get_the_title();
        $date_raw = get_field('event_date');
        $description = get_field('event_description');
        $location = get_field('event_location');
        $google_maps_location = get_field('google_maps_location');
        $time = get_the_time('H:i');
    @endphp

    <section class="bg-white section-spacing">
        <div class="container-layout">

            {{-- Headline --}}
            <h1 class="h1 mb-6">
                {{ $title }}
            </h1>

            {{-- Event Info Grid --}}
            <div class="grid grid-cols-2 gap-x-6 gap-y-4 mb-10 text-sm text-body">
                <div>
                    <div class="above-title mb-1">Tag</div>
                    <div class="font-medium">{{ $date_raw }}</div>
                </div>

                <div>
                    <div class="above-title mb-1">Uhrzeit</div>
                    <div class="font-medium">{{ $time }}</div>
                </div>

                @if ($location)
                    <div class="col-span-2">
                        <div class="above-title mb-1">Ort</div>
                        <div class="font-medium">{{ $location }}</div>
                    </div>
                @endif
            </div>

            {{-- Google Maps --}}
            @if (!empty($google_maps_location))
                <div class="mb-10">
                    <div class="above-title mb-2">Standort</div>
                    <div class="bg-surface rounded-lg overflow-hidden h-64">
                        {!! $google_maps_location !!}
                    </div>
                </div>
            @endif

            {{-- Description --}}
            <div class="prose max-w-none text-body">
                {!! nl2br(e($description)) !!}
            </div>

        </div>
    </section>
@endsection
