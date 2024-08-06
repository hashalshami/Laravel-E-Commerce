<div :class="{'bg-opacity-50 bg-gray-800': sidebar,'pointer-events-none bg-opacity-0': !sidebar}"
     class="fixed z-[49] top-16 inset-x-0 transition-all duration-500 bottom-0    " x-on:click="sidebar = ! sidebar">
     <div @click.stop 
     :class="{'w-2/3': sidebar}"
      class="overflow-x-hidden border-t border-gray-600 transition-all duration-500 bg-white w-0  h-full " >
         <div class="pt-2 pb-3 whitespace-nowrap space-y-1">
             <x-app.responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                 لوحة المعلومات
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
 </div>