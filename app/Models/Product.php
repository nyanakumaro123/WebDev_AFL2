<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_image',
        'product_description',
        'product_size',
        'product_color',
        'product_price',
        'product_quantity',
        'category_id',
        'brand_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function getImagePath($color)
    {
        if (!$this->category || !$this->brand) {
            return asset($this->product_image);
        }

        $categoryNameFormatted = str_replace(' ', '_', ucwords($this->category->category_name));
        $brandName = $this->brand->brand_name;
        $imageColor = ucfirst($color);

        $imagePath = "image/{$categoryNameFormatted}_{$brandName}_{$imageColor}.png";

        // Handle exceptions
        if ($brandName === 'Addidas' && $categoryNameFormatted === 'T_Shirt' && $imageColor === 'White') {
            $imagePath = 'image/T_Shirt-Addidas_White.png';
        }
        if ($brandName === 'Nike' && $categoryNameFormatted === 'Long_Pants' && $imageColor === 'Black') {
            $imagePath = 'image/Long_Pants_Nike_Black.png';
        }

        if (file_exists(public_path($imagePath))) {
            return asset($imagePath);
        }
        
        // Fallback for cases where the requested color doesn't exist but the other does
        if ($imageColor === 'Black') {
            $otherColorPath = str_replace('_Black.png', '_White.png', $imagePath);
            if ($brandName === 'Addidas' && $categoryNameFormatted === 'T_Shirt') {
                $otherColorPath = 'image/T_Shirt-Addidas_White.png';
            }
             if (file_exists(public_path($otherColorPath))) {
                return asset($otherColorPath);
            }
        }

        return asset($this->product_image); // Default fallback
    }

    public function getInitialImageAttribute()
    {
        return $this->getImagePath('Black');
    }

    public function getBlackImagePathAttribute()
    {
        return $this->getImagePath('Black');
    }

    public function getWhiteImagePathAttribute()
    {
        return $this->getImagePath('White');
    }
}