<?php
// product
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Image;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, $id)
 */

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'stock', 'cat_id'];
    // protected $primaryKey = 'pro_id';




    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function firstPath()
    {
        return $this->images->first();
    }
    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('pro_name', 'like', '%' . $searchTerm . '%');
    }

    public function images(): HasMany
    {
        return $this->HasMany(Image::class, 'pro_id');
    }
    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class, 'pro_id');
    }

    public function favorites(): BelongsToMany
    {
        return $this->belongsToMany(\App\Models\User::class, \App\Models\Favorite::class, 'pro_id', 'user_id');
    }

    public function isFavoritedBy($id)
    {
        return $this->favorites()->where('user_id', $id)->exists();
    }
}
