<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class, 'user_id');
    }
    public function hasCart(): bool
    {
        return $this->cart()->exists();
    }
    public function cartItems()
    {
        return $this->hasManyThrough(CartItem::class, Cart::class, 'user_id', 'cart_id');
    }


    public function favorites()
    {
        // return $this->hasMany(Favorite::class,'user_id');
        return $this->belongsToMany(Product::class, 'favorites', 'user_id', 'pro_id');
    }

    public function isFavoritedTo()
    {
        return $this->favorites()->get();
    }
}
