@props([
    'name' => 'name',
    'type' => 'text',
    'text' => 'text',
    'autofocus' => false,
    'autocomplete' => 'off',
    'value' => '',
])

<div class="relative mt-6">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        class="peer mt-1 w-full border-b-2 border-x-0 border-t-0 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
        placeholder="{{ $name }}" value="{{ old($name, $value) }}" autocomplete="{{ $autocomplete }}"
        {{ $attributes->merge(['autofocus' => $autofocus ? 'autofocus' : '']) }} />
    <label for="{{ $name }}"
        class="pointer-events-none absolute top-0 right-0 origin-right -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">
        {{ $text }}
    </label>

</div>
<x-app.input-error :messages="$errors->get($name)" class="mt-2" />

{{-- <x-form.input-line name="email" type="email" text="البريد الإلكتروني" autofocus autocomplete="username" /> --}}
