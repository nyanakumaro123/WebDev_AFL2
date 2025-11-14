<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['product_name', 'product_image', 'product_size', 'product_color', 'product_price', 'quantity', 'category_id', 'brand_id'];

    public function brand(): BelongsTo {
        return $this->belongsTo(Brand::class);
    }

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function reviews(): HasMany {
        return $this->hasMany(Review::class);
    }

    public function transactions(): BelongsToMany {
        return $this->belongsToMany(Transaction::class)
        ->withTimestamps();
    }

    public function users(): BelongsToMany {
        return $this->belongsToMany(User::class)
        ->withTimestamps();
    }
}
