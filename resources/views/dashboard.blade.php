<x-app-layout>
    <x-slot name="title">
        لوحة التحكم
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 flex   shadow-sm sm:rounded-lg">
                <a href="{{ route('pro.create') }}"
                    class=" block max-w-xs  rounded-lg p-6 bg-sky-500 ring-1 ring-sky-500 shadow-lg space-y-3  ">
                    <div class="flex  items-center space-x-3">
                       <svg class="h-6 w-6 stroke-white group-hover:stroke-white" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 19H6.931A1.922 1.922 0 015 17.087V8h12.069C18.135 8 19 8.857 19 9.913V11"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 7.64L13.042 6c-.36-.616-1.053-1-1.806-1H7.057C5.921 5 5 5.86 5 6.92V11M17 15v4M19 17h-4">
                            </path>
                        </svg>
                        <h3 class="text-white text-sm font-semibold"> منتج جديد</h3>
                    </div>
                    <p class="text-white text-sm">Create a new project from a variety of
                        starting
                        templates.</p>
                </a>
                <a href="#"
                    class="group block max-w-xs mx-auto rounded-lg p-4 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 hover:bg-sky-500 hover:ring-sky-500">
                    <div class="flex items-center space-x-3">
                        <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 19H6.931A1.922 1.922 0 015 17.087V8h12.069C18.135 8 19 8.857 19 9.913V11"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 7.64L13.042 6c-.36-.616-1.053-1-1.806-1H7.057C5.921 5 5 5.86 5 6.92V11M17 15v4M19 17h-4">
                            </path>
                        </svg>
                        <h3 class="text-sm text-slate-900 font-semibold group-hover:text-white">New project</h3>
                    </div>
                    <p class="text-sm text-slate-500 group-hover:text-white">Create a new project from a variety of
                        starting templates.</p>
                </a>
            </div>

        </div>
    </div>
<div class="relative rounded-xl overflow-auto p-8"><a href="#" class="group block max-w-xs mx-auto rounded-lg p-4 bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 hover:bg-sky-500 hover:ring-sky-500">
  <div class="flex items-center space-x-3">
    <svg class="h-6 w-6 stroke-sky-500 group-hover:stroke-white" fill="none" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19H6.931A1.922 1.922 0 015 17.087V8h12.069C18.135 8 19 8.857 19 9.913V11"></path>
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 7.64L13.042 6c-.36-.616-1.053-1-1.806-1H7.057C5.921 5 5 5.86 5 6.92V11M17 15v4M19 17h-4"></path>
    </svg>
    <h3 class="text-sm text-slate-900 font-semibold group-hover:text-white">New project</h3>
  </div>
  <p class="text-sm text-slate-500 group-hover:text-white">Create a new project from a variety of starting templates.</p>
</a></div>
</x-app-layout>
