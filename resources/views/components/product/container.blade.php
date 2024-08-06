@props([
    'products' => [],
])
<div id="default-carousel" class="snap-x scroll-px-8 flex flex-nowrap items-center overflow-x-auto" data-carousel="slide">
    @foreach ($products as $product)
        <div class="scroll-ms-16 snap-start " data-carousel-item>
            <livewire:card :product="$product" :key="$product->id" />
        </div>
    @endforeach
    <!-- ... -->
</div>

<div id="default-carousel" class="hidden relative w-full" x-data="{ activeSlide: 0 }" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative flex h-56 overflow-x-hidden rounded-lg md:min-h-9">
        @foreach ($products as $index => $product)
            <div x-show="activeSlide === {{ $index }}" data-carousel-item
                class="w-72 inline-block duration-700 ease-in-out">
                <livewire:card :product="$product" :key="$product->id" />
            </div>
        @endforeach
    </div>

    <!-- Slider indicators -->


    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev @click="activeSlide = (activeSlide > 0) ? activeSlide-1 : {{ count($products) - 1 }}" >
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button @click="activeSlide = (activeSlide < {{ count($products) - 1 }}) ? activeSlide + 1 : 0" type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800 group-focus:outline-none">
            <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
