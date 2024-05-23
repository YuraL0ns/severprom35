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
        // $xml = new \SimpleXMLElement($xmlContent);

        // foreach ($xml->Разделы->Раздел as $categoryXml) {
        //     $categoryExists = Category::where('code', (string)$categoryXml->Код)->updateOrCreate();
        //     if ($categoryExists) {
        //         // Если категория не существует, пропускаем этот продукт
        //         continue;
        //     }

        //     $category = new Category();

        //     $category->code = (string)$categoryXml->Код;
        //     $category->name = (string)$categoryXml->Название;
        //     $category->parent_code = !empty($categoryXml->КодРодителя) ? (string)$categoryXml->КодРодителя : null;
        //     $category->description = (string)$categoryXml->ОписаниеРаздела;

        //     $category->save();
        // }

        // return "Категории успешно импортированы из XML файла.";
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

        // $xml = new \SimpleXMLElement($xmlContent);

        // foreach ($xml->Разделы->Раздел as $categoryXml) {
        //     $categoryExists = Category::where('code', (string)$categoryXml->Код)->updateOrCreate();
        //     if ($categoryExists) {
        //         // Если категория не существует, пропускаем этот продукт
        //         continue;
        //     }

        //     $category = new Category();

        //     $category->code = (string)$categoryXml->Код;
        //     $category->name = (string)$categoryXml->Название;
        //     $category->parent_code = !empty($categoryXml->КодРодителя) ? (string)$categoryXml->КодРодителя : null;
        //     $category->description = (string)$categoryXml->ОписаниеРаздела;

        //     $category->save();
        // }

        // return "Категории успешно импортированы из XML файла.";
    }


    /**
     * Отображает конкретную категорию и ее продукты.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $category = Category::find($id);
        $category = Category::with(['children', 'products'])->find($id);

        if (!$category) {
            abort(404);
        }

        $subcategories = $category->children();
        $products = $category->products;

        return view('theme.page.categories.show', compact('category','subcategories','products'));
    }


}
