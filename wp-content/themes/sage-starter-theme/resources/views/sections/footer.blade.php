<footer class="bg-gray-900 text-gray-300 py-12">
    <div class="max-w-screen-lg mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between gap-10 items-start">

            {{-- Main Navigation --}}
            @include('partials.main-navigation')

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
