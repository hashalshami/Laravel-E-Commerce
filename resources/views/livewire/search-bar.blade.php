<div class="h-full " x-data="{ search: false }">
    <button @click="search = ! search"
        class="flex w-12 items-center justify-center h-full cursor-pointer text-slate-400 ">
        <x-icons.search class="size-6 m-auto" />

    </button>

    <div x-show="search" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 "
        x-transition:enter-end="opacity-100 " x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 " x-transition:leave-end="opacity-0 "
        class="z-[200] fixed inset-0 w-screen p-28  h-screen   bg-slate-900/25 backdrop-blur transition-opacity opacity-100"
        style="display: none;" x-on:click="search =false">

        <div x-on:click.stop class="bg-white flex flex-col justify-stretch h-full   py-3     rounded-xl">

            <div class="flex items-stretch justify-start flex-nowrap max-w-full mx-4">
                <label for="search" class="flex items-center justify-center">
                    <x-icons.search class="size-6" />
                </label>
                <div class="w-0.5 mx-2 opacity-50 rounded-full bg-gray-400"></div>
                <input type="search" wire:model.live.debounce.200ms="q" id="search"
                    class="grow px-4 py-1 text-dark rounded-l-full outline-0" placeholder="search">
            </div>

                <div class="mt-4 w-full grow overscroll-y-auto px-5 overflow-y-auto">
                @forelse ($products as $product)
                    <div class="w-4/5 pr-5">
                        <div class="flex h-20 w-full items-stretch py-1 "  >
                            <img class="h-full rounded-lg" src="{{ asset('product/' . $product->firstPath()->path) }}">
                            <div class="px-6">
                                <div>{{ $product->name }}</div>
                                <div>{{ $product->price }}</div>
                            </div>
                        </div>
                        <div class="w-full h-px bg-gray-800 my-4 opacity-25 rounded-full"></div>
                    </div>
                        
                    @empty
                        <div class="flex items-center justify-center">ابحث عن المنتجات</div>
                    @endforelse

                </div>
            </div>



    </div>
</div>
