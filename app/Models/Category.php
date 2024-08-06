<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['cat_name', 'cat_image'];
    // protected $guarded=[];
    // protected $primaryKey = 'cat_id';
    public $timestamps = false;

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
