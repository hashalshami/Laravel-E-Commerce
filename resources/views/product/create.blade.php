@extends('layouts.product')

@section('content')
    <div x-data="{ openTab: 1 }" class="px-4  w-full sm:max-w-xl mx-auto">


        <div class=" mb-4 flex gap-x-2 justify-evenly space-x-4 p-2 bg-white rounded-lg shadow-md">
            <button x-on:click="openTab = 1" :class="{ 'bg-blue-600 text-white': openTab === 1 }"
                class="flex-1 py-2 whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                معلومات المنتج
            </button>
            <button x-on:click="openTab = 2" :class="{ 'bg-blue-600 text-white': openTab === 2 }"
                class="flex-1 py-2 whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                صور المنتج
            </button>

        </div>

        <form method="POST" action="{{ route('pro.store') }}">
            @csrf
            <div x-show="openTab === 1">
                <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-r-4 border-blue-600">
                    {{-- <x-form.input-text name="pro_name" text=" اسم المنتج" /> --}}
                    <div class="mt-3">
                        {{-- <x-form.label name="pro_name" text=" اسم المنتج" /> --}}
                        {{-- <x-form.input name="pro_name" text=" اسم المنتج" autofocus /> --}}
                        <x-form.float-input name="pro_name" text=" اسم المنتج" autofocus />
                    </div>

                    <div class="mt-3">
                        <x-form.label name="description" text=" وصف المنتج" />


                        <textarea name="description" id="description"
                            class="w-full  max-w-lg rounded-lg border border-slate-200 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40"
                            rows="4"></textarea>

                        <x-app.input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>


                    <div class="mt-3 flex items-center gap-4">
                        <x-form.label name="category" text="القسم" />

                        <select dir="ltr" name="category"
                            class="text-right w-full  ring-0  rounded-md border py-1.5 text-gray-900 shadow-sm   "
                            id="category">
                            <option selected value="">القسم</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                            @endforeach
                        </select>
                        <x-app.input-error :messages="$errors->get('category')" class="mt-2" />

                    </div>
                    <div class="mt-3 flex items-center gap-4">
                        <x-form.label name="stock" text="الكمية" />
                        <input value="1" type="number" name="stock" id="stock"
                            class="w-full ring-0  rounded-md border border-slate-200 leading-6 px-2 py-1 hover:border-blue-500 focus:outline-none focus:ring focus:ring-blue-500/40 active:ring active:ring-blue-500/40">
                        <x-app.input-error :messages="$errors->get('stock')" class="mt-2" />

                    </div>

                </div>
            </div>
            <div x-show="openTab === 2">
                <div class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-r-4 border-blue-600">

               <div x-data="{ photoName: null, photoPreview: '{{ asset('img/empty.png') }}' }" class="col-span-6 sm:col-span-4">
    <!-- Profile Photo File Input -->
    <input type="file" name="image" id="photo" class="hidden" wire:model.live="photo" x-ref="photo"
        x-on:change="
            photoName = $refs.photo.files[0].name;
            const reader = new FileReader();
            reader.onload = (e) => {
                photoPreview = e.target.result;
            };
            reader.readAsDataURL($refs.photo.files[0]);
        " />
    
    <label for="photo" class="block font-medium text-sm text-gray-700">photo</label>

    <!-- New Profile Photo Preview -->
    <div class="mt-2">
        <span x-on:click.prevent="$refs.photo.click()" class="block rounded-md w-20 h-20 bg-cover bg-no-repeat bg-center"
            x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
        </span>
    </div>

    <button x-on:click.prevent="$refs.photo.click()" type="button"
        class="mt-2 me-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
        اختر الصورة
    </button>
</div>




                </div>
            </div>

            <div class="hidden mt-4  gap-x-2 justify-evenly space-x-4 p-2 bg-blue-600 rounded-lg shadow-md">
                <button type="button" x-show="openTab === 1" x-on:click="openTab = 2"
                    :class="{ 'bg-blue-600 text-white': openTab === 1 }"
                    class="flex-1 py-2 whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                    التالي
                </button>
                 <button type="button" x-show="openTab === 2" x-on:click="openTab = 1"
                    :class="{ 'bg-blue-600 text-white': openTab === 2 }"
                    class="flex-1 py-2 whitespace-nowrap text-center px-4 rounded-md focus:outline-none focus:shadow-outline-blue transition-all duration-300">
                    السابق
                </button>


            </div>



            <x-app.submit-button class="mt-4 w-full py-1 mx-1 ">
                {{ __('دخول') }}
            </x-app.submit-button>

        </form>



    </div>






    <div class="container mx-auto bg-white">






        <div class="row g-2 mb-3">
            <div class="col-md  needs-validation " novalidate>


            </div>
            <div class="col-md needs-validation " novalidate>
                <div class="input-group  text-center ">


                </div>

            </div>
        </div>
        <div class="input-group mb-3  needs-validation" novalidate>
            <span class="input-group-text" id="basic-addon1">السعر</span>

            <input type="text" name="price" class="form-control  @error('price')  is-invalid @enderror"
                value="{{ old('price') }}" autocomplete="price" placeholder=" سعر المنتج بالريال اليمني ...    "
                aria-label=" سعر المنتج بالريال اليمني    " aria-describedby="basic-addon1">
            @error('price')
                <div class="invalid-feedback ">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="row  row-cols-2 mb-3">
            <div class="col">
                <div class="mb-3">
                    <div class=" ">
                        <label class="input-group-text" for="formFile">اختر صورة المنتج</label>
                        <input style="display: none" name="image" onchange="loadImage(event);" type="file"
                            id="formFile" accept="image/*" class="form-control  @error('image') is-invalid @enderror">
                    </div>
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="row g-2  mb-3">

                    <div class="col-md mb-3">
                        <label for="exampleColorInput" class="form-label"> اختر لون المنتج</label>
                        <input type="color" name="color" class="form-control form-control-color"
                            id="exampleColorInput" value="#563d7c" title="اختر لون المنتج">
                        @error('color')
                            <div class="form-text error">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>
            </div>
            <div class="col ">
                <img src="{{ asset('img/empty.png') }}" id="imgBox" style="max-height: 300px"
                    class=" img-fluid rounded" alt="...">
            </div>

        </div>








        <button class="form-btn submit" type="submit">اضافة المنتج</button>
        </form>
    </div>

    <script>
        let boxImg = document.getElementById("imgBox");

        function loadImage(event) {

            const imageUrl = URL.createObjectURL(event.target.files[0]);
            boxImg.setAttribute("src", `${imageUrl}`);

        }
    </script>
@endsection
