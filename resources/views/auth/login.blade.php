<x-guest-layout title="تسجيل الدخول">
    <x-app.auth-session-status class="mb-4" :status="session('status')" />
    <x-slot name="tabs">
        <a href="#"
            class="flex-1 py-2 bg-blue-600 text-white whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
            تسجيل الدخول
        </a>
        <a href="{{ route('register') }}"
            class="flex-1 py-2  whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
            إنشاء حساب
        </a>
    </x-slot>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        {{-- <x-form.input-line name="email" type="email" text="البريد الإلكتروني" autofocus autocomplete="username" /> --}}
        <div class="mt-6">
            <x-form.float-input type="email" name="email" text="البريد الالكتروني" :value="old('email')" autofocus
                autocomplete="username" />
        </div>
        <div class="mt-6">
            <x-form.float-input type="password" name="password" text="كلمة السر " />
        </div>



        {{-- <x-form.input-line name="password" type="password" text="كلمة السر" autocomplete="current-password" /> --}}
        <!-- Password -->


        <div class="flex items-stretch justify-between  my-6 px-1">
            <label class="inline-flex items-center mb-5 cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer">
                <div
                    class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Toggle me</span>
            </label>
            <label for="remember_me" class="inline-flex leading-9 items-center">
                <span class="ml-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            </label>
            <div class="leading-9">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class=" mt-3   text-indigo-600 hover:underline focus:text-gray-800 focus:outline-none">
                        هل نسيت كلمة السر؟
                    </a>
                @endif
            </div>
        </div>


        <x-app.submit-button class="mt-4 w-full py-4 mx-1 ">
            {{ __('دخول') }}
        </x-app.submit-button>


    </form>

</x-guest-layout>
