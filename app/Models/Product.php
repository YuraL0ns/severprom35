<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

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
    // Получаем страну создателя
    public function bonusMaker()
    {
        return $this->hasMany(ProductCharacteristic::class)->whereIn('name', ['Родина бренда']);
    }
    // Получаем имя бренда
    public function bonusBrand()
    {
        return $this->hasMany(ProductCharacteristic::class)->whereIn('name', ['Производитель']);
    }
    // Получаем Размер объекта
    public function bonusSize()
    {
        return $this->hasMany(ProductCharacteristic::class)->whereIn('name', ['Габариты, мм']);
    }
    // Получаем размер коробки объекта
    public function bonusBoxSize()
    {
        return $this->hasMany(ProductCharacteristic::class)->whereIn('name', ['Габариты упаковки']);
    }
    // Получаем грузоподъемность
    public function bonusWiegth()
    {
        return $this->hasMany(ProductCharacteristic::class)->whereIn('name', ['Грузоподъемность, т']);
    }
    // Получаем грузоподъемность
    public function bonusWih()
    {
        return $this->hasMany(ProductCharacteristic::class)->whereIn('name', ['Вес упаковки']);
    }

    
}
