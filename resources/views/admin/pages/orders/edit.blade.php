{{-- resources/views/admin/pages/orders/edit.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Редактирование заказа №{{ $order->id }}</h1>
    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="customer_name" class="form-label">Имя заказчика:</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $order->customer_name }}" required>
        </div>

        <div class="mb-3">
            <label for="customer_phone" class="form-label">Телефон:</label>
            <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="{{ $order->customer_phone }}" required>
        </div>

        <div class="mb-3">
            <label for="adress" class="form-label">Адрес:</label>
            <input type="text" class="form-control" id="adress" name="adress" value="{{ $order->adress }}">
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Заметки:</label>
            <textarea class="form-control" id="notes" name="notes">{{ $order->notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>

    <hr>

    <h2>Товары в заказе</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Артикул товара</th>
                <th>Изображение</th>
                <th>Наименование</th>
                <th>Раздел</th>
                <th>Количество</th>
                <th>Цена за штуку</th>
                <th>Итого</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->sku }}</td>
                    <td><img src="{{ $item->product->image_url }}" alt="product" width="128" height="128"></td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->category->name }}</td>
                    <td>
                        <input type="number" class="form-control quantity" data-item-id="{{ $item->id }}" value="{{ $item->quantity }}">
                    </td>
                    <td>{{ number_format($item->price, 2) }}</td>
                    <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
                    <td>
                        <button class="btn btn-primary update-item" data-item-id="{{ $item->id }}">Обновить</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
