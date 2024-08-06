<div class="m-1  h-10">
    @if ($inCart)
        <div class="flex h-10 justify-between  items-center flex-nowrap">
            <button class="bg-[#0e634e] grow text-center  rounded-tr-md rounded-br-md py-2 text-slate-200 "
                wire:click="incrementCart"> 
                اضافة الى السلة
                +

            </button>


            <button class="bg-red-700 px-4 py-2  rounded-bl-md rounded-tl-md  " wire:click="removeFromCart">
                <x-icons.trash class="fill-slate-200 h-5" />
            </button>

        </div>
    @else
        <button class=" bg-[#1f1f1f]  w-full text-slate-200  rounded-md text-center py-2 " wire:click="addToCart">
            <span> اضافة الى السلة</span>
            <x-icons.cart-shop class="fill-red-700 mx-1 h-5" />

        </button>
    @endif
</div>
