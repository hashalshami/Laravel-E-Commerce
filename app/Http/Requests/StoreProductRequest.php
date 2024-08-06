<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pro_name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'category' => ['required', 'exists:categories,id'],
            'image' =>  ['required', 'file', 'extensions:png,jpg,jpeg,webp,bmp,jfif'], // تحقق من الصورة
            'color' => ['required'],
        ];

        
    }
    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'pro_name.required' => 'يرجى ادخال اسم المنتج.',
            'description.required' => 'يرجى ادخال وصف المنتج.',
            'price.required' => 'يرجى ادخال سعر المنتج.',
            'price.numeric' => ' السعر يجب أن يكون رقمًا. ',
            'category.required' => 'يجب تحديد القسم الخاص بالمنتج.',
            'image.required' => 'صورة المنتج مطلوبة.',
            'image.extensions' => 'يجب ان يكون الملف صورة , بإمتداد : png ,jpg ,jpeg',
            'color.required' => 'يرجى اختيار اللون الخاص بالمنتج .',
        ];
    }
}
