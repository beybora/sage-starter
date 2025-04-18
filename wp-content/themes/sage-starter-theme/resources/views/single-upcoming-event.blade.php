@extends('layouts.app')

@section('content')
    @php
        $title = get_the_title();
        $date_raw = get_field('event_date'); // Format: Ymd oder d/m/Y – je nach ACF-Einstellung!
        $description = get_field('event_description');
        $location = get_field('event_location'); // Normale Ortsangabe als Text
        $google_maps_location = get_field('google_maps_location'); // Google Maps-Feld (falls vorhanden)
        $time = get_the_time('H:i'); // oder 'g:i A' für 12h Format

    @endphp

    <section class="bg-white py-20">
        <div class="container max-w-3xl mx-auto px-6">

            {{-- Überschrift --}}
            <h1 class="text-4xl font-bold mb-6">{{ $title }}</h1>

            {{-- Infos als 2x2 Grid --}}
            <div class="grid grid-cols-2 gap-x-6 gap-y-4 mb-10 text-sm text-gray-700">
                <div>
                    <div class="text-xs uppercase text-gray-400 mb-1">Tag</div>
                    <div class="font-medium">{{ $date_raw }}</div>
                </div>

                <div>
                    <div class="text-xs uppercase text-gray-400 mb-1">Uhrzeit</div>
                    <div class="font-medium">{{ $time }}</div>
                </div>

                @if ($location)
                    <div class="col-span-2">
                        <div class="text-xs uppercase text-gray-400 mb-1">Ort</div>
                        <div class="font-medium">{{ $location }}</div>
                    </div>
                @endif
            </div>

            {{-- Google Maps Location (falls vorhanden) --}}
            @if (!empty($google_maps_location))
                <div class="mb-10">
                    <div class="text-xs uppercase text-gray-400 mb-2">Standort</div>
                    <div class="bg-gray-100 rounded-lg overflow-hidden h-64">
                        {!! $google_maps_location !!}
                    </div>
                </div>
            @endif

            {{-- Beschreibung --}}
            <div class="prose max-w-none text-gray-800">
                {!! nl2br(e($description)) !!}
            </div>
        </div>
    </section>
@endsection
