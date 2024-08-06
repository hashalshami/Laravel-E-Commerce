

<div id="default-carousel" class="relative w-full" x-data="{ activeSlide: 0 }" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative flex  overflow-hidden rounded-lg ">
        @foreach ($products as $index => $product)
            <div x-show="activeSlide === {{ $index }}" class="w-full duration-700 ease-in-out" data-carousel-item wire:key="{{ $post->id }}">
                <div class="relative w-72 border border-gray-300 shadow-[9px_10px_18px_rgba(0,0,0,0.3)] rounded-xl bg-white cursor-pointer m-4">
                    <!-- Favorite Button -->
                    <button wire:click="toggleFavorite" class="absolute right-2 top-2 size-9 p-1.5 inline-flex items-center justify-center rounded-full bg-zinc-300">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" @class([
                            'h-full',
                            'stroke-1',
                            'fill-red-700' => $isFavorited,
                            'stroke-zinc-900' => !$isFavorited,
                            'fill-none' => !$isFavorited,
                        ])>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </button>

                    <!-- Images & Product Info -->
                    <a href="{{ route('pro.show', $product->id) }}">
                        <div class="w-full p-2">
                            <img class="w-full transition-all duration-100 rounded-2xl" src="{{ asset('product/' . $path) }}" alt="{{ $product->name }}">
                        </div>
                        <div class="py-2 px-3">
                            <h3 class="">{{ $product->name }}</h3>
                            <div class="flex justify-between mt-2">
                                <span class="font-serif">{{ $product->price }} ريال</span>
                                <span class="text-xs text-gray-500 font-sans font-bold">{{ $product->category->cat_name }}</span>
                            </div>
                        </div>
                    </a>

                    <!-- Cart Button -->
                    <div class="m-1 h-10" wire:click="toggleCart">
                        @if ($inCart)
                            <div class="flex h-10 justify-between items-center">
                                <button class="bg-[#0e634e] grow text-center rounded-tr-md rounded-br-md py-2 text-slate-200">اضافة الى السلة +</button>
                                <button class="bg-red-700 px-4 py-2 rounded-bl-md rounded-tl-md">
                                    <x-icons.trash class="fill-slate-200 h-5" />
                                </button>
                            </div>
                        @else
                            <button class="bg-[#1f1f1f] w-full text-slate-200 rounded-md text-center py-2">
                                <span>اضافة الى السلة</span>
                                <x-icons.cart-shop class="fill-red-700 mx-1 h-5" />
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3">
        @foreach ($products as $index => $product)
            <button type="button" @click="activeSlide = {{ $index }}" class="w-3 h-3 rounded-full" :class="{'bg-gray-800': activeSlide === {{ $index }}, 'bg-white': activeSlide !== {{ $index }}}" aria-current="true" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button @click="activeSlide = (activeSlide > 0) ? activeSlide - 1 : {{ count($products) - 1 }}" type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button @click="activeSlide = (activeSlide < {{ count($products) - 1 }}) ? activeSlide + 1 : 0" type="button"
        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-800/30 group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-gray-800 group-focus:outline-none">
            <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
