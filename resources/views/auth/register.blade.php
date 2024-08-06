<x-guest-layout title="إنشاء حساب">
    <x-app.auth-session-status class="mb-4" :status="session('status')" />
    <x-slot name="tabs">
        <a href="{{ route('login') }}"
            class="flex-1 py-2 whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
            تسجيل الدخول
        </a>
        <a href="#"
            class="flex-1 py-2 bg-blue-600 text-white whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
            إنشاء حساب
        </a>
    </x-slot>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mt-3">
            <x-form.float-input type="text" name="name" text="الاسم " :value="old('name')" autofocus
                autocomplete="name" />

        </div>
        <div class="mt-6">
            <x-form.float-input type="email" name="email" text="البريد الالكتروني" :value="old('email')" 
                autocomplete="username" />

        </div>
        <div class="mt-6">
            <x-form.float-input type="password" name="password" text="كلمة السر "  autocomplete="new-password" />
        </div>
        <div class="mt-6">
            <x-form.float-input type="password" name="password_confirmation" text="  إعادة كتابة كلمة السر  "  autocomplete="new-password" />
        </div>


        <!-- Email Address -->


        <!-- Password -->
        

        <!-- Confirm Password -->
      
        <x-app.submit-button class="mt-4 w-full py-4 mx-1 ">
            {{ __('تسجيل') }}
        </x-app.submit-button>
       
    </form>

</x-guest-layout>
