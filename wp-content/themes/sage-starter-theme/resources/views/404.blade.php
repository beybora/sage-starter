@extends('layouts.app')

@section('content')
    <section class="container mx-auto py-20 text-center">
        <h1 class="text-4xl font-bold mb-4">404 – Seite nicht gefunden</h1>
        <p class="text-gray-600 text-lg mb-8">
            Die angeforderte Seite existiert nicht oder wurde verschoben.
        </p>

        <a href="{{ home_url() }}" class="inline-block bg-black text-white px-6 py-3 rounded hover:bg-gray-800 transition">
            Zur Startseite
        </a>
    </section>
@endsection
