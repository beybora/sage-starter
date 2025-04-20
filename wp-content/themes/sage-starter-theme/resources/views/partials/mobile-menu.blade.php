{{-- Mobile Menu --}}
<div x-show="open" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
    x-transition:leave-end="transform -translate-x-full" class="md-l:hidden fixed inset-0 bg-primary bg-opacity-90 z-50"
    @click.away="open = false"> {{-- Close menu when clicking outside --}}

    <div class="flex justify-end p-5">
        <button @click="open = false" class="text-white focus:outline-none">
            <span class="block w-6 h-0.5 bg-white mb-1"></span>
            <span class="block w-6 h-0.5 bg-white mb-1"></span>
            <span class="block w-6 h-0.5 bg-white"></span>
        </button>
    </div>

    <div class="flex flex-col items-center justify-center h-full space-y-4" @click="open = false">
        @foreach ($menu_items as $item)
            <a href="{{ $item->url }}"
                class="text-white text-lg py-4 hover:text-accent transition ease-in-out duration-300 no-underline"
                @click="open = false">
                {{ $item->title }}
            </a>
        @endforeach

        <x-button href="#" variant="secondary" size="lg" class="mt-5" @click="open = false">
            Join us
        </x-button>
    </div>
</div>
