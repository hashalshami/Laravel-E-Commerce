@extends('layouts.form')

@section('content')
        <div class="mb-3 d-flex align-self-start">
           @foreach($product->images as $item)
                <div style="margin-inline: 10px" class="p-2">
                     <img  src="{{asset('product/'.$item->path)}}" style="max-height: 150px" alt="">
                     <div style="height: 10px;background-color: {{$item->color}}"></div>
                </div>
           @endforeach
        </div>
    <div class="form-box">
        <h2 class="form-title">اضافة الصور </h2>
        <form action="{{ route('pro.image.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row  row-cols-2 mb-3">
                <div class="col">
                    <div class="mb-3">
                        <div class=" ">
                            <label class="input-group-text" for="formFile">اختر صورة المنتج</label>
                            <input style="display: none" name="image" onchange="loadImage(event);" type="file"
                                id="formFile" accept="image/*"
                                class="form-control rtl @error('image') is-invalid @enderror">
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

            <input type="hidden" name="pro_id" value="{{ $product->id }}">
            <button class="form-btn submit" type="submit">اضافة الصورة</button>
        </form>
        <script>
            let boxImg = document.getElementById("imgBox");

            function loadImage(event) {

                const imageUrl = URL.createObjectURL(event.target.files[0]);
                boxImg.setAttribute("src", `${imageUrl}`);

            }
        </script>
    </div>
@endsection
