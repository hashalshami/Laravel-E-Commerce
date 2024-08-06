<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Models\Product;
use App\Livewire\Product\Show;
use App\Livewire\Page\Home;
use App\Livewire\Page\Cart;

// Route::get('/',Home::class)->name('home');
Route::get('/cart',Cart::class)->name('cart');

Route::get('/',function(){
    $products = Product::all()->lazy();
    return view('home', ['products' => $products]);
})->name('home');

Route::get('/test', function () {
    $products = Product::all()->lazy();
    return view('test', ['products' => $products]);
})->name('test');
Route::get('/product/show/{id}', Show::class)->name('pro.show');


Route::controller(ImageController::class)->group(function () {
    Route::get('/product/{product}/create/image', 'create')->name('pro.image.create');
    Route::post('/product/image/store', 'store')->name('pro.image.store');
});


Route::controller(ProductController::class)->group(function () {
    Route::get('/product/create', 'create')->name('pro.create');
    Route::post('/product/store', 'store')->name('pro.store');

    // Route::get('/product/overview/{product}', 'show')->name('pro.show');

    Route::get('/product/{product}/edit', 'edit')->name('pro.edit');
    Route::put('/product/{product}/update', 'update')->name('pro.update');
    Route::delete('/product/{product}/destroy', 'destroy')->name('pro.delete');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('cat');
    Route::get('/category/create', 'create')->name('cat.create');
    Route::get('/category/{category}/edit', 'edit')->name('cat.edit');
    Route::post('/category/store', 'store')->name('cat.store');
    Route::put('/category/{category}/update', 'update')->name('cat.update');
    Route::delete('/category/{id}/destroy', 'destroy')->name('cat.delete');
});


// require __DIR__.'/app.php';
