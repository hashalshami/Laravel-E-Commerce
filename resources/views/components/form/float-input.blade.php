@props([
    'name' => 'name',
    'type' => 'text',
    'text' => 'text',
])
@php
    if ($type == 'email' || $type == 'password') {
        $align = 'ltr';
    } else {
        $align = 'rtl';
    }
@endphp

<div class="relative ">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name . '-float' }}" dir="{{ $align }}"
        class="peer mt-1 w-full  px-2.5 py-1.5 
                border  rounded-md border-slate-400 focus:border-blue-500 active:border-blue-500 hover:border-blue-500 placeholder:text-transparent focus:outline-none  "
        placeholder=" " {{ $attributes }} />
    <label for="{{ $name . '-float' }}"
        class="pointer-events-none absolute text-sm text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white backdrop-blur-xl  px-2 peer-focus:px-2 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
        {{ $text }}
    </label>
</div>
<x-app.input-error :messages="$errors->get($name)" class="mt-2" />

{{-- <div class="relative mt-3">
            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name.'-float' }}"
                class="peer block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-md border border-gray-300 appearance-none   focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " 
        {{ $attributes->merge(['autofocus' => $autofocus ? 'autofocus' : '']) }} />
            <label for="{{ $name.'-float' }}"
                class="absolute text-sm text-gray-500  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                 {{ $text }}
            </label>
</div> --}}

