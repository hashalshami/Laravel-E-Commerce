<div x-data="{ open: false }" class="fixed bottom-5 right-5 z-50 flex flex-col-reverse items-start gap-y-5">
    <button @click="open = ! open"
        class="flex items-center justify-center p-2 rounded-md bg-teal-600 text-gray-50 hover:bg-teal-500  transition duration-150 ease-in-out">
        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" class="flex flex-col gap-y-3" style="display: none;"
        @click="open = false">
        <a href="{{ route('pro.create') }}"
            class="flex items-center justify-center p-2 rounded-md bg-teal-600 text-gray-50 hover:bg-teal-500  transition duration-150 ease-in-out">
           اضافة منتج
        </a>
        <a href="{{ route('cat.create') }}"
            class="flex items-center justify-center p-2 rounded-md bg-teal-600 text-gray-50 hover:bg-teal-500  transition duration-150 ease-in-out">
           اضافة قسم
        </a>
        <a href="{{ route('test') }}" target="_blank"
            class="flex items-center justify-center p-2 rounded-md bg-teal-600 text-gray-50 hover:bg-teal-500  transition duration-150 ease-in-out">
           test
        </a>
        
    </div>

</div>
