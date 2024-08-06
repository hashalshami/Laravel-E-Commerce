@props(['tab','title'=>'section'])
<div x-show="openTab === {{$tab}}"
    class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
    <h2 class="text-2xl font-semibold mb-2 text-blue-600">{{$title}}</h2>
    <div class="text-gray-700">
        {{$slot}}
    </div>
</div>
