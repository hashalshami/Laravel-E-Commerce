@extends('layouts.app')
@section('title')
    {{ $category->cat_name }}
@endsection

@section('content')
    <h1 style="text-align: center"> {{ $category->cat_name }}</h1>
    <div class="product-container">
        @if (count($products) > 0)
            @foreach ($products as $pro)
                <x-product :product="$pro" />
            @endforeach
        @else
            <h2 style="text-align: center">
                لاتوجد منتجات لهذا القسم
            </h2>
        @endif
    </div>
@endsection
