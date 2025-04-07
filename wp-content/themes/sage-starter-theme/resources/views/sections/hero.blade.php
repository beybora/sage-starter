@php
    $title = $title ?? 'This is the Hero Title';
    $description = $description ?? 'This is the hero description text.';
    $buttonLabel = $buttonLabel ?? 'Register';
@endphp

<section class="bg-gray-50 py-20">
    <div class="max-w-screen-xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">

        {{-- Textbereich --}}
        <div class="space-y-6">
            <h1 class="h1 text-gray-900">{{ $title }}</h1>
            <p class="paragraph">{{ $description }}</p>
            <a href="#"
                class="button-text inline-block bg-primary text-white px-6 py-3 rounded-md hover:bg-green-600 transition">
                {{ $buttonLabel }}
            </a>
        </div>

        {{-- Dummy Bild --}}
        <div class="flex justify-center md:justify-end">
            <div
                class="w-[300px] h-[250px] bg-gray-300 rounded-md flex items-center justify-center text-gray-500 text-sm">
                Bild-Platzhalter
            </div>
        </div>

    </div>
</section>
