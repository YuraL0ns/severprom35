<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'external_id' => 'required|unique:product_characteristics,external_id',
            'name' => 'required|max:255',
            'article' => 'required|max:50',
            'description' => 'required',
            'url' => 'nullable|url',
            'main_image' => 'nullable|url',
            'price' => 'required|numeric|min:0',
            'wholesale_price' => 'nullable|numeric|min:0',
            'currency' => 'required|in:RUB,USD,EUR', // Добавьте нужные валюты
            'weight' => 'required|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'unit' => 'required|max:20',
        ];
    }
}
