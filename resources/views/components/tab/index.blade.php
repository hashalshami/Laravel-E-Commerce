 <div x-data="{ openTab: {{ $tab }} }" class=" max-w-md mx-auto">
     <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
        {{$bar}}
     </div>

     {{ $slot }}
 </div>
