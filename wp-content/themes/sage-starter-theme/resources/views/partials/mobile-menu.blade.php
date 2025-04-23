<div x-show="open" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="transform -translate-x-full" x-transition:enter-end="transform translate-x-0"
    x-transition:leave="transition ease-in duration-200" x-transition:leave-start="transform translate-x-0"
    x-transition:leave-end="transform -translate-x-full"
    class="md:hidden fixed inset-y-0 left-0 z-50 w-[80%] max-w-sm bg-primary shadow-xl" @click.outside="open = false">

    {{-- Close-Button --}}
    <div class="flex justify-end p-5">
        <button @click="open = false" class="text-white focus:outline-none">
            <span class="block w-6 h-0.5 bg-white mb-1"></span>
            <span class="block w-6 h-0.5 bg-white mb-1"></span>
            <span class="block w-6 h-0.5 bg-white"></span>
        </button>
    </div>




    <div class="pl-6 pr-8 pt-4 pb-8">
        <h4 class="text-white"> CHP Berlin Birligi</h4>
    </div>

    {{-- Menüeinträge --}}
    <div class="pl-6 pr-8 pt-4 pb-4 space-y-4">
        @foreach ($menu_items as $item)
            <a href="{{ $item->url }}"
                class="block text-white text-lg no-underline hover:underline hover:text-accent transition duration-200"
                @click="open = false">
                {{ $item->title }}
            </a>
        @endforeach
    </div>

    {{-- CTA unten --}}
    <div class="pl-6 pr-8 pt-8">
        <x-button href="{{ $ctaUrl }}" variant="secondary" size="sm">
            {{ $ctaText }}
        </x-button>
    </div>
</div>
