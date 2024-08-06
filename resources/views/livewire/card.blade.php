<div  
    class="relative w-72 border border-gray-300 shadow-[9px_10px_18px_rgba(0,0,0,0.3)] rounded-xl bg-white cursor-pointer m-4" >
    <button type="button"  wire:click="toggleFavorite"
        class="absolute right-2 top-2 size-9 p-1.5 inline-flex items-center justify-center  rounded-full bg-zinc-300">
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

    <div
        class="bg-slate-100 absolute w-8 px-1 py-2  top-2 left-2 flex flex-col items-center gap-2 max-h-52 flex-nowrap ">

        @foreach ($images as $img)
            @if ($img->path == $path)
                <button class="duration-75 w-6 h-6 rounded-2xl"
                    style="background:linear-gradient({{ $img->color }}80,{{ $img->color }});"></button>
            @else
                <button class=" duration-75 size-5 rounded-full" wire:click="toggleImage('{{ $img->path }}')"
                    style="background:linear-gradient({{ $img->color }}80,{{ $img->color }});"></button>
            @endif
        @endforeach
    </div>
    <a href="{{ route('pro.show', $product->id) }}" class="block w-full " wire:navigate>
        <div class="w-full overflow-hidden ">
            <img class="w-full transition-all duration-100 rounded-t-xl   " src="{{ asset('product/' . $path) }}"
                alt="{{ $product->name }}">
        </div>


        <div class="py-2 px-3">

            <h3 class=""> {{ $product->name }}</h3>

            <div class="flex justify-between mt-2">
                <span class="font-serif"> {{ $product->price }} ريال </span>
                <span class=" text-xs text-gray-500 font-sans font-bold"> {{ $product->category->cat_name }} </span>
            </div>
        </div>
    </a>
    {{-- cart button --}}
    <div class="m-1  h-10" wire:click="toggleCart">
        @if ($inCart)
            <div class="flex h-10 justify-between  items-center flex-nowrap">
                <button class="bg-[#0e634e] grow text-center  rounded-tr-md rounded-br-md py-2 text-slate-200 "
                    >
                    اضافة الى السلة
                    +
                </button>


                <button class="bg-red-700 px-4 py-2  rounded-bl-md rounded-tl-md  " >
                    <x-icons.trash class="fill-slate-200 h-5" />
                </button>

            </div>
        @else
            <button class=" bg-[#1f1f1f]  w-full text-slate-200  rounded-md text-center py-2 " >
                <span> اضافة الى السلة</span>
                <x-icons.cart-shop class="fill-red-700 mx-1 h-5" />

            </button>
        @endif
    </div>

</div>
