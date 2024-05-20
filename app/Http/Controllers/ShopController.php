<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function main_page()
    {
        $products = Product::with('characteristics')->get()->random(12);

        // Проверяем, содержит ли коллекция элементы перед тем, как выбирать случайные
        if ($products->isNotEmpty()) {
            $randomProducts = $products->random(min(12, $products->count()));
        } else {
            $randomProducts = collect(); // Создаем пустую коллекцию для безопасной работы с foreach
        }

        return view('templa.home.home', compact('products'));
    }

    public function categories()
    {
        $categories = Category::whereNull('parent_code')->with('children')->get();

        return view('test.test_all_cat', compact('categories'));

        // $categories = Category::where('is_active', true)->get();
        // return view('templa.categories.index', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::with('children.children.products')->where('code', $code)->firstOrFail();

        $products = $category->products;
        foreach ($category->children as $child) {
            $products = $products->merge($child->products);
            foreach ($child->children as $grandchild) {
                $products = $products->merge($grandchild->products);
            }
        }

        return view('test.test_one_cat', [
            'category' => $category,
            'products' => $products,
            'subcategories' => $category->children,
        ]);

        // $category = Category::where('code', $code)->where('is_active', true)->first();
        // $products = $category->products;
        // return view('theme.page.categories.show', compact('category', 'products'));
    }

    public function product($id)
    {
        $product = Product::with(
            'characteristics',
            'bonusMaker',
            'bonusBrand',
            'bonusSize',
            'bonusBoxSize',
            'bonusWiegth',
            'bonusWih',
        )->findOrFail($id);


        return view('test.test_product', compact('product'));
    }

    public function basket(Request $request)
    {
        $cart = session()->get('cart', []);
        return view('templa.basket.basket', compact('cart'));
    }

    public function addProductToBasket(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);
        $cart[$productId] = [
            'name' => $product->name,
            'quaniti' => 1,
            'price' => $product->price,
            'image' => $product->main_image
        ];

        session()->put('cart', $cart);
    }
}
