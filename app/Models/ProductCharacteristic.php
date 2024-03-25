<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristic extends Model
{
    use HasFactory;

    protected $table = 'product_characteristics';
    protected $fillable = [
        'name',
        'value'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
