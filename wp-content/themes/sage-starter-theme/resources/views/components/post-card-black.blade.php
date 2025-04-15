@php
    $title = $title ?? '';
    $subtitle = $subtitle ?? '';
    $description = $description ?? '';
    $label = $label ?? 'Read more';
    $slug = $slug ?? '';
    $icon = $icon ?? null;
@endphp

<a href="{{ $slug }}"
    class="group relative z-10 p-4 md:p-6 h-full flex flex-col bg-neutral-900 rounded-xl before:absolute before:inset-0 before:bg-gradient-to-b hover:before:from-transparent hover:before:via-transparent hover:before:to-[#ff0]/10 before:via-80% focus:before:from-transparent focus:before:via-transparent focus:before:to-[#ff0]/10 before:-z-10 before:rounded-xl before:opacity-0 hover:before:opacity-100 focus:before:opacity-100">
    <div class="mb-5">
        @if (!empty($icon))
            {!! $icon !!}
        @endif

        <div class="mt-5">
            <p class="font-semibold text-5xl text-white">{{ $title }}</p>
            <h3 class="mt-5 font-medium text-lg text-white">{!! $subtitle !!}</h3>
            <p class="mt-1 text-neutral-400">{{ $description }}</p>
        </div>
    </div>
    <p class="mt-auto">
        <span
            class="font-medium text-sm text-[#ff0] pb-1 border-b-2 border-neutral-700 group-hover:border-[#ff0] group-focus:border-[#ff0] transition focus:outline-hidden">
            {{ $label }}
        </span>
    </p>
</a>
