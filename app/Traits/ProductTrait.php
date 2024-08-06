<?php

namespace App\Traits;

use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Carbon;

trait ProductTrait
{
    public function UploadImage($file,$color, $id)
    {
        // الحصول على المنتج باستخدام المعرف (ID)
        $product = Product::find($id);

        if (!$product) {
            throw new \Exception('Product not found');
        }

        $timestamp = Carbon::now()->format('Ymd_His');

        $extension = $file->getClientOriginalExtension();

        $name = $timestamp . '_' . uniqid() . '.' . $extension;

        $path = $file->storeAs($id, $name, 'product');

        Image::create([
            'path' => $path,
            'color' => $color,
            'pro_id'=>$id
        ]);

        // return $path;
    }
}
