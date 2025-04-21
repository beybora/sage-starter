@php
    $siteName = get_bloginfo('name');
@endphp

<footer class="bg-dark text-muted section-spacing">
    <div class="container-layout-sm">
        <div
            class="flex flex-col md:flex-row justify-between gap-10 items-center md:items-start text-center md:text-left">

            {{-- Footer Navigations  --}}
            <div class="flex flex-col sm:flex-row justify-center gap-10 md:gap-20 text-center sm:text-left">
                @include('partials.footer-navigation', ['location' => 'footer_navigation'])
                @include('partials.footer-navigation', ['location' => 'footer_secondary'])
            </div>

            {{-- Logo + Copyright + Social Icons --}}
            <div class="space-y-4 text-center md:text-right mt-10 md:mt-0">
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
