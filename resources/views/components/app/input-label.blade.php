@props(['value'])

<label {{ $attributes->merge(['class' => 'mb-2 ']) }}>
    {{ $value ?? $slot }}
</label>
