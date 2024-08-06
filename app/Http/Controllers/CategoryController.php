<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('cat_image');
        // $name=time().'_'.$file->
        $name = $request->file('cat_image')->store('', 'category');
        $path = 'category/' . basename($name);
        return $path;
    }
}
