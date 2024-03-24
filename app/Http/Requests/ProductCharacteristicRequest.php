<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCharacteristicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|max:255',
            'value' => 'required|max:255',
            'producer' => 'nullable|max:255',
            'lifting_capacity' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'single_speed' => 'nullable|boolean',
            'reduced_height' => 'nullable|boolean',
            'lifting_height' => 'nullable|numeric',
            'packing_height' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'packing_depth' => 'nullable|numeric',
            'rope_diameter' => 'nullable|numeric',
            'model' => 'nullable|max:255',
            'execution' => 'nullable|max:255',
            'travel_motor_power' => 'nullable|numeric',
            'lifting_motor_power' => 'nullable|numeric',
            'voltage' => 'nullable|max:255',
            'brand_origin' => 'nullable|max:255',
            'travel_current' => 'nullable|numeric',
            'lifting_current' => 'nullable|numeric',
            'rotation_speed' => 'nullable|numeric',
            'travel_speed' => 'nullable|numeric',
            'lifting_speed' => 'nullable|numeric',
            'manufacturing_country' => 'nullable|max:255',
            'construction_height' => 'nullable|numeric',
            'travel_motor_type' => 'nullable|max:255',
            'lifting_motor_type' => 'nullable|max:255',
            'frequency' => 'nullable|numeric',
            'packing_width' => 'nullable|numeric',
            'width' => 'nullable|numeric',
        ];
    }
}
