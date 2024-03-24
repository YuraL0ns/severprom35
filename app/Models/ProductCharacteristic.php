<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharacteristic extends Model
{
    use HasFactory;

    protected $fillable = [
        'producer',
        'lifting_capacity',
        'length',
        'single_speed',
        'reduced_height',
        'lifting_height',
        'packing_height',
        'height',
        'packing_depth',
        'rope_diameter',
        'model',
        'execution',
        'travel_motor_power',
        'lifting_motor_power',
        'voltage',
        'brand_origin',
        'travel_current',
        'lifting_current',
        'rotation_speed',
        'travel_speed',
        'lifting_speed',
        'manufacturing_country',
        'construction_height',
        'travel_motor_type',
        'lifting_motor_type',
        'frequency',
        'packing_width',
        'width',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
