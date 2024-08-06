 <form method="POST" action="{{ route('register') }}">
     @csrf

     <!-- Name -->
     <div>
         <x-app.input-label for="name" :value="__('الاسم')" />
         <x-app.text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
             autofocus autocomplete="name" />
         <x-app.input-error :messages="$errors->get('name')" class="mt-2" />
     </div>

     <!-- Email Address -->
     <div class="mt-4">
         <x-app.input-label for="email" :value="__('البريد الإلكتروني')" />
         <x-app.text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
             required autocomplete="username" />
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
