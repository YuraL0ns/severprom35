<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;


class ProductController extends Controller
{
    public function importFromXmlSklad()
    {
        $xmlContent = file_get_contents('https://eme54.ru/partners-im/partners_sklad.xml');
        $xml = new \SimpleXMLElement($xmlContent);
        foreach ($xml->offers->ДетальнаяЗапись as $productXml) {

            if (isset($productXml->Кодраздела, $productXml->ID, $productXml->Наименование)) {
                $category = Category::where('code', (string)$productXml->Кодраздела)->first();
                if (!$category) {
                    Log::warning("Прдукт с ID {$productXml->ID} провщен так как, категория с кодом {$productXml->Кодраздела} не найдена!  ");
                    continue;
                }

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
                );
                if (isset($productXml->Характеристики)) {
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
        return "Продукты успешно импортирован";
    }
    public function importFromXmlGruz()
    {
        $xmlContent = file_get_contents('https://eme54.ru/partners-im/partners_gruz.xml');
        $xml = new \SimpleXMLElement($xmlContent);
        foreach ($xml->offers->ДетальнаяЗапись as $productXml) {

            if (isset($productXml->Кодраздела, $productXml->ID, $productXml->Наименование)) {
                $category = Category::where('code', (string)$productXml->Кодраздела)->first();
                if (!$category) {
                    Log::warning("Прдукт с ID {$productXml->ID} провщен так как, категория с кодом {$productXml->Кодраздела} не найдена!  ");
                    continue;
                }

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
                );
                if (isset($productXml->Характеристики)) {
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
        return "Продукты успешно импортирован";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @mixin \App\Models\Category
     */
    public function indexByCategory(Category $category)
    {
        $products = $category->products()->paginate(10);
        $products->count(); // Получаем продукты только для данной категории
        return view('products.index', compact('products'));
    }
    /**
     * Отображает информацию о конкретном продукте.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, $id, $article)
    {
        $product = $product->where('article', $article)->first();
        $product->characteristics();
        if (!$product) {
            abort('404');
        }
        // $product->characteristics();
        return view('theme.page.products.show', compact('product'))->with('article', $article);
    }
}
