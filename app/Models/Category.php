<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = ['name', 'code', 'parent_code', 'description'];

    public function products() : HasMany
    {
        return $this->hasMany(Product::class, 'categories_code', 'code');
    }
    
    public function children() : HasMany
    {
        return $this->hasMany(Category::class, 'parent_code', 'code');
    }
}
