@props(['title' => 'دخول '])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}" style="whidth: 16px;" />

    <title>{{ $title }}</title>

    <!-- Fonts -->
    @include('layouts.fonts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-neutral-200 font-display antialiased ">
    <div class="min-h-screen flex flex-col sm:justify-start items-center py-4 ">
        <div class="mb-4 flex justify-center items-center    ">
            <a href="/"  wire:navigate class="py-2 px-4 h-14 inline-block bg-white rounded-lg shadow-md">
                <x-app.application-logo class="h-full fill-current text-gray-500" />
            </a>
        </div>
        <div class="px-4  w-full sm:max-w-xl mx-auto">


            @if (isset($tabs))
                <div class=" mb-4 flex gap-x-2 justify-evenly space-x-4 p-2 bg-white rounded-lg shadow-md">
                    {{ $tabs }}

                </div>
            @endif


            <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-r-4 border-blue-600">
                <h2 class="text-xl font-semibold mb-2 text-blue-700"> {{ $title }}</h2>
                {{ $slot }}
            </div>
        </div>


    </div>
</body>

</html>
