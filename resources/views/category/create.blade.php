@extends('layouts.app')

@section('form')
    <div class="form-container">
        <div class="form-cart">
            <h1 class="form-title">اضافة قسم جديد</h1>
            <form action="{{ route('cat.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-box">
                    <label for="cat_name" class="form-label">الاسم</label>
                    <div class="input-txt">
                        <input type="text" name="cat_name" id="cat_name" placeholder=" اسم القسم" required>

                    </div>
                </div>
                <div class="input-box center-item">
                    <label for="cat_image" class="normal"> رفع صورة </label>
                    <div id="imgBox">
                        <img src="" alt="لايوجد صورة">
                    </div>
                    <input type="file" name="cat_image" id="cat_image" required accept="image/*"
                        onchange="loadImage(event);" style="display: none">

                    <script>
                        const boxImg = document.querySelector("#imgBox img");

                        function loadImage(event) {

                            const imageUrl = URL.createObjectURL(event.target.files[0]);
                            boxImg.setAttribute("src", `${imageUrl}`);

                        }
                    </script>
                </div>
                <button class="form-btn submit" type="submit">اضافة القسم</button>

            </form>
        </div>
    </div>
@endsection
