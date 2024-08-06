@extends('layouts.app')
@section('title', 'قسم جديد ')
@section('style')
    <link rel="stylesheet" href="/css/form.css">
@endsection
@section('content')
    <div class="form-container">
        <div class="form-cart">
            <h1 class="form-title">تعديل القسم <br>
                {{ $category->cat_name }} </h1>
            <form action="{{ route('cat.update', $category) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="input-box">
                    <label for="cat_name" class="form-label">الاسم </label>
                    <div class="input-txt">
                        <input type="text" name="cat_name" value="{{ $category->cat_name }}" id="cat_name"
                            placeholder=" اسم القسم" required>

                    </div>
                </div>
                <div class="input-box center-item">
                    <label for="cat_image" class="normal"> تحديث صورة </label>
                    <div id="imgBox">
                        <img src="{{ asset('storage/' . $category->cat_image) }}" alt="لايوجد صورة">
                    </div>
                    <input type="file" name="cat_image" id="cat_image" accept="image/*" onchange="loadImage(event);"
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
