<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function main_page()
    {
        $mainCategories = Category::whereNull('parent_code')->get();
        $products = Product::with('characteristics')->get()->random(12);

        // Проверяем, содержит ли коллекция элементы перед тем, как выбирать случайные
        if ($products->isNotEmpty()) {
            $randomProducts = $products->random(min(12, $products->count()));
        } else {
            $randomProducts = collect(); // Создаем пустую коллекцию для безопасной работы с foreach
        }

        return view('templa.home.home', compact('products', 'mainCategories'));
    }

    public function categories($code)
    {
        $categories = Category::whereNull('parent_code')->with('children.children.products')->first();
        $subcategories = $categories->children;
        $products = $categories->products;

        if(!$categories){
            return redirect()->route('sait.home')->with('error', 'Категория ненайдена');

        }

        return view('test.test_all_cat', [
            'category' => $categories,
            'products' => $products,
            'subcategories' => $categories->children,
        ]);

        // $categories = Category::where('is_active', true)->get();
        // return view('templa.categories.index', compact('categories'));
    }

    public function category($code)
    {
        $category = Category::with('children.children.products')->where('code', $code)->first();

        if(!$category){
            return redirect()->route('sait.home')->with('error', 'Категория ненайдена');

        }
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
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->main_image
            ];
        }


        session()->put('cart', $cart);
        return response()->json(['success' => true, 'cart' => $cart]);
    }
    public function clearCart(){
        session()->forget('cart');
        return redirect()->back();
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart');
        $total = array_sum(array_map(function($item){
            return $item['price'] * $item['quantity'];
        }, $cart));

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending'
        ]);

        foreach ($cart as $productId => $details) {
            $order->items()->create([
                'product_id' => $productId,
                'quantity' => $details('quantity'),
                'price' => $details('price')
            ]);
        }

        session()->forget('cart');
        return redirect()->route('order.complite');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart');
        if (!$cart) {
            return redirect()->route('sait.basket')->with('error', 'Ваша корзина пуста');
        }

        $order = new Order();
        $order->user_id = auth()->id();
        $order->total = collect($cart)->sum(function($item){
            return $item['quantity'] * $item['price'];
        });
        $order->status ='pending';
        $order->customer_name = $request->name;
        $order->customer_email = $request->email;
        $order->customer_phone = $request->phone;
        $order->adress = $request->adress;
        $order->notes = $request->notes;
        $order->save();

        foreach($cart as $id => $item){
            $order->items()->create([
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ]);  
        }
        session()->forget('cart');

        return redirect()->route('sait.order.success', ['order' => $order->id]);
    }
    public function showCheckoutForm() {
        return view('templa.basket.checkout');
    }
}
