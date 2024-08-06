<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                معلومات الملف الشخصي
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                قم بتحديث معلومات الملف الشخصي لحسابك وعنوان البريد الإلكتروني.
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div>
                                <x-app.input-label for="name" :value="__('Name')" />
                                <x-app.text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-app.input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-app.input-label for="email" :value="__('Email')" />
                                <x-app.text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $user->email)" required autocomplete="username" />
                                <x-app.input-error class="mt-2" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                           لم يتم التحقق من عنوان بريدك الإلكتروني.

                                            <button form="send-verification"
                                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                               انقر هنا لإعادة إرسال رسالة التحقق عبر البريد الإلكتروني.
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center gap-4">
                                <x-app.primary-button>{{ __('حفظ') }}</x-app.primary-button>

                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">{{ __('تم الحفظ') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                               تحديث كلمة المرور
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                                تأكد من أن حسابك يستخدم كلمة مرور طويلة وعشوائية ليظل آمنًا.
                            </p>
                        </header>

                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-app.input-label for="update_password_current_password" :value="__('Current Password')" />
                                <x-app.text-input id="update_password_current_password" name="current_password"
                                    type="password" class="mt-1 block w-full" autocomplete="current-password" />
                                <x-app.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <div>
                                <x-app.input-label for="update_password_password" :value="__('New Password')" />
                                <x-app.text-input id="update_password_password" name="password" type="password"
                                    class="mt-1 block w-full" autocomplete="new-password" />
                                <x-app.input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-app.input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
                                <x-app.text-input id="update_password_password_confirmation" name="password_confirmation"
                                    type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                <x-app.input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-app.primary-button>حفظ</x-app.primary-button>

                                @if (session('status') === 'password-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600">تم الحفظ</p>
                                @endif
                            </div>
                        </form>
                    </section>

                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                حذف الحساب
                            </h2>

                            <p class="mt-1 text-sm text-gray-600">
                               بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائيًا. قبل حذف حسابك، يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها.
                            </p>
                        </header>

                        <x-app.danger-button x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-app.danger-button>

                        <x-app.modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg font-medium text-gray-900">
                                  هل انت متأكد انك تريد حذف حسابك؟
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                   بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائيًا. الرجاء إدخال كلمة المرور الخاصة بك لتأكيد رغبتك في حذف حسابك نهائيًا.
                                </p>

                                <div class="mt-6">
                                    <x-app.input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                    <x-app.text-input id="password" name="password" type="password"
                                        class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

                                    <x-app.input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-app.secondary-button x-on:click="$dispatch('close')">
                                        الغاء
                                    </x-app.secondary-button>

                                    <x-app.danger-button class="ms-3">
                                        حذف الحساب
                                    </x-app.danger-button>
                                </div>
                            </form>
                        </x-app.modal>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>