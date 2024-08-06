 <header x-bind:class="{ '-translate-y-20': !isVisible, 'translate-y-0': isVisible }"
     class="sticky top-0 w-full z-50 bg-white transition-transform duration-500">
     <!-- Primary Navigation Menu -->
     <div class="max-w-7xl mx-auto  ">
         <div class="flex justify-between h-16">
             <!-- Menu Button -->
             <div class="-me-2 flex items-center ">
                 {{-- <button @click="sidebar = ! sidebar"
                     class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                     <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                         <path :class="{ 'hidden': sidebar, 'inline-flex': !sidebar }" class="inline-flex"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M4 6h16M4 12h16M4 18h16" />
                         <path :class="{ 'hidden': !sidebar, 'inline-flex': sidebar }" class="hidden"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                 </button> --}}
                 <button
                     class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                     type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                     aria-controls="drawer-navigation">
                     <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                         <path :class="{ 'hidden': sidebar, 'inline-flex': !sidebar }" class="inline-flex"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M4 6h16M4 12h16M4 18h16" />
                         <path :class="{ 'hidden': !sidebar, 'inline-flex': sidebar }" class="hidden"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                 </button>
             </div>

             <div class="hidden sm:flex sm:items-center sm:ms-6 ">
                 @auth
                     <x-app.dropdown align="left" width="48">
                         <x-slot name="trigger">

                             <button
                                 class="inline-flex p-2 items-center justify-center text-sm  rounded-full outline-none  transition">

                                 <img class="h-8 w-8 rounded-full object-cover border-2 border-gray-300"
                                     src="{{ asset('img/user.jfif') }}" alt="{{ Auth::user()->name }}" />
                             </button>
                         </x-slot>

                         <x-slot name="content">
                             <!-- Account Management -->
                             <div class="block px-4 py-2 text-xs text-gray-400 ">
                                 {{ Auth::user()->name }}
                             </div>
                             <div class="block px-4 py-2 text-xs text-gray-400 ">
                                 إدارة الحساب
                             </div>
                             <x-app.dropdown-link  wire:navigate :href="route('profile.edit')">
                                 <x-icons.profile class="fill-current w-4 ms-1.5 me-1" />
                                 الملف الشخصي
                             </x-app.dropdown-link>
                             <x-app.dropdown-link  wire:navigate :href="route('favorite')">
                                 <x-icons.heart-user-menu class="fill-current w-4 ms-1.5 me-1" />
                                 <span>المفضلة</span>
                             </x-app.dropdown-link>
                             <div class="border-t border-gray-200"></div>

                             <!-- Authentication -->
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf

                                 <x-app.dropdown-link   wire:navigate :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                     <x-icons.logout class=" fill-rose-700 w-4 me-1.5 ms-1" />

                                     <span class=""> تسجيل الخروج </span>
                                 </x-app.dropdown-link>
                             </form>
                         </x-slot>
                     </x-app.dropdown>
                 @else
                     <span class="">

                     </span>
                     <div class="flex gap-x-2">
                         <span class="relative inline-flex font-serif">
                             <a href="{{ route('login') }}"  wire:navigate
                                 class="inline-flex items-center px-3 py-1  leading-6 text-sm shadow rounded-md text-white font-semibold bg-slate-800 transition ease-in-out duration-150 cursor-pointer ring-1 ring-slate-900/10 ">
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

                 <x-app.nav-link  wire:navigate :href="route('home')" :active="request()->routeIs('home')" class=" px-3">
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
                     <x-app.nav-link  wire:navigate :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                         لوحة التحكم
                     </x-app.nav-link>

                 </div>
                 <div class=" space-x-8 sm:-my-px sm:me-10 flex">

                     <x-app.nav-link  wire:navigate :href="route('cart')" :active="request()->routeIs('cart')">
                         <livewire:cart-count />
                     </x-app.nav-link>
                 </div>
                 <div class="shrink-0 max-h-16 py-1 flex items-center">
                     <a href="/">
                         <x-app.application-logo class="h-9" />
                     </a>
                 </div>

                 <!-- Navigation Links -->

             </div>





         </div>
     </div>

     <!-- Responsive Navigation Menu -->

 </header>



 <!-- drawer component -->
 <div id="drawer-navigation"
     class="fixed top-16 right-0 z-[150] w-64 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800"
     tabindex="-1" aria-labelledby="drawer-navigation-label">
     <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu
     </h5>
     <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
         class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 end-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
         <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
             <path fill-rule="evenodd"
                 d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                 clip-rule="evenodd"></path>
         </svg>
         <span class="sr-only">Close menu</span>
     </button>
     <div class="py-4 overflow-y-auto z-[151]">
         <ul class="space-y-2 font-medium">
             <li>
                 <a href="#"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                         <path
                             d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                         <path
                             d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                     </svg>
                     <span class="ms-3">Dashboard</span>
                 </a>
             </li>
             <li>
                 <a href="#"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                         <path
                             d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Kanban</span>
                     <span
                         class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span>
                 </a>
             </li>
             <li>
                 <a href="#"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                         <path
                             d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Inbox</span>
                     <span
                         class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                 </a>
             </li>
             <li>
                 <a href="#"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 18">
                         <path
                             d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                 </a>
             </li>
             <li>
                 <a href="#"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 18 20">
                         <path
                             d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                 </a>
             </li>
             <li>
                 <a href="#"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Sign In</span>
                 </a>
             </li>
             <li>
                 <a href="#"
                     class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                     <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                         <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                         <path
                             d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                         <path
                             d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                     </svg>
                     <span class="flex-1 ms-3 whitespace-nowrap">Sign Up</span>
                 </a>
             </li>
         </ul>
     </div>
 </div>
