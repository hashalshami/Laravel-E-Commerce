<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
use App\Models\User;

/**
 * @method  where(string $string, $id)
 */
class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorites';
    // protected $primaryKey = ['user_id','pro_id'];

    // protected $primaryKey = 'fav_id';
    public $timestamps = false;

    protected $fillable = ['user_id', 'pro_id', 'date'];

    const CREATED_AT = 'date';
    const UPDATED_AT = null;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($favorite) {
            if (!$favorite->date) {
                $favorite->date = now();
            }
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
}
