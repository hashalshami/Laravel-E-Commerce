@props([
    'disabled' => false,
    'name' => 'name',
    'type' => 'text',
    'text' => 'text',
    'autofocus' => false,
    'autocomplete' => 'off',
    'value' => '',
])
<div class="mt-3">

    <label for="{{ $name }}" class=" text-slate-700 @error($name) after:content-['*'] after:ml-0.5 after:text-red-500 @enderror">{{ $text }}</label>

    <input id="{{ $name }}" type="{{ $type }}" {{ $disabled ? 'disabled' : '' }}
    class="w-full mt-1 max-w-lg rounded-md border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">

    <x-app.input-error :messages="$errors->get($name)" class="mt-2" />
</div>

{{-- <x-form.input-line name="email" type="email" text="البريد الإلكتروني" autofocus autocomplete="username" /> --}}
