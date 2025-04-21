@php
    $siteName = get_bloginfo('name');
@endphp

<footer class="bg-dark text-muted section-spacing">
    <div class="container-layout">
        <div class="flex flex-col md:flex-row justify-between gap-10 items-start">

            {{-- Footer Navigations (nebeneinander) --}}
            <div class="flex flex-col sm:flex-row gap-10">
                @include('partials.footer-navigation', ['location' => 'footer_navigation'])
                @include('partials.footer-navigation', ['location' => 'footer_secondary'])
            </div>

            {{-- Logo + Copyright + Social Icons --}}
            <div class="space-y-4 text-left md:text-right">
                <div class="text-xl font-bold text-white">{{ $siteName }}</div>
                <p class="text-white">
                    © {{ date('Y') }} {{ $siteName }}<br>
                    All rights reserved
                </p>

                {{-- Social Icons --}}
                @include('partials.social-icons')
            </div>

        </div>
    </div>
</footer>
