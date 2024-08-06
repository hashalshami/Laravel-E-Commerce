<div class="h-full" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <button @click="open = ! open" class="center h-full cursor-pointer text-slate-400 ">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" aria-hidden="true">
            <path d="m19 19-3.5-3.5"></path>
            <circle cx="11" cy="11" r="6"></circle>
        </svg>

    </button>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="z-[200] fixed top-0 right-0 w-screen h-screen center  backdrop-blur" style="display: none;"
        @click="open = false">

        <div class="h-9 mx-auto rounded-lg bg-white w-9">
            
        </div>

    </div>
</div>
