<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name',
        'brandlogo_image',
        'brand_establishment_date',
        'brand_manufacture_country'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}