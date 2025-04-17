@php
    $date_raw = $event->date_raw;
    $date_obj = $date_raw ? DateTime::createFromFormat('d/m/Y', $date_raw) : null;
    $day = $date_obj ? $date_obj->format('d') : '';
    $month = $date_obj ? strtoupper(strftime('%b', $date_obj->getTimestamp())) : '';
@endphp
<a href="{{ get_permalink($event->post) }}"
    class="block no-underline cursor-pointer hover:bg-gray-50 rounded-lg p-2 transition">
    <div class="flex items-start space-x-6">
        <div class="bg-[#013365] text-white rounded-lg px-4 py-2 text-center w-16 shrink-0">
            <div class="text-2xl font-bold leading-none">{{ $day }}</div>
            <div class="text-sm uppercase">{{ $month }}</div>
        </div>

        <div>
            <span class="text-xs uppercase text-gray-600">Veranstaltung</span>
            <h3 class="font-bold text-lg leading-tight">{{ $event->title }}</h3>

            @if ($event->time)
                <p class="text-sm text-gray-600">{{ $event->time }}</p>
            @endif

            @if ($event->location)
                <p class="text-sm text-gray-500 mt-1">{{ $event->location }}</p>
            @endif
        </div>
    </div>
</a>
