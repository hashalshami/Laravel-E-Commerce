@props(['tap' => '1', 'title' => 'بندة بوتيك | Bndah Boutique '])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}" style="whidth: 16px;" />

    <title>@yield('title')</title>

    <!-- Fonts -->
    @include('layouts.fonts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-neutral-200 font-display antialiased ">
    <div class="min-h-screen flex flex-col sm:justify-start items-center p-4 ">
       
       @yield('content')

    </div>
</body>

</html>
