{{-- resources/views/admin/pages/orders/partials/orders_table.blade.php --}}
<table class="table">
    <thead>
        <tr>
            <th>Номер заказа</th>
            <th>ФИО</th>
            <th>Телефон</th>
            <th>Дата заказа</th>
            <th>Общая сумма</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer_name }}</td>
            <td>{{ $order->customer_phone }}</td>
            <td>{{ $order->created_at->format('d.m.Y') }}</td>
            <td>{{ $order->total }}</td>
            <td>
                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info">Просмотр</a>
                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Изменить</a>
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        <tr>
            

        </tr>
        @endforeach
    </tbody>
</table>
