<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CartItem;
use App\Models\Product;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';

    protected $fillable = ['pro_id', 'quantity', 'session_id', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cart) {
            // ضبط session_id بشكل تلقائي
            $cart->session_id = session()->getId();
            // ضبط user_id بشكل تلقائي إذا كان المستخدم مسجل الدخول
            $cart->user_id = auth()->check() ? auth()->id() : null;
        });
    }
    
    
    
}
