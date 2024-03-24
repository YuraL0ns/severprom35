<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCharacteristic;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function importFromXml()
    {
    // Получаем содержимое XML файла с другого сайта
    $xmlContent = file_get_contents('https://eme54.ru/partners-im/partners_gruz.xml');
    // Загружаем XML в объект SimpleXMLElement
    $xml = new \SimpleXMLElement($xmlContent);

    // Обходим каждый элемент <Product> в XML
    foreach ($xml->offers->ДетальнаяЗапись as $productXml) {
        $existingProduct = Product::where('external_id', (string)$productXml->ExternalID)->first();
        if ($existingProduct) {
            continue;
        } else {
            // Создаем новый продукт
            $product = new Product();

            // Заполняем поля продукта из XML
            $product->categories_code = (string)$productXml->Кодраздела;
            $product->external_id = (string)$productXml->ExternalID;
            $product->name = (string)$productXml->Наименование;
            $product->article = (string)$productXml->Артикул;
            $product->description = (string)$productXml->ПодробноеОписание;
            $product->url = (string)$productXml->DETAIL_PAGE_URL;
            $product->main_image = (string)$productXml->ОсновноеИзображение;
            $product->price = (float)$productXml->Цена;
            $product->wholesale_price = (float)$productXml->ЦенаОпт;
            $product->currency = (string)$productXml->Валюта;
            $product->weight = (float)$productXml->Вес;
            $product->length = (float)$productXml->Длина;
            $product->height = (float)$productXml->Высота;
            $product->width = (float)$productXml->Ширина;
            $product->unit = (string)$productXml->ЕдиницаИзмерения;


            // Сохраняем продукт в базе данных
            $product->save();

            // Обходим каждую характеристику продукта
            foreach ($productXml->Характеристики->Характеристика as $characteristicXml) {
                // Создаем новую характеристику продукта
                $characteristic = new ProductCharacteristic();

                // Заполняем поля характеристики продукта из XML
                $characteristic->product_id = $product->id;
                $characteristic->producer = (string)$characteristicXml->Производитель;
                $characteristic->lifting_capacity = (string)$characteristicXml->Грузоподъемность_т;
                $characteristic->length = (string)$characteristicXml->Длина_мм;
                $characteristic->single_speed = (string)$characteristicXml->Односкоростная;
                $characteristic->reduced_height = (string)$characteristicXml->Уменьшенная_строительная_высота;
                $characteristic->lifting_height = (string)$characteristicXml->Высота_подъема_м;
                $characteristic->packing_height = (string)$characteristicXml->Высота_упаковки_мм;
                $characteristic->height = (string)$characteristicXml->Высота_мм;
                $characteristic->packing_depth = (string)$characteristicXml->Глубина_упаковки_мм;
                $characteristic->rope_diameter = (string)$characteristicXml->Диаметр_каната_мм;
                $characteristic->model = (string)$characteristicXml->Модель;
                $characteristic->execution = (string)$characteristicXml->Исполнение;
                $characteristic->travel_motor_power = (string)$characteristicXml->Мощность_двигателя_передвижения_кВт;
                $characteristic->lifting_motor_power = (string)$characteristicXml->Мощность_двигателя_подъёма_кВт;
                $characteristic->voltage = (string)$characteristicXml->Напряжение_В;
                $characteristic->brand_origin = (string)$characteristicXml->Родина_бренда;
                $characteristic->travel_current = (string)$characteristicXml->Сила_тока_передвижения_А;
                $characteristic->lifting_current = (string)$characteristicXml->Сила_тока_подъема_А;
                $characteristic->rotation_speed = (string)$characteristicXml->Скорость_вращения_рад_мин;
                $characteristic->travel_speed = (string)$characteristicXml->Скорость_передвижения_м_мин;
                $characteristic->lifting_speed = (string)$characteristicXml->Скорость_подъема_м_мин;
                $characteristic->manufacturing_country = (string)$characteristicXml->Страна_производства;
                $characteristic->construction_height = (string)$characteristicXml->Строительная_высота_мм;
                $characteristic->travel_motor_type = (string)$characteristicXml->Тип_двигателя_передвижения;
                $characteristic->lifting_motor_type = (string)$characteristicXml->Тип_двигателя_подъема;
                $characteristic->frequency = (string)$characteristicXml->Частота_Гц;
                $characteristic->packing_width = (string)$characteristicXml->Ширина_упаковки_мм;
                $characteristic->width = (string)$characteristicXml->Ширина_мм;

                // Сохраняем характеристику продукта в базе данных
                $characteristic->save();
            }

        }
    }

    return "Продукты успешно импортирован";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
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
