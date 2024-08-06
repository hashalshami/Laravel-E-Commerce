@props([
    'disabled' => false,
    'name' => 'name',
    'type' => 'text',
    'autofocus' => false,
    'autocomplete' => 'off',
    'value' => '',
])


<input id="{{ $name }}" type="{{ $type }}" {{ $disabled ? 'disabled' : '' }} value="{{$value}}"
    class="w-full mt-1 max-w-lg rounded-md border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
<x-app.input-error :messages="$errors->get($name)" class="mt-2" />
