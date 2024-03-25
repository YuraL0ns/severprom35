<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = ['name', 'code', 'parent_code', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class, 'categories_code', 'code');
    }
}
