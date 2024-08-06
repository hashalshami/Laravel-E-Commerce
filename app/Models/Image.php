<?php
// image
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $fillable = ['path', 'color', 'pro_id'];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, "pro_id");
    }
}
