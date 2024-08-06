<nav x-data="{ open: false }" class="shadow-md sticky font-cairo top-0 z-50 bg-gray-200 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Menu Button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden  bg-white w-full float-right sm:hidden  ">
                <div class="pt-2 pb-3 space-y-1">
                    <x-app.responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        لوحة التحكم
                    </x-app.responsive-nav-link>

                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    @guest
                    @else
                        <div class="px-4 ">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium  text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <x-app.responsive-nav-link :href="route('profile.edit')">
                                <x-icons.profile class="fill-current w-4 ms-1.5 me-1" />
                                الملف الشخصي
                            </x-app.responsive-nav-link>
                            <x-app.responsive-nav-link :href="route('favorite')">
                                <x-icons.heart-user-menu class="fill-current w-4 ms-1.5 me-1" />
                                <span>المفضلة</span>
                            </x-app.responsive-nav-link>

                            <div class="border-t border-gray-200"></div>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-app.responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    <x-icons.logout class=" fill-rose-700 w-4 me-1.5 ms-1" />

                                    <span class=""> تسجيل الخروج </span>
                                </x-app.responsive-nav-link>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ms-6 ">
                @auth
                    <x-app.dropdown align="left" width="48">
                        <x-slot name="trigger">
                            {{-- <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-transparent hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div class="me-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div>{{ Auth::user()->name }}</div>


                            </button> --}}
                            <button class="flex text-sm border-2 rounded-full outline-none border-gray-300 transition">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ asset('img/user.jfif') }}"
                                    alt="{{ Auth::user()->name }}" />
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400 ">
                                إدارة الحساب
                            </div>
                            <x-app.dropdown-link :href="route('profile.edit')">
                                <x-icons.profile class="fill-current w-4 ms-1.5 me-1" />
                                الملف الشخصي
                            </x-app.dropdown-link>
                            <x-app.dropdown-link :href="route('favorite')">
                                <x-icons.heart-user-menu class="fill-current w-4 ms-1.5 me-1" />
                                <span>المفضلة</span>
                            </x-app.dropdown-link>
                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-app.dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <x-icons.logout class=" fill-rose-700 w-4 me-1.5 ms-1" />

                                    <span class=""> تسجيل الخروج </span>
                                </x-app.dropdown-link>
                            </form>
                        </x-slot>
                    </x-app.dropdown>
                @else
                    <div class="flex gap-x-2">
                        <span class="relative inline-flex font-serif">
                            <a href="{{ route('login') }}"
                                class="inline-flex items-center px-3 py-1  leading-6 text-sm shadow rounded-md text-white font-semibold bg-slate-800 transition ease-in-out duration-150 ring-1 ring-slate-900/10 ">
                                <span> تسجيل الدخول</span>
                            </a>
                            <span class="flex absolute h-3 w-3 top-0 right-0 -mt-1 -mr-1">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
                            </span>
                        </span>


                    </div>
                @endauth
            </div>

            <div class="flex gap-x-4 items-stretch px-3  flex-grow">
                <livewire:search-bar />

                <x-app.nav-link :href="route('home')" :active="request()->routeIs('home')" class=" px-3">
                    <x-icons.home class="h-6" />
                </x-app.nav-link>
                <div class="h-full">
                    {{-- <x-app.nav-link :href="route('home')" :active="request()->routeIs('home')" class="min-h-full">
                        <x-icons.home class="w-6 mx-3" />
                    </x-app.nav-link> --}}


                </div>

            </div>
            <div class="flex h-full">
                <!-- Logo -->
                <div class="hidden space-x-8 sm:-my-px sm:me-10 sm:flex">
                    <x-app.nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        لوحة التحكم
                    </x-app.nav-link>

                </div>
                <div class=" space-x-8 sm:-my-px sm:me-10 flex">

                    <x-app.nav-link :href="route('cart')" :active="request()->routeIs('cart')">
                        <div class="flex min-h-full font-roboto items-center justify-center">
                            <div class="relative scale-75">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-8 fill-none text-gray-900">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                </svg>

                                @if ($count > 0)
                                    <span
                                        class="absolute -top-2 left-4 pt-px  rounded-full bg-red-600 size-6 inline-flex items-center justify-center  text-red-50">
                                        {{ $count }}</span>
                                @endif
                            </div>
                        </div>

                    </x-app.nav-link>
                </div>
                <div class="shrink-0 max-h-16 py-1 flex items-center">
                    <a href="/">
                        <x-app.application-logo class="h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->

            </div>

            <!-- Settings Dropdown -->



        </div>
    </div>

    <!-- Responsive Navigation Menu -->

</nav>
