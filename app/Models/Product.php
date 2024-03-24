<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;



    protected $fillable = [
        'categories_code', 'external_id', 'name', 'article', 'description',
        'url', 'main_image', 'price', 'wholesale_price', 'currency',
        'weight', 'length', 'height', 'width', 'unit'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_code', 'code');
    }

    public function characteristics()
    {
        return $this->hasMany(ProductCharacteristic::class);
    }
}
