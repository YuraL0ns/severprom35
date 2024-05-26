<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.pages.orders.list', compact('orders'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $orders = Order::where('id', 'like', "%{$query}%")
            ->orWhere('customer_phone', 'like', "%{$query}%")
            ->latest()
            ->paginate(10);

        return view('admin.pages.orders.partials.orders_table', compact('orders'))->render();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($orderId)
    {
        try {
            $order = Order::with('items.product.category')->findOrFail($orderId);
            $products = Product::all();
        } catch (\Exception $e) {
            // Обработка исключений, например, логирование или отображение сообщения об ошибке
            return back()->withError($e->getMessage());
        }
        return view('admin.pages.orders.show', compact('order', 'products'));
    }

    // Обновление информации заказа
    public function updateOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->customer_name = $request->input('customer_name');
        $order->customer_email = $request->input('customer_email');
        $order->customer_phone = $request->input('customer_phone');
        $order->adress = $request->input('adress');
        $order->notes = $request->input('notes');
        $order->save();

        try {
            $order->save();
            return back()->with('success', 'Информация о заказе обновлена успешно.');
        } catch (\Exception $e) {
            return back()->with('error', 'Ошибка при сохранении: ' . $e->getMessage());
        }
    }

    // Обновление количества товара в заказе
    public function updateOrderItem(Request $request, $orderId, $itemId)
    {
        $order = Order::findOrFail($orderId);
        $item = $order->items()->findOrFail($itemId);
        $item->quantity = $request->input('quantity');
        $item->save();

        $orderTotal = $order->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });
    
        // Обновляем общую стоимость заказа
        $order->total = $orderTotal;
        $order->save();

        return response()->json([
            'success' => true,
            'newTotal' => $item->quantity * $item->price,
            'orderTotal' => $orderTotal
        ]);
    }

    public function addProductToOrder(Request $request, $orderId)
    {
        Log::info('Request Received', ['orderId' => $orderId, 'productId' => $request->productId]);
        $order = Order::findOrFail($orderId);
        $product = Product::findOrFail($request->productId);
        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => 1, // Начальное количество
            'price' => $product->price
        ]);

        // Пересчёт итоговой стоимости заказа
        $total = $order->items->sum(function ($item) {
            return $item->quantity * $item->price;
        });
    
        // Обновление общей суммы в заказе
        $order->total = $total;
        $order->save();

        return response()->json([
            'success' => true, 
            'newTotal' => $product->price, 
            'orderTotal' => $total
        ]);
    }

    public function update_status(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.show', $id)
            ->with('success', 'Статус заказа успешно обновлен.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
