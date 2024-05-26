<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class AdminController extends Controller
{
    public function main_page()
    {
        return view('admin.main.page');
    }

    public function pages_categories(){
        $categories = Category::all();
        return view('admin.pages.category.list', compact('categories'));
    }

    public function showFormForImport()
    {
        return view('admin.import.form');
    }

    public function getFromFile(Request $request)
    {
        $xmlFile = $request->file('xml_file');
        $xmlContent = file_get_contents($xmlFile->getRealPath());
        $result = $this->importFromXml($xmlContent);
        return redirect()->back()->with('message', $result);
    }
    public function getFromUrl(Request $request)
    {
        $xmlUrl = $request->input('xml_url');
        if (empty($xmlUrl)) {
            return back()->with('error', 'URL не может быть пустым.');
        }

        try {
            $xmlContent = file_get_contents($xmlUrl);
            if ($xmlContent === false) {
                throw new \Exception("Не удалось загрузить содержимое по указанному URL.");
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        $result = $this->importFromXml($xmlContent);
        return redirect()->back()->with('message', $result);
    }

    public function importFromXml($xmlContent)
    {
        $xml = new \SimpleXMLElement($xmlContent);
        foreach ($xml->offers->ДетальнаяЗапись as $productXml) {
            if (isset($productXml->Кодраздела, $productXml->ID, $productXml->Наименование)) {
                $category = Category::where('code', (string)$productXml->Кодраздела)->first();
                if (!$category) {
                    Log::warning("Продукт с ID {$productXml->ID} пропущен, так как категория с кодом {$productXml->Кодраздела} не найдена!");
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
        return "Продукты успешно импортированы.";
    }
}
