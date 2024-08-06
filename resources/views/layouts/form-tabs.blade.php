<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/icon.png') }}" style="whidth: 16px;" />

    <title>{{ $title ?? 'بندة بوتيك | Bndah Boutique ' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="">
    <div class="bg-gray-100 font-sans flex flex-col h-screen items-center justify-center">
        <div>
            <a href="/">
                <x-app.application-logo class="m-4 w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>
        <div x-data="{ openTab: 1 }" class="p-8">
            <div class="max-w-md mx-auto">
                <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
                    <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1 }"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                        تسجيل الدخول</button>
                    <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2 }"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                        إنشاء حساب 
                    </button>
                    <button x-on:click="openTab = 3" :class="{ 'bg-blue-600 text-white': openTab === 3 }"
                        class="flex-1 py-2 px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">Section
                        3</button>
                </div>

                <div x-show="openTab === 1"
                    class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-r-4 border-blue-600">
                  <x-form.login />
                   
                </div>

                <div x-show="openTab === 2"
                    class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
                    <h2 class="text-2xl font-semibold mb-2 text-blue-600">Section 2 Content</h2>
                    <p class="text-gray-700">Proin non velit ac purus malesuada venenatis sit amet eget lacus. Morbi
                        quis purus id ipsum ultrices aliquet Morbi quis.</p>
                </div>

                <div x-show="openTab === 3"
                    class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
                    <h2 class="text-2xl font-semibold mb-2 text-blue-600">Section 3 Content</h2>
                    <p class="text-gray-700">Fusce hendrerit urna vel tortor luctus, nec tristique odio tincidunt.
                        Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
