<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('theme.page.categories.index', compact('categories'));
    }

    public function importFromXmlSklad()
    {
        $xmlContent = file_get_contents('https://eme54.ru/partners-im/partners_sklad.xml');
        if(!$xmlContent) {
            return "Файл содержит ошибки";
        }

        $xml = new \SimpleXMLElement($xmlContent);

        foreach ($xml->Разделы->Раздел as $categoryXml) {
            // $categoryExists = Category::where('code', (string)$categoryXml->Код)->updateOrCreate();
            Category::updateOrCreate(
                ['code' => (string)$categoryXml->Код],
                [
                    'name' => (string)$categoryXml->Название,
                    'parent_code' => !empty($categoryXml->КодРодителя) ? (string)$categoryXml->КодРодителя :null,
                    'description' => (string)$categoryXml->ОписаниеРаздела,
                ]
            );
        }

        return "Категории успешно импортированы из XML файла.";
    }

    public function importFromXmlGruz()
    {
        $xmlContent = file_get_contents('https://eme54.ru/partners-im/partners_gruz.xml');

        if(!$xmlContent) {
            return "Файл содержит ошибки";
        }

        $xml = new \SimpleXMLElement($xmlContent);

        foreach ($xml->Разделы->Раздел as $categoryXml) {
            // $categoryExists = Category::where('code', (string)$categoryXml->Код)->updateOrCreate();
            Category::updateOrCreate(
                ['code' => (string)$categoryXml->Код],
                [
                    'name' => (string)$categoryXml->Название,
                    'parent_code' => !empty($categoryXml->КодРодителя) ? (string)$categoryXml->КодРодителя :null,
                    'description' => (string)$categoryXml->ОписаниеРаздела,
                ]
            );
        }

        return "Категории успешно импортированы из XML файла.";

    }


    /**
     * Отображает конкретную категорию и ее продукты.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        // $category = Category::find($id);
        $category = Category::with(['children.products'])->where('code', $code)->firstOrFail();

        if (!$category) {
            abort(404);
        }

        return view('theme.page.categories.show', compact('category','subcategories','products'));
    }


}
