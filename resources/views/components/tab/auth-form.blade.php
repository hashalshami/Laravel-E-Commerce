 <div x-data="{ openTab: {{ $tab }} }" class="px-4  w-full sm:max-w-xl mx-auto">


     <div class=" mb-4 flex gap-x-2 justify-evenly space-x-4 p-2 bg-white rounded-lg shadow-md">
         <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1 }"
             class="flex-1 py-2 whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
             تسجيل الدخول
         </button>
         <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2 }"
             class="flex-1 py-2 whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
             إنشاء حساب
         </button>

     </div>

     <div x-show="openTab === 1"
         class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-r-4 border-blue-600">
         <h2 class="text-2xl font-semibold mb-2 text-blue-700">تسجيل الدخول</h2>

         <form method="POST" action="{{ route('login') }}">
             @csrf
             {{-- <x-form.input-line name="email" type="email" text="البريد الإلكتروني" autofocus autocomplete="username" /> --}}
            <div class="mt-6">
                <x-form.float-input   type="email" name="email" text="البريد الالكتروني"  :value="old('email')" autofocus autocomplete="username"  />
            </div>
            <div class="mt-6">
                <x-form.float-input   type="password" name="password" text="كلمة السر "  />
            </div>
             


             {{-- <x-form.input-line name="password" type="password" text="كلمة السر" autocomplete="current-password" /> --}}
             <!-- Password -->
             

             <div class="flex items-stretch justify-between  my-6 px-1">
                 <label for="remember_me" class="inline-flex leading-9 items-center">
                     <span class="ml-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                     <input id="remember_me" type="checkbox"
                         class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                         name="remember">
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
         <form class="hidden" method="POST" action="{{ route('login') }}">
             @csrf




             <!-- Remember Me -->
             <div class="flex justify-between items-center mt-4">
                 <label for="remember_me" class="inline-flex items-center">
                     <span class="mr-2 text-sm text-gray-600"> تذكرني </span>

                     <input id="remember_me" type="checkbox"
                         class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                         name="remember">
                 </label>
                 @if (Route::has('password.request'))
                     <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                         href="{{ route('password.request') }}">
                         {{ __('Forgot your password?') }}
                     </a>
                 @endif
             </div>

             <div class="flex items-center justify-end mt-4">


                 <x-app.primary-button class="ms-3">
                     {{ __('Log in') }}
                 </x-app.primary-button>
             </div>
         </form>

     </div>

     <div x-show="openTab === 2"
         class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-r-4 border-blue-600">
         <h2 class="text-xl font-semibold mb-2 text-blue-700"> إنشاء حساب </h2>
         <form method="POST" action="{{ route('register') }}">
             @csrf

             <!-- Name -->
             <div>
                 <x-app.input-label for="name" :value="__('الاسم')" />
                 <x-app.text-input id="name" class="block mt-1 w-full" type="text" name="name"
                     :value="old('name')" required autofocus autocomplete="name" />
                 <x-app.input-error :messages="$errors->get('name')" class="mt-2" />
             </div>

             <!-- Email Address -->
             <div class="mt-4">
                 <x-app.input-label for="email" :value="__('البريد الإلكتروني')" />
                 <x-app.text-input id="email" class="block mt-1 w-full" type="email" name="email"
                     :value="old('email')" required autocomplete="username" />
                 <x-app.input-error :messages="$errors->get('email')" class="mt-2" />
             </div>

             <!-- Password -->
             <div class="mt-4">
                 <x-app.input-label for="password" :value="__('كلمة السر')" />

                 <x-app.text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                     autocomplete="new-password" />

                 <x-app.input-error :messages="$errors->get('password')" class="mt-2" />
             </div>

             <!-- Confirm Password -->
             <div class="mt-4">
                 <x-app.input-label for="password_confirmation" :value="__('إعادة كتابة كلمة السر')" />

                 <x-app.text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                     name="password_confirmation" required autocomplete="new-password" />

                 <x-app.input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
             </div>
             <x-app.submit-button class="mt-4 w-full py-1 mx-1 ">
                 {{ __('تسجيل') }}
             </x-app.submit-button>
             <div class="text-center mt-4">
                 <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                     href="{{ route('login') }}">
                     {{ __('هل لديك حساب ؟') }}
                 </a>
             </div>
         </form>
     </div>
 </div>
