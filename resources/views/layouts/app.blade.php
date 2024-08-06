<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}" />

    {{-- <title>@yield('title', 'بندة بوتيك | Bndah Boutique ')</title> --}}
    <title>{{ $title ?? 'بندة بوتيك | Bndah Boutique  ' }}</title>

    <!-- Fonts -->
    @include('layouts.fonts')



    @vite(['resources/css/app.css', 'resources/js/app.js'])



    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-display bg-neutral-200 antialiased" x-data="{ isVisible: true, lastScrollY: 0, sidebar: false }" 
x-init="() => {
    lastScrollY = window.scrollY;
    window.addEventListener('scroll', () => {
        if (window.scrollY <= lastScrollY) {
            isVisible = true;
        } else {
            isVisible = false;
        }
        lastScrollY = window.scrollY;
    });
}">
        
    <x-header />



    <main class="min-h-screen">
        @section('slot')
            {{ $slot }}
        @show
    </main>






    @auth
        @if (Auth::user()->admin)
            <x-admin.menu />
        @endif
    @endauth

    <x-footer />


    @stack('modals')

    @livewireScripts
    @stack('scripts')
    <script src="{{ asset('vendor/livewire-alert/alert.js') }}"></script>
    <x-livewire-alert::scripts />
    {{-- <livewire:notifications /> --}}




    @session('logined')
        <livewire:alert.event :login="true" />
    @endsession


</body>

</html>
