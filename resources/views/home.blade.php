<x-app-layout>
    <div id="hero" class=" overflow-x-hidden mb-2 ">
        <img src="{{ asset('img/hero.jpg') }}" class="float-end" alt="">

    </div>
   

    <div class="text-center">
        <h2 class="text-5xl font-bold">المنتجات المميزة</h2>
        <p>مجموعة تصاميم حديثة</p>
    </div>



    <div id="banner" class="banner" style="background-image: url({{ asset('img/banner/b2.jpg') }})">
        <h4>الخدمات</h4>
        <h2>خصم يصل الى<span> 50%</span> على جميع القمصان والاكسسوارات</h2>
        <button onclick="location.url('/shop')" class="normal"> المزيد </button>
    </div>

    <div class="flex flex-col items-center md:px-6 md:flex-row md:justify-evenly flex-wrap">
        @foreach ($products as $product)
            @livewire('card', ['product' => $product], key($product->id))
            {{-- <livewire:card :product="$product" :key="$product->id" /> --}}
        @endforeach
    </div> 

    {{-- <x-product.container :products="$products"/> --}}



</x-app-layout>
