<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCharacteristic;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'characteristics')->paginate(30);
        return view('admin.pages.products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        // Save characteristics
        if ($request->has('characteristics')) {
            foreach ($request->characteristics as $characteristic) {
                ProductCharacteristic::create([
                    'product_id' => $product->id,
                    'name' => $characteristic['name'],
                    'value' => $characteristic['value']
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with('category', 'characteristics')->findOrFail($id);
        return view('admin.pages.products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::with('category', 'characteristics')->findOrFail($id);
        $categories = Category::all();
        return view('admin.pages.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        // Update characteristics
        if ($request->has('characteristics')) {
            ProductCharacteristic::where('product_id', $id)->delete();
            foreach ($request->characteristics as $characteristic) {
                ProductCharacteristic::create([
                    'product_id' => $id,
                    'name' => $characteristic['name'],
                    'value' => $characteristic['value']
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
