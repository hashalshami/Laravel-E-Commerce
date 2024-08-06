@extends('layouts.app')

@section('content')
    <div class="product-container">
        @foreach ($products as $product)
            @livewire('card', ['product' => $product], key($product->id))
        @endforeach
    </div>
@endsection
