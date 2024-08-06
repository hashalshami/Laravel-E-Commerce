@extends('layouts.app')
@section('title', 'add product')
@section('style')
    <link rel="stylesheet" href="/css/form.css">
@endsection
@section('content')
    <div class="form-container">
        <div class="form-cart">
            <h1 class="form-title"> تعديل المنتج <br>
                {{-- {{ $product->name }} --}}
            </h1>
            <form action="{{ route('pro.update', $product) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="input-box">
                    <label for="pro_name" class="form-label">اسم المنتج</label>
                    <div class="input-txt">

                        <input type="text" value="{{ $product->name }}" name="pro_name" id="pro_name"
                            placeholder=" اسم المنتج">
                    </div>
                </div>
                <div class="input-box">
                    <label for="description" class="form-label">وصف المنتج</label>
                    <div class="input-txt">

                        <input type="text" value="{{ $product->description }}" name="description" id="description"
                            placeholder="وصف المنتج">
                    </div>
                </div>
                <div class="input-box">
                    <label for="price" class="form-label">سعر المنتج</label>
                    <div class="input-txt">

                        <input type="text" value="{{ $product->price }}" name="price" id="price"
                            placeholder=" السعر ">
                    </div>
                </div>
                <div class="input-box">
                    <label for="catigory" class="form-label">الفئة</label>
                    <div class="input-txt">

                        <select name="category" id="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->cat_id }}"
                                    {{ $category->cat_id == $product->cat_id ? 'selected' : '' }}>
                                    {{ $category->cat_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="input-box">
                    <label for="quantity" class="form-label">الكمية </label>
                    <div class="input-txt">

                        <input type="number" name="quantity" id="quantity" min="1"
                            value="{{ $product->quantity }}">
                    </div>
                </div>
                <div class="input-box center-item">
                    <label for="image" class="normal"> تحديث صورة </label>
                    <div id="imgBox">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="لايوجد صورة">
                    </div>
                    <input type="file" name="image" id="image" accept="image/*" onchange="loadImage(event);"
                        style="display: none">

                    <script>
                        let boxImg = document.querySelector("#imgBox img");
                        // عند تحميل الصورة
                        function loadImage(event) {
                            // event.target.files[0]
                            // هذا يمثل الملف الأول الذي تم اختياره من قبل المستخدم
                            //
                            // URL.createObjectURL()
                            // هذا هو الجزء الرئيسي من الكود، حيث يقوم بإنشاء عنوان URL فريد
                            const imageUrl = URL.createObjectURL(event.target.files[0]);
                            boxImg.setAttribute("src", `${imageUrl}`);

                        }
                    </script>
                </div>
                <button class="form-btn submit" type="submit"> حفظ </button>
            </form>
        </div>
    </div>

@endsection
