<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
  
class AppController extends Controller
{
    public function home() {
        $products =Product::get();
        return view('home',['products'=>$products]);
    }
}
