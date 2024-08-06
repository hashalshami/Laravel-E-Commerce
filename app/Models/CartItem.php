<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
use App\Models\Cart;


/**
 * @method static where(string $string, $id)
 */

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_items';

    protected $fillable = ['cart_id', 'pro_id', 'quantity'];

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
}
