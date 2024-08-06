<div x-data="{ openTab: 1 }" class="max-w-md mx-auto">
    <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
        <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1 }"
            class="flex-1 py-2 text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
            تسجيل الدخول
        </button>
        <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2 }"
            class="flex-1 py-2 text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
            إنشاء حساب
        </button>
    </div>

    <div x-show="openTab === 1"
        class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-r-4 border-blue-600">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-form.input-line name="email" type="email" autofocus autocomplete="username">
                البريد الإلكتروني
            </x-form.input-line>

            <x-form.input-line name="password" type="password" autocomplete="current-password">
                كلمة السر
            </x-form.input-line>

            <div class="flex items-center justify-between my-6 px-1">
                <label for="remember_me" class="inline-flex items-center">
                    <span class="ml-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="block mt-3 text-center underline font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">
                        هل نسيت كلمة السر؟
                    </a>
                @endif
            </div>

            <div class="my-6">
                <button type="submit"
                    class="w-full rounded-md bg-gray-800 px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">
                    دخول
                </button>
            </div>

            @if (Route::has('register'))
                <p class="text-center text-sm text-gray-500">
                    لا تملك حساباً حتى الآن؟
                    <a href="{{ route('register') }}"
                        class="underline font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">
                        إنشاء حساب
                    </a>.
                </p>
            @endif
        </form>
    </div>

    <div x-show="openTab === 2"
        class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
        <h2 class="text-2xl font-semibold mb-2 text-blue-600">Section 2 Content</h2>
        <p class="text-gray-700">Proin non velit ac purus malesuada venenatis sit amet eget lacus. Morbi quis purus id
            ipsum ultrices aliquet Morbi quis.</p>
    </div>

    <div x-show="openTab === 3"
        class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-blue-600">
        <h2 class="text-2xl font-semibold mb-2 text-blue-600">Section 3 Content</h2>
        <p class="text-gray-700">Fusce hendrerit urna vel tortor luctus, nec tristique odio tincidunt. Vestibulum ante
            ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
    </div>
</div>
