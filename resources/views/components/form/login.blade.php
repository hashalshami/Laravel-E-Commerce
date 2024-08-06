<!-- Session Status -->
<x-app.auth-session-status class="mb-4" :status="session('status')" />

<div class="w-full">
    <div class="text-center">
        <h1 class="text-3xl font-semibold text-gray-900">تسجيل الدخول</h1>
        {{-- <p class="mt-2 text-gray-500">Sign in below to access your account</p> --}}
    </div>
    <div class="mt-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf



            <x-form.input-line name="email" type="email" autofocus autocomplete="username">
                البريد الإلكتروني
            </x-form.input-line>
            {{--  --}}
            <x-form.input-line name="password" type="password" autocomplete="current-password">
                كلمة
                السر
            </x-form.input-line>


            <div class="flex items-center justify-between  my-6 px-1">
                <label for="remember_me" class="inline-flex items-center">
                    <span class="ml-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                </label>
                <div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="block mt-3 text-center underline font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">
                            هل نسيت كلمة السر؟
                        </a>
                    @endif
                </div>
            </div>


            <div class="my-6">
                <button type="submit"
                    class="w-full rounded-md bg-gray-800 px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">

                    دخول</button>
            </div>
            @if (Route::has('register'))
                <p class="text-center text-sm text-gray-500">لا تملك حساباً حتى الآن؟
                    <a href="{{ route('register') }}"
                        class="underline font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">

                        إنشاء حساب</a>.
                </p>
            @endif

        </form>
    </div>
</div>
