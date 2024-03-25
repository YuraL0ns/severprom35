<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCharacteristic;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function importFromXml()    {

    // $xmlContent = file_get_contents('https://eme54.ru/partners-im/partners_gruz.xml');
    $xmlContent = file_get_contents('http://xmltest.test/partners_gruz.xml');

    $xml = new \SimpleXMLElement($xmlContent);

    foreach ($xml->offers->ДетальнаяЗапись as $productXml) {
        if (isset($productXml->Кодраздела, $productXml->ID, $productXml->Наименование)) {
            $existingProduct = Product::updateOrCreate(
                [
                    'external_id' => (string)$productXml->ID,
                    'categories_code' => (string)$productXml->Кодраздела
                ],
        [
            'name' => (string)$productXml->Наименование,
            'article' => (string)$productXml->Артикул,
            'description' => (string)$productXml->ПодробноеОписание,
            'url' => (string)$productXml->DETAIL_PAGE_URL,
            'main_image' => (string)$productXml->ОсновноеИзображение,
            'price' => (string)$productXml->Цена,
            'wholesale_price' => (string)$productXml->ЦенаОпт,
            'currency' => (string)$productXml->Валюта,
            'weight' => (string)$productXml->Вес,
            'length' => (string)$productXml->Длина,
            'height' => (string)$productXml->Высота,
            'width' => (string)$productXml->Ширина,
            'unit' => (string)$productXml->ЕдиницаИзмерения,
        ]

        
        // Сохраняем продукт в базе данных
        );

            // Обходим каждую характеристику продукта
           if (isset($productXml->Характеристики)){
            foreach ($productXml->Характеристики->Характеристика as $characteristicXml) {
                // Создаем новую характеристику продукта
                $existingProduct->characteristics()->updateOrCreate(
                    [
                        'name' => (string)$characteristicXml->Название,
                        'value' => (string)$characteristicXml->Значение
                    ]
                );
            }
        }
    }

    }
    // dd($xml->offers);
    // dd($xml->offers);
    return "Продукты успешно импортирован";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexByCategory(Category $category)
    {
        $products = $category->products()->paginate(10);
        $products->count(); // Получаем продукты только для данной категории
        return view('products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product($request->all());

        // Сохраняем продукт
        $product->save();

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Product created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        // Обновляем данные продукта с данными из запроса
        $product->update($request->all());

        // Возвращаем успешный ответ
        return response()->json(['message' => 'Product updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
