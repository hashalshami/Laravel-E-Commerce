@props([
    'name' => 'name',
    'text' => 'value',
])


<label for="{{$name}}" class="inline-block text-slate-700 mb-2 @error($name) after:content-['*'] after:ml-0.5 after:text-red-500 @enderror">
    {{ $text  }}
</label>
